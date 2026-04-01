=== EmDash Exporter ===
Contributors: ascorbic
Tags: export, migration, cms, emdash, astro
Requires at least: 5.6
Tested up to: 6.4
Requires PHP: 7.4
Stable tag: 1.0.0
License: GPL3
License URI: https://opensource.org/license/gpl-3.0

Export your WordPress content to EmDash CMS via REST API. Full support for posts, pages, custom post types, ACF fields, media, and SEO data.

== Description ==

EmDash Exporter adds REST API endpoints to your WordPress site that allow EmDash CMS to import your content directly—no file downloads required.

**Features:**

* **One-click import** – Connect EmDash to your site and import everything
* **Full content** – Posts, pages, and custom post types including drafts
* **Media with metadata** – Images, videos, and files with alt text, captions, and dimensions
* **Custom fields** – Full ACF support plus any custom meta fields
* **SEO data** – Yoast SEO and Rank Math meta automatically included
* **Taxonomies** – Categories, tags, and custom taxonomies with hierarchy
* **Authors** – User data for proper attribution

**Authentication:**

Uses WordPress Application Passwords (built into WordPress 5.6+). Create an application password in your user profile, then use it with your WordPress username to authenticate API requests.

== Installation ==

1. Upload the `emdash-exporter` folder to `/wp-content/plugins/`
2. Activate the plugin through the 'Plugins' menu in WordPress
3. Create an Application Password: Users → Your Profile → Application Passwords
4. In EmDash, enter your site URL and credentials to begin import

== API Endpoints ==

All endpoints are under `/wp-json/emdash/v1/`

**Public (no auth required):**

* `GET /probe` – Site info and capabilities

**Authenticated:**

* `GET /analyze` – Full site analysis for import planning
* `GET /content?post_type=post` – Get posts (paginated)
* `GET /media` – Get media items (paginated)
* `GET /media/{id}?include_data=true` – Get single media item with base64 data
* `GET /taxonomies` – Get all taxonomies and terms
* `GET /options` – Get site options

== Frequently Asked Questions ==

= Do I need to install anything on my EmDash site? =

No. This plugin runs on your WordPress site and exposes an API that EmDash connects to.

= Is my content secure? =

Yes. All export endpoints (except /probe) require authentication. Use Application Passwords and HTTPS.

= What about my media files? =

Media URLs are included in the export. EmDash downloads them directly from your WordPress site during import. Optionally, small files can be transferred inline as base64.

= Does this work with custom post types? =

Yes! All public post types are automatically included, along with their custom fields.

= What about ACF fields? =

Full ACF support. Field groups are analyzed, and field values are exported with proper type information.

== Changelog ==

= 1.0.0 =
* Initial release
* REST API endpoints for content, media, taxonomies, options
* ACF field support
* Yoast SEO and Rank Math integration
* Application Passwords authentication

== Upgrade Notice ==

= 1.0.0 =
Initial release
