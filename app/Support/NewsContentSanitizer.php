<?php

namespace App\Support;

use DOMDocument;
use DOMElement;
use DOMNode;
use DOMXPath;

class NewsContentSanitizer
{
    /** @var array<int, string> */
    private const ALLOWED_TAGS = [
        'p', 'br', 'h2', 'h3', 'strong', 'b', 'em', 'i',
        'ul', 'ol', 'li', 'blockquote', 'a', 'figure', 'img', 'figcaption',
    ];

    /** @var array<int, string> */
    private const DROP_WITH_CONTENT = [
        'script', 'style', 'iframe', 'object', 'embed', 'form', 'input', 'button',
        'textarea', 'select', 'option', 'svg', 'math', 'link', 'meta', 'base',
    ];

    /** @var array<string, array<int, string>> */
    private const ALLOWED_ATTRIBUTES = [
        'a' => ['href', 'title'],
        'img' => ['src', 'alt'],
    ];

    public function sanitize(?string $html): string
    {
        $html = trim((string) $html);

        if ($html === '') {
            return '';
        }

        $document = new DOMDocument('1.0', 'UTF-8');
        $previous = libxml_use_internal_errors(true);

        try {
            $document->loadHTML(
                '<!doctype html><html><head><meta charset="utf-8"></head><body>'.$html.'</body></html>',
                LIBXML_HTML_NODEFDTD | LIBXML_NONET | LIBXML_NOERROR | LIBXML_NOWARNING,
            );
        } finally {
            libxml_clear_errors();
            libxml_use_internal_errors($previous);
        }

        $body = (new DOMXPath($document))->query('//body')->item(0);

        if (! $body instanceof DOMElement) {
            return '';
        }

        foreach ($this->snapshotChildren($body) as $child) {
            $this->sanitizeNode($child);
        }

        $output = '';

        foreach ($this->snapshotChildren($body) as $child) {
            $output .= $document->saveHTML($child) ?: '';
        }

        return trim($output);
    }

    public function hasMeaningfulContent(string $html): bool
    {
        $text = trim(html_entity_decode(strip_tags($html), ENT_QUOTES | ENT_HTML5, 'UTF-8'));

        return $text !== '' || preg_match('/<img\b/i', $html) === 1;
    }

    private function sanitizeNode(DOMNode $node): void
    {
        if ($node->nodeType === XML_COMMENT_NODE) {
            $node->parentNode?->removeChild($node);

            return;
        }

        if (! $node instanceof DOMElement) {
            return;
        }

        $tag = strtolower($node->tagName);

        if (in_array($tag, self::DROP_WITH_CONTENT, true)) {
            $node->parentNode?->removeChild($node);

            return;
        }

        foreach ($this->snapshotChildren($node) as $child) {
            $this->sanitizeNode($child);
        }

        if (! in_array($tag, self::ALLOWED_TAGS, true)) {
            $this->unwrap($node);

            return;
        }

        if (! $this->sanitizeAttributes($node, $tag)) {
            $node->parentNode?->removeChild($node);
        }
    }

    private function sanitizeAttributes(DOMElement $element, string $tag): bool
    {
        $allowed = self::ALLOWED_ATTRIBUTES[$tag] ?? [];
        $attributes = [];

        foreach ($element->attributes as $attribute) {
            $attributes[] = strtolower($attribute->name);
        }

        foreach ($attributes as $name) {
            if (! in_array($name, $allowed, true)) {
                $element->removeAttribute($name);
            }
        }

        if ($tag === 'a' && $element->hasAttribute('href')) {
            $href = $this->safeLink($element->getAttribute('href'));

            if ($href === null) {
                $element->removeAttribute('href');
            } else {
                $element->setAttribute('href', $href);
            }
        }

        if ($tag === 'img') {
            $src = $this->safeInlineImageSource($element->getAttribute('src'));

            if ($src === null) {
                return false;
            }

            $element->setAttribute('src', $src);
            $element->setAttribute('loading', 'lazy');
            $element->setAttribute('decoding', 'async');
        }

        return true;
    }

    private function safeLink(string $href): ?string
    {
        $href = trim($href);

        if ($href === '') {
            return null;
        }

        if (str_starts_with($href, '#')) {
            return $href;
        }

        if (str_starts_with($href, '/') && ! str_starts_with($href, '//')) {
            return str_contains(rawurldecode($href), '..') ? null : $href;
        }

        $scheme = strtolower((string) parse_url($href, PHP_URL_SCHEME));

        if (! in_array($scheme, ['http', 'https', 'mailto', 'tel'], true)) {
            return null;
        }

        return $href;
    }

    private function safeInlineImageSource(string $src): ?string
    {
        $src = trim($src);

        if ($src === '') {
            return null;
        }

        $path = parse_url($src, PHP_URL_PATH);

        if (! is_string($path)) {
            return null;
        }

        $decoded = rawurldecode($path);

        if (! str_starts_with($decoded, '/storage/news/content/') || str_contains($decoded, '..')) {
            return null;
        }

        return $path;
    }

    /**
     * @return array<int, DOMNode>
     */
    private function snapshotChildren(DOMNode $node): array
    {
        $children = [];

        foreach ($node->childNodes as $child) {
            $children[] = $child;
        }

        return $children;
    }

    private function unwrap(DOMElement $element): void
    {
        $parent = $element->parentNode;

        if ($parent === null) {
            return;
        }

        while ($element->firstChild !== null) {
            $parent->insertBefore($element->firstChild, $element);
        }

        $parent->removeChild($element);
    }
}
