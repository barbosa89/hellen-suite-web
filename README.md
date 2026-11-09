# Hellen Suite Web

Hellen Suite is an application for managing hotels and similar businesses. It
simplifies operational controls and administrative and management tasks. The
application is available as a web and desktop application and is currently under
development; it is not yet ready for production.

This repository contains the landing website for Hellen Suite, intended to
introduce the product and help users download the desktop application. The
application itself is maintained separately in the
[Hellen Suite repository](https://github.com/barbosa89/hellen-suite), where its
desktop builds and releases are managed.

Website: [hellensuite.com](https://hellensuite.com)

## Stack

- PHP 8.4.1 or later with the mbstring extension.
- ArixPHP, with a bundled framework core and static frontend assets.
- No Composer, Node.js, database, or frontend build step is required for this site.

## Development

Install the Arix CLI globally and run commands from the application root:

```bash
arix dev
```

The development server defaults to `http://127.0.0.1:8181`. The optional root
`.env` file can override application settings; keep it out of version control.

Run the application tests and check formatting with:

```bash
arix tests
arix format --test
```

Use `arix format` to apply formatting. The CLI also manages framework and
frontend updates through `arix core:update`, `arix css:update`, and
`arix js:update`.

## Project structure

- `app/`: routes, controllers, views, configuration, and translations.
- `core/`: the CLI-managed ArixPHP framework; do not edit it directly.
- `styles/`, `scripts/`, `fonts/`, and `media/`: public frontend assets.
- `tests/`: application tests, run through the Arix CLI.

The Hellen Suite icon files in `media/` are copied from the desktop application's
`public/` directory. Desktop development, packaging, and publishing instructions
belong to the application repository, not this website.

## Security Vulnerabilities

If you discover a security vulnerability, please contact Omar Barbosa at
[contacto@omarbarbosa.com](mailto:contacto@omarbarbosa.com).

## License

This repository is licensed under the [MIT license](LICENSE).
