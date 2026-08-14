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

