---
name: paud-project-standards
description: "Mandatory project standards for PAUD Harapan Mulia. Activate this skill for any code creation, modification, review, bug fix, feature, refactor, database/schema change, route change, validation, authorization, API work, service/action design, DTO, repository, Eloquent scope, observer, event/listener, job/queue, exception, cache, or test work. Always apply change-control first, then read only the concern-specific rule files."
metadata:
  author: paud-harapan-mulia
---

# PAUD Harapan Mulia Project Standards

These are project-specific rules. They complement Laravel Boost's generated guidelines and define the architecture and change-control standards for this application.

## Mandatory Workflow

For every code task:

1. Read the existing code and sibling files before proposing or making changes.
2. Read [`rules/15-code-change-control.md`](rules/15-code-change-control.md).
3. Determine the exact scope and affected dependencies.
4. Read every concern-specific rule file mapped below.
5. Make the smallest coherent change.
6. Preserve unrelated behavior, naming, formatting, architecture, and public contracts.
7. Run the narrowest relevant verification/tests.
8. If PHP files changed, follow the project's Laravel Pint rule.
9. Report a Change Log using the format required by the change-control rule.

Do not introduce a pattern merely because it exists in this skill. Use it only when the rule's stated conditions are met.

## Architecture Baseline

Use the following responsibility boundaries for new code when applicable:

```text
HTTP Request
    ↓
Route
    ↓
Controller
    ├── Authorization → Policy / Gate
    ├── Validation    → Form Request
    ↓
DTO (only when typed cross-layer data is justified)
    ↓
Service OR Action
    ├── Service → domain business logic / orchestration
    └── Action  → one specific named use-case
    ↓
Eloquent / Query Scope / Repository (Repository only when justified)
    ↓
Model / Database

Optional side effects:
Service / Action
    ├── Event → Listener
    ├── Job / Queue
    ├── Observer (only for true model lifecycle behavior)
    └── Cache (only with TTL + invalidation strategy)

API output:
Controller
    ↓
API Resource
```

### Boundary Rules

- Controllers stay thin and HTTP-oriented.
- Validation belongs in Form Requests when endpoint input requires validation.
- Business logic belongs in Service or Action, not Controller, Form Request, Policy, Resource, DTO, Repository, Scope, or Observer.
- Service and Action are not both required for every use-case. Avoid duplicated layers.
- Repository is optional; do not wrap Eloquent mechanically.
- DTO is optional; use it when data shape/type safety across layers materially benefits the code.
- Policy/Gate decides access only and must not mutate state.
- API Resource controls JSON representation and must not perform business logic or hidden queries.
- Observer is only for behavior inherently tied to model lifecycle.
- Event/Listener is for decoupled reactions; Job/Queue is for slow or asynchronous work.
- Cache is an optimization, never the source of truth.
- Important behavior changes require tests.

## Rule Index

| Concern | Required rule |
| --- | --- |
| Any code change / code review | [`15-code-change-control.md`](rules/15-code-change-control.md) |
| Request validation / input | [`01-form-request.md`](rules/01-form-request.md) |
| Business logic / orchestration / transaction | [`02-service-layer.md`](rules/02-service-layer.md) |
| Authorization / permissions / ownership | [`03-policy-gate.md`](rules/03-policy-gate.md) |
| API JSON contract / Resource | [`04-api-resource.md`](rules/04-api-resource.md) |
| One specific named use-case | [`05-action-class.md`](rules/05-action-class.md) |
| Typed data transfer across layers | [`06-dto.md`](rules/06-dto.md) |
| Complex/reusable data access | [`07-repository.md`](rules/07-repository.md) |
| Reusable Eloquent filters | [`08-query-scope.md`](rules/08-query-scope.md) |
| Model lifecycle behavior | [`09-observer.md`](rules/09-observer.md) |
| Domain events / decoupled reactions | [`10-event-listener.md`](rules/10-event-listener.md) |
| Slow/asynchronous work | [`11-job-queue.md`](rules/11-job-queue.md) |
| Domain/business errors | [`12-custom-exception.md`](rules/12-custom-exception.md) |
| Cache / TTL / invalidation | [`13-cache.md`](rules/13-cache.md) |
| Tests / regression verification | [`14-tests.md`](rules/14-tests.md) |

## Decision Rules

- Existing verified project conventions win over theoretical preferences unless the task explicitly authorizes an architecture change or the existing code has a correctness/security defect.
- These standards define the preferred architecture for new code, but they do not authorize unrelated refactors.
- If a task spans multiple concerns, read all matching rule files.
- If context is incomplete, identify what must be cross-checked; do not invent routes, tables, relationships, or dependencies.
- Do not add Composer/NPM packages without explicit need and approval.
- Do not edit an old migration that may already have run in another environment; create a new migration unless the task explicitly requires otherwise.
- Never expose production secrets or credentials in source code, logs, documentation, or responses.
