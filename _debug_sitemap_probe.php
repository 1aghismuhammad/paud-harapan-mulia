<?php

require __DIR__.'/vendor/autoload.php';

$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$app->make(Illuminate\Contracts\Console\Kernel::class)->bootstrap();

$src = file_get_contents(resource_path('views/public/sitemap.blade.php'));
$xmlPi = '<'.'?xml';
$sourceParseError = null;

try {
    token_get_all($src, TOKEN_PARSE);
} catch (ParseError $e) {
    $sourceParseError = $e->getMessage();
}

$response = $kernel->handle(Illuminate\Http\Request::create('/sitemap.xml', 'GET'));
$body = $response->getContent();

$payload = [
    'sessionId' => 'b53639',
    'runId' => 'post-fix',
    'hypothesisId' => 'A',
    'location' => '_debug_sitemap_probe.php',
    'message' => 'direct TOKEN_PARSE plus HTTP sitemap',
    'data' => [
        'containsXmlProcessingInstruction' => str_contains($src, $xmlPi),
        'line1StartsWithBladeEcho' => str_starts_with($src, '{!!'),
        'sourceParseError' => $sourceParseError,
        'shortOpenTag' => ini_get('short_open_tag'),
        'status' => $response->getStatusCode(),
        'outputPrefix' => substr($body, 0, 45),
        'outputStartsWithXmlDecl' => str_starts_with($body, $xmlPi.' version="1.0" encoding="UTF-8"?>'),
    ],
    'timestamp' => (int) round(microtime(true) * 1000),
];

file_put_contents(__DIR__.'/debug-b53639.log', json_encode($payload, JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES).PHP_EOL, FILE_APPEND);

echo $response->getStatusCode().' '.substr($body, 0, 40).PHP_EOL;
echo 'sourceParseError='.var_export($sourceParseError, true).PHP_EOL;
