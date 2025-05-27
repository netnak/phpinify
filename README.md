# Phpinify

**Phpinify** is a Statamic addon that minifies HTML responses and/or static cached pages using [`voku/html-min`](https://github.com/voku/HtmlMin).

---

## 🚀 Features

Phpinify wraps the powerful `HtmlMin` engine and exposes its configuration through a publishable config file. You can toggle the following features:

- `doOptimizeViaHtmlDomParser()` – optimize HTML using the DOM parser  
- `doRemoveComments()` – remove HTML comments  
- `doSumUpWhitespace()` – collapse excess whitespace  
- `doRemoveWhitespaceAroundTags()` – trim whitespace around tags  
- `doOptimizeAttributes()` – optimize HTML attributes  
- `doRemoveHttpPrefixFromAttributes()` – strip `http:` from attributes  
- `doRemoveHttpsPrefixFromAttributes()` – strip `https:` from attributes  
- `doKeepHttpAndHttpsPrefixOnExternalAttributes()` – preserve prefixes for external links  
- `doMakeSameDomainsLinksRelative(['example.com'])` – make internal links relative  
- `doRemoveDefaultAttributes()` – remove default attribute values  
- `doRemoveDeprecatedAnchorName()` – remove deprecated anchor name attributes  
- `doRemoveDeprecatedScriptCharsetAttribute()` – remove charset from `<script>` tags  
- `doRemoveDeprecatedTypeFromScriptTag()` – remove deprecated type from `<script>`  
- `doRemoveDeprecatedTypeFromStylesheetLink()` – remove `type="text/css"` from CSS links  
- `doRemoveDeprecatedTypeFromStyleAndLinkTag()` – remove `type="text/css"` globally  
- `doRemoveDefaultMediaTypeFromStyleAndLinkTag()` – remove `media="all"`  
- `doRemoveDefaultTypeFromButton()` – remove `type="submit"` from buttons  
- `doRemoveEmptyAttributes()` – strip empty attributes  
- `doRemoveValueFromEmptyInput()` – remove `value=""` from empty inputs  
- `doSortCssClassNames()` – sort class names for better Gzip performance  
- `doSortHtmlAttributes()` – sort attributes for better Gzip performance  
- `doRemoveSpacesBetweenTags()` – aggressively trim inter-tag spaces  
- `doRemoveOmittedQuotes()` – omit unnecessary attribute quotes  
- `doRemoveOmittedHtmlTags()` – omit redundant HTML tags  

---

## 📦 Installation

Install via Composer:

```bash
composer require netnak/phpinify
```

Then publish the config file (optional):

```bash
php artisan vendor:publish --tag=phpinify-config --force
```

---

## ⚙️ Configuration

Phpinify auto-registers itself.

To manually ensure it's added as a static caching replacer, edit `config/statamic/static_caching.php`:

```php
'replacers' => [
    // ...
    \Netnak\Phpinify\Replacers\PhpinifyReplacer::class,
],
```

---

## ✅ Usage

Enable minification via your `.env` file:

```env
PHPINIFY_RESPONSE=true
PHPINIFY_STATIC=true
```

These values toggle options in `config/phpinify.php`:

```php
'enable_response_minifier' => env('PHPINIFY_RESPONSE', false),
'enable_static_cache_replacer' => env('PHPINIFY_STATIC', false),
```

Exclude paths from minification with:

```php
'ignored_paths' => ['!/*', 'api/*'],
```

---

## 🪪 License

MIT — see the [LICENSE](LICENSE) file for details.
