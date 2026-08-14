<project-development-standards>
=== paud project standards ===

# PAUD Harapan Mulia Project Standards

These project-specific standards are mandatory for code work in this repository.

## Mandatory Skill Activation

Before planning, creating, editing, or reviewing application code, activate and read:

`/.agents/skills/paud-project-standards/SKILL.md`

For every code change, `rules/15-code-change-control.md` is mandatory. Then read only the additional rule files relevant to the affected concern.

## Priority and Scope

- Explicit task requirements define the requested scope.
- Preserve verified existing behavior and conventions outside that scope.
- Apply these project standards to new code and in-scope changes.
- Laravel Boost rules remain active and complementary.
- If a generic Boost default conflicts with a deliberate project-specific rule here, follow the project-specific rule unless doing so would create a correctness or security defect.
- Do not refactor unrelated existing code merely to make it conform to these standards.

## Architecture Contract

- Controllers handle HTTP orchestration only; keep business logic out of Controllers.
- Use Form Requests for endpoint input validation and pass validated data, never raw request payloads, into business logic.
- Put domain business logic/orchestration in Services. Use Actions for a single, clearly named use-case when that boundary is justified.
- DTOs are optional and must be typed; use them when data crosses layers with enough complexity to justify an explicit contract.
- Repositories are optional. Use them only for justified data-access abstraction or reusable complex queries; do not mechanically wrap Eloquent.
- Use Query Scopes for reusable, model-specific query conditions.
- Use Policies for resource authorization and Gates for simple/global authorization. Authorization code must not mutate application state.
- Use API Resources for controlled JSON contracts; do not expose raw sensitive fields or trigger hidden relationship queries.
- Use Observers only for behavior inherently tied to model lifecycle. Keep important workflows explicit in Service/Action when appropriate.
- Use Events/Listeners for decoupled reactions and Jobs/Queues for slow/asynchronous work.
- Use Custom Exceptions for meaningful domain/business errors and map them to HTTP responses outside the domain layer.
- Add Cache only with a clear performance reason, TTL, key strategy, and invalidation strategy.
- Important business behavior must have tests. Bug fixes require a regression test when practical.

## Change Control Contract

For every change:

`Understand → Cross-check → Minimum Change → Verify → Record`

Mandatory rules:

- Read existing code before editing.
- Change only what the task requires.
- Do not perform hidden refactors, opportunistic renames, mass formatting, cleanup, package upgrades, or architecture changes.
- Cross-check affected routes, requests, services/actions, models, schema, relationships, policies, resources/views, config, and tests as relevant.
- Preserve backward compatibility unless a breaking change is explicitly requested.
- Do not add Composer/NPM dependencies without explicit need and approval.
- Do not modify an old migration that may already have run in another environment; create a new migration by default.
- Never commit or expose secrets/credentials.
- Finish code-change responses with the Change Log required by the project change-control rule, including changed files, unchanged critical areas, database/migration/route/config/dependency/test impact, risk level, and verification.

</project-development-standards>

<laravel-boost-guidelines>
=== foundation rules ===

# Laravel Boost Guidelines

The Laravel Boost guidelines are specifically curated by Laravel maintainers for this application. These guidelines should be followed closely to ensure the best experience when building Laravel applications.

## Foundational Context

This application is a Laravel application running on PHP 8.3. You are an expert with the Laravel ecosystem. Always use the APIs that match the installed major version of each package — do not assume a version.

Before relying on a package's API, confirm its installed version:
- PHP packages: run `composer show --direct` to list direct dependencies with versions, or `composer show <vendor/package>` for a single package.
- JS packages: check `package.json` for the installed versions.

## Skills Activation

This project has domain-specific skills available in `**/skills/**`. You MUST activate the relevant skill whenever you work in that domain—don't wait until you're stuck.

## Conventions

- You must follow all existing code conventions used in this application. When creating or editing a file, check sibling files for the correct structure, approach, and naming.
- Use descriptive names for variables and methods. For example, `isRegisteredForDiscounts`, not `discount()`.
- Check for existing components to reuse before writing a new one.

## Verification Scripts

- Do not create verification scripts or tinker when tests cover that functionality and prove they work. Unit and feature tests are more important.

## Application Structure & Architecture

- Stick to existing directory structure; don't create new base folders without approval.
- Do not change the application's dependencies without approval.

## Frontend Bundling

- If the user doesn't see a frontend change reflected in the UI, it could mean they need to run `npm run build`, `npm run dev`, or `composer run dev`. Ask them.

## Documentation Files

- You must only create documentation files if explicitly requested by the user.

## Replies

- Be concise in your explanations - focus on what's important rather than explaining obvious details.

