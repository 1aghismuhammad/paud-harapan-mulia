# Phase 3G — Public News Integration V1

Date: 2026-08-19

## Scope

- Replaced the static homepage news preview with the three latest currently published posts.
- Replaced the static `/berita` preview with database-backed published news listing and pagination.
- Added `/berita/{slug}` detail pages for published posts.
- Draft and future scheduled posts return 404 on public detail routes.
- Added featured-image optional rendering and excerpt fallback from sanitized article text.
- Rendered rich-text content with defense-in-depth sanitization on public detail pages.
- Added author, publish date, tags, and basic Open Graph / SEO metadata support.
- Added public news feature tests and made public page tests migrate the test database explicitly.

## Runtime Impact

- New public detail route: `GET /berita/{newsPost:slug}`.
- Homepage `/` now queries `news_posts`.
- `/berita` now queries `news_posts` and paginates results.
- No database migrations or new dependencies.

## Security

- Public queries use the existing `published()` scope.
- Detail pages explicitly reject draft and future scheduled content.
- Stored article HTML is sanitized again before rendering publicly.
