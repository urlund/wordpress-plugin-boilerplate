# WordPress Plugin Boilerplate

A starter WordPress plugin with [GitHub-based updates](https://github.com/urlund/wordpress-updater) via `urlund/wordpress-updater`.

## Requirements

- PHP 7.4+ (`ext-curl`, `ext-zip`, `ext-json`)
- Composer
- WordPress 5.0+

## Setup

```bash
composer install
```

Update `extra.wordpress-updater` in `composer.json` for your plugin (slug, repo, banners, icons). The runtime updater is already wired in `wp-plugin-boilerplate.php`.

## Publishing a release

Releases are built and published with [`urlund/wordpress-updater`](https://github.com/urlund/wordpress-updater) CLIs (`vendor/bin/`). Configuration lives in `composer.json` under `extra.wordpress-updater`.

### 1. Auth for publishing

Set a GitHub token with permission to create releases on the repo:

```bash
export GITHUB_TOKEN=ghp_…
```

Or put `GITHUB_TOKEN=…` in a project `.env` (loaded automatically). You can also pass `--token=…` on the CLI.

### 2. Dry run (optional)

```bash
composer run wp-release patch --dry-run
```

### 3. Publish

`wp-release` runs **bump → zip → release.json**. Add `--publish` to upload to GitHub; add `--no-dev` for a production `vendor/` in the ZIP.

```bash
# Patch bump, composer bump, production package, commit + tag, upload to GitHub
composer run wp-release patch --commit --tag --publish --no-dev --bump-composer

# Minor / major
composer run wp-release minor --commit --tag --publish --no-dev --bump-composer
composer run wp-release major --commit --tag --publish --no-dev --bump-composer

# Explicit version
composer run wp-release 1.2.3 --commit --tag --publish --no-dev --bump-composer
```

Release files land in `dist/` (e.g. `wordpress-plugin-boilerplate-1.0.1.zip` and `release.json`). Download URLs look like:

`https://github.com/urlund/wordpress-plugin-boilerplate/releases/download/v{version}/wordpress-plugin-boilerplate-{version}.zip`

## Runtime updates

Installed sites check GitHub for newer releases via `GitHubPluginRepository` in the main plugin file. Each GitHub release should include the versioned ZIP and `release.json` (what `wp-release --publish` uploads).

For private repos, set `WP_PLUGIN_BOILERPLATE_GITHUB_TOKEN` in `wp-plugin-boilerplate.php` (or wire it from the environment).

## License

MIT