=== boost rules ===

# Laravel Boost

## Project Rules

- This project contains committed, area-grouped rules in `.ai/rules` when that directory exists (settled decisions, non-obvious traps, standing constraints). Framework and package guidelines that only apply to specific paths (testing, frontend, components) also live there, under `.ai/rules/boost` — this is not just recorded decisions, it is load-bearing guidance you have not seen inline. Before you enter plan mode or create/edit any file, you MUST first: open @.ai/rules/index.md (it maps file globs to rule files), read every rule file whose globs cover the path(s) in scope, and run `grep -rin 'keyword' .ai/rules` to catch what a path match alone misses. Do not write code until you have read and are following every matching rule. If `.ai/rules` does not exist, continue without it.

## Artisan

- Run Artisan commands directly via the command line (e.g., `php artisan route:list`). Use `php artisan list` to discover available commands and `php artisan [command] --help` to check parameters.
- Inspect routes with `php artisan route:list`. Filter with: `--method=GET`, `--name=users`, `--path=api`, `--except-vendor`, `--only-vendor`.
- Read configuration values using dot notation: `php artisan config:show app.name`, `php artisan config:show database.default`. Or read config files directly from the `config/` directory.

## Tinker

- Execute PHP in app context for debugging and testing code. Do not create models without user approval, prefer tests with factories instead. Prefer existing Artisan commands over custom tinker code.
- Always use single quotes to prevent shell expansion: `php artisan tinker --execute 'Your::code();'`
  - Double quotes for PHP strings inside: `php artisan tinker --execute 'User::where("active", true)->count();'`

=== php rules ===

# PHP

- Always use curly braces for control structures, even for single-line bodies.
- Use PHP 8 constructor property promotion: `public function __construct(public GitHub $github) { }`. Do not leave empty zero-parameter `__construct()` methods unless the constructor is private.
- Use explicit return type declarations and type hints for all method parameters: `function isAccessible(User $user, ?string $path = null): bool`
- Use TitleCase for Enum keys: `FavoritePerson`, `BestLake`, `Monthly`.
- Prefer PHPDoc blocks over inline comments. Only add inline comments for exceptionally complex logic.
- Use array shape type definitions in PHPDoc blocks.

=== deployments rules ===

# Deployment

- Laravel can be deployed using [Laravel Cloud](https://cloud.laravel.com/), which is the fastest way to deploy and scale production Laravel applications.

=== laravel/core rules ===

# Do Things the Laravel Way

- Use `php artisan make:` commands to create new files (i.e. migrations, controllers, models, etc.). You can list available Artisan commands using `php artisan list` and check their parameters with `php artisan [command] --help`.
- If you're creating a generic PHP class, use `php artisan make:class`.
- Pass `--no-interaction` to all Artisan commands to ensure they work without user input. You should also pass the correct `--options` to ensure correct behavior.

### Model Creation

- When creating new models, create useful factories and seeders for them too. Ask the user if they need any other things, using `php artisan make:model --help` to check the available options.

## APIs & Eloquent Resources

- For APIs, default to using Eloquent API Resources and API versioning unless existing API routes do not, then you should follow existing application convention.

## URL Generation

- When generating links to other pages, prefer named routes and the `route()` function.

## Testing

- When creating models for tests, use the factories for the models. Check if the factory has custom states that can be used before manually setting up the model.
- Faker: Use methods such as `$this->faker->word()` or `fake()->randomDigit()`. Follow existing conventions whether to use `$this->faker` or `fake()`.
- When creating tests, make use of `php artisan make:test [options] {name}` to create a feature test, and pass `--unit` to create a unit test. Most tests should be feature tests.

## Vite Error

- If you receive an "Illuminate\Foundation\ViteException: Unable to locate file in Vite manifest" error, you can run `npm run build` or ask the user to run `npm run dev` or `composer run dev`.

=== pint/core rules ===

# Laravel Pint Code Formatter

- If you have modified any PHP files, you must run `vendor/bin/pint --dirty --format agent` before finalizing changes to ensure your code matches the project's expected style.
- Do not run `vendor/bin/pint --test --format agent`, simply run `vendor/bin/pint --format agent` to fix any formatting issues.

=== pest/core rules ===

## Pest

- This project uses Pest for testing. Create tests: `php artisan make:test --pest {name}`.
- The `{name}` argument should not include the test suite directory. Use `php artisan make:test --pest SomeFeatureTest` instead of `php artisan make:test --pest Feature/SomeFeatureTest`.
- Run tests: `php artisan test --compact` or filter: `php artisan test --compact --filter=testName`.
- Do NOT delete tests without approval.

</laravel-boost-guidelines>
