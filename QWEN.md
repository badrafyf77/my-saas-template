# Qwen Code Context for `/Users/afyfbadreddine/Herd/mywave`

## Project Overview

This directory contains the source code for **Wave**, a SaaS (Software as a Service) framework built using the **Laravel PHP framework**. The project aims to provide a comprehensive set of features commonly found in SaaS applications, accelerating the development process for new SaaS ideas. Key features include Authentication, User Profiles, Billing, Subscription Plans, Roles & Permissions, Admin Panel, and more.

The project utilizes modern PHP practices and integrates with popular Laravel packages and tools. The frontend leverages **Tailwind CSS**, **Alpine.js**, and **Vite** for building user interfaces.

## Technology Stack

*   **Backend:** PHP 8.1+, Laravel 11.x
*   **Frontend:** Tailwind CSS, Alpine.js, Vite
*   **Database:** Not explicitly defined in core files, but Laravel supports MySQL, PostgreSQL, SQLite, SQL Server. Likely configured via `.env`.
*   **Queueing:** Laravel Queue (implied by `queue:listen` script)
*   **Testing:** PestPHP, PHPUnit
*   **IDE/Tooling:** Composer for PHP dependencies, NPM for frontend dependencies.

## Codebase Structure

The project follows a standard Laravel application structure with some custom additions:

*   `app/`: Main application code (Models, Controllers, Providers).
*   `bootstrap/`: Application bootstrapping files.
*   `config/`: Configuration files for various Laravel and Wave components.
*   `database/`: Database migrations, seeds, and factories.
*   `docker/`: Docker configuration files (not inspected in detail).
*   `lang/`: Language files for localization.
*   `public/`: Publicly accessible files (entry point `index.php`, assets).
*   `resources/`: Views (Blade templates), frontend assets (CSS, JS).
*   `routes/`: Web, API, and console route definitions.
*   `storage/`: File storage, logs, framework cache.
*   `tests/`: Automated tests (Pest/PHPUnit).
*   `wave/`: Core Wave framework code, including its own Service Provider (`Wave\\WaveServiceProvider`).
*   `vendor/`: Composer-managed PHP dependencies (not version controlled).
*   `node_modules/`: NPM-managed frontend dependencies (not version controlled).

Key configuration files:
*   `composer.json`: Defines PHP dependencies, scripts, and autoloading.
*   `package.json`: Defines NPM dependencies and frontend build scripts.
*   `config/app.php`: Main Laravel application configuration, including Service Providers and Aliases.

## Building and Running

### Prerequisites

*   PHP 8.1 or higher
*   Composer
*   Node.js and NPM
*   A database (MySQL, PostgreSQL, SQLite, etc.)

### Setup and Development

1.  **Install Dependencies:**
    *   PHP dependencies: `composer install`
    *   NPM dependencies: `npm install`

2.  **Environment Configuration:**
    *   Copy `.env.example` to `.env`.
    *   Configure your database and other environment variables in `.env`.
    *   Generate application key: `php artisan key:generate`.

3.  **Database Setup:**
    *   Run migrations: `php artisan migrate`.
    *   Seed the database (optional, for demo data): `php artisan db:seed`.

4.  **Development Server:**
    *   The `composer.json` defines a handy `dev` script that starts the Laravel development server, queue worker, log tailer, and Vite dev server concurrently:
        ```bash
        composer dev
        ```
    *   Alternatively, you can start services manually:
        *   Laravel server: `php artisan serve`
        *   Queue worker: `php artisan queue:listen`
        *   Log tailer: `php artisan pail`
        *   Vite dev server: `npm run dev`

5.  **Frontend Build:**
    *   For development: `npm run dev` (usually run via `composer dev`).
    *   For production: `npm run build`.

### Running Tests

Tests are configured using PestPHP.

*   Run all tests: `./vendor/bin/pest` or `php artisan test`.

## Development Conventions

*   **PHP:** Follows Laravel conventions. Uses PSR-4 autoloading. Code is located primarily in `app/` and `wave/src/`.
*   **Frontend:** Uses Tailwind CSS for styling and Alpine.js for interactivity. Assets are managed with Vite.
*   **Routing:** Web routes are defined in `routes/web.php`. Wave's core routes are registered via `Wave::routes()`.
*   **Service Providers:** Wave's core functionality is bootstrapped via `Wave\\WaveServiceProvider`. Application-specific providers are in `app/Providers/`.
*   **Testing:** Uses PestPHP for testing. Test files are located in the `tests/` directory.

## Remember Shortcuts

Remember the following shortcuts which the user may invoke at any time.

### QNEW

When I type "qnew", this means:

```
Understand all BEST PRACTICES listed in QWEN.md.
Your code SHOULD ALWAYS follow these best practices.
```

### QPLAN
When I type "qplan", this means:
```
Analyze similar parts of the codebase and determine whether your plan:
- is consistent with rest of codebase
- introduces minimal changes
- reuses existing code
```

## QCODE

When I type "qcode", this means:

```
Implement your plan and make sure your new tests pass.
Always run tests to make sure you didn't break anything else.
Always run `prettier` on the newly created files to ensure standard formatting.
Always run `turbo typecheck lint` to make sure type checking and linting passes.
```

### QCHECK

When I type "qcheck", this means:

```
You are a SKEPTICAL senior software engineer.
Perform this analysis for every MAJOR code change you introduced (skip minor changes):

1. QWEN.md checklist Writing Functions Best Practices.
2. QWEN.md checklist Writing Tests Best Practices.
3. QWEN.md checklist Implementation Best Practices.
```

### QCHECKF

When I type "qcheckf", this means:

```
You are a SKEPTICAL senior software engineer.
Perform this analysis for every MAJOR function you added or edited (skip minor changes):

1. QWEN.md checklist Writing Functions Best Practices.
```

### QCHECKT

When I type "qcheckt", this means:

```
You are a SKEPTICAL senior software engineer.
Perform this analysis for every MAJOR test you added or edited (skip minor changes):

1. QWEN.md checklist Writing Tests Best Practices.
```

### QUX

When I type "qux", this means:

```
Imagine you are a human UX tester of the feature you implemented. 
Output a comprehensive list of scenarios you would test, sorted by highest priority.
```

### QGIT

When I type "qgit", this means:

```
Add all changes to staging, create a commit, and push to remote.

Follow this checklist for writing your commit message:
- SHOULD use Conventional Commits format: https://www.conventionalcommits.org/en/v1.0.0
- SHOULD NOT refer to QWEN or Anthropic in the commit message.
- SHOULD structure commit message as follows:
<type>[optional scope]: <description>
[optional body]
[optional footer(s)]
- commit SHOULD contain the following structural elements to communicate intent: 
fix: a commit of the type fix patches a bug in your codebase (this correlates with PATCH in Semantic Versioning).
feat: a commit of the type feat introduces a new feature to the codebase (this correlates with MINOR in Semantic Versioning).
BREAKING CHANGE: a commit that has a footer BREAKING CHANGE:, or appends a ! after the type/scope, introduces a breaking API change (correlating with MAJOR in Semantic Versioning). A BREAKING CHANGE can be part of commits of any type.
types other than fix: and feat: are allowed, for example @commitlint/config-conventional (based on the Angular convention) recommends build:, chore:, ci:, docs:, style:, refactor:, perf:, test:, and others.
footers other than BREAKING CHANGE: <description> may be provided and follow a convention similar to git trailer format.
```
