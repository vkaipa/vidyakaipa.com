# Portico — Product Specification
**Version:** 0.2 (merged v0.1 + addendum)
**Status:** Interactive prototype in progress

---

## What Is Portico?

Portico is a Talent Intelligence Layer that sits on top of existing recruiting infrastructure (ATS, HRIS). It turns two common talent losses into recoverable assets:

1. **Strong internal employees** who weren't surfaced or considered for open roles
2. **Strong external candidates** who fell off after a single rejection

Portico doesn't replace your ATS. It makes it smarter about who you already know.

---

## Problem Statement

Recruiting teams lose two high-value talent pools every day:

- **Internal talent goes unnoticed.** High performers on adjacent teams are never surfaced to hiring managers opening new roles. The HM defaults to external search, incurring cost and ramp time.
- **Past candidates expire prematurely.** Strong external candidates who didn't get an offer — due to timing, headcount, or level mismatch — are abandoned in ATS limbo with no re-engagement path.

Current tools (Greenhouse, Lever, Workday) are transaction-processors. They record hiring decisions but don't reason across them. Portico closes that gap.

---

## Core Concepts

### Role Template + Role Instance
One **Role Template** (canonical job definition: skills, leveling, competency requirements) can have multiple **Role Instances** — one per hiring manager / team combination. A strong candidate can be broadcast to all matching instances simultaneously, not siloed to one HM's pipeline.

### Talent Pool (No Expiration)
Once a candidate enters a Portico talent pool, they remain indefinitely unless:
- They are explicitly archived by a recruiter
- They opt out via candidate transparency controls

There is no automatic expiration. The value of Portico's talent graph compounds over time — a candidate strong enough to enter a pool in Year 1 remains accessible in Year 3 unless actively removed. Recruiters are responsible for curation, not the system.

### Champion Endorsement System
Internal employees who previously worked with an external candidate can submit endorsements. Each endorsement is disclosed to the hiring team along with the relationship (e.g., "Former direct report at Meta"). Undisclosed relationships trigger an AI flag.

### AI Signal Flags
All AI-generated signals (match scores, skill inferences, churn predictions) are always visible and never suppressed. Flag types:
- **Warn** (orange): Potential concern, human review needed
- **Info** (blue/teal): Contextual signal, neutral
- **Danger** (red): High-priority signal requiring action

Every AI signal must be source-traceable. No inferences displayed without an auditable source.

### Validated vs. Inferred Skills
Skills are always shown with their validation status. **Validated** = confirmed via assessment, past work, or endorsement. **Inferred** = AI-derived from resume/profile. Hiring decisions should weight validated signals heavily.

---

## User Roles

### Recruiter
Full access to all Portico screens:
- Open Roles (homepage with all active role instances)
- Role Breakout (candidate pipeline for a specific role instance)
- Candidate Packet (full candidate profile)
- At Risk (internal employees with high churn probability — recruiter only)
- Notifications (endorsements, feedback, role aging alerts)
- Settings (configurable thresholds — see below)

### Hiring Manager (HM)
Scoped view:
- Sees only their own role instances
- Cannot see At Risk tab or churn risk scores (this data is recruiter-only — see Churn Risk section)
- Can view and act on candidates in their pipeline
- Can submit feedback and approve/decline champion endorsements

---

## Churn Risk — Recruiter-Only Visibility

Churn risk scores and the At Risk tab are **visible only to recruiters**. They are hidden from HM view.

**Why:** Churn risk is sensitive personnel data. Surfacing it to HMs could create awkward dynamics, premature conversations, or biased performance reviews. Recruiters use it to proactively open conversations with high-value employees before they leave — not to put HMs on alert.

**Implementation:** The `isHM` flag is threaded through all rendering functions. `churnChip(risk, isHM)` returns an empty string when `isHM === true`. The At Risk tab is not rendered in HM navigation.

---

## Settings View

Portico exposes configurable thresholds so recruiting teams can tune signal sensitivity to their organization's norms. Settings are recruiter-accessible.

### Configurable Parameters
| Setting | Default | Description |
|---|---|---|
| Churn risk threshold | 70% | Minimum score to flag an employee as At Risk |
| Match score threshold | 75% | Minimum score to surface a candidate to a role |
| Tenure gap (churn signal) | 18 months | Time since last promotion that triggers a churn signal |
| Talent pool expiration | Never | How long candidates remain in talent pools (default: indefinitely) |
| Endorsement disclosure | Required | Whether relationship disclosure is required before an endorsement is shown to the hiring team |

Settings are organization-level (not per-recruiter) in v1.

---

## Screen Inventory

### Recruiter View
1. **Open Roles** — table of all active role instances with match count, pipeline status, days open
2. **Role Breakout** — candidate rows for a specific role instance, split by internal / external / talent pool. Columns: candidate name, match %, skills match, churn risk (internal only), last activity, status
3. **Candidate Packet** — full profile: AI signals, validated skills, work history, endorsements, multi-role consideration disclosure, AI flag log
4. **At Risk** — rich cards for high-churn internal employees. Shows tenure gap, promotion lag, matched open roles, recommended next action
5. **Notifications** — endorsement submissions, candidate feedback, role aging alerts (does NOT include churn — that lives in At Risk tab)
6. **Settings** — configurable thresholds (see above)

### HM View
Scoped subset of recruiter view. No At Risk tab. No churn scores. Otherwise same screens.

---

## Data Model (Prototype)

### Candidate
```
{
  id, name, title, company, level,    // basic info
  type,                               // 'internal' | 'external' | 'pool'
  matchScore,                         // 0–100
  skills: [{ name, validated }],
  churnRisk,                          // 'high' | 'medium' | 'low' — shown to recruiter only
  tenureMonths,                       // months in current role
  lastPromoMonths,                    // months since last promotion
  signals: [{ type, label, detail }], // AI flags
  endorsements: [],
  workHistory: [],
  status,                             // pipeline status
  matchedRoles: []                    // for At Risk: which open roles they match
}
```

### Role Instance
```
{
  id, templateId,
  title, team, hiringManager,
  level,                    // e.g. 'L5', 'L4–L5'
  daysOpen,
  status,                   // 'active' | 'on_hold' | 'closed'
  candidateCount,
  matchedCount,
  candidates: [candidateId]
}
```

---

## Non-Negotiables

| Principle | Rule |
|---|---|
| No hallucinations | Every AI output must be source-traceable. No inference without an auditable signal. |
| Human in the loop | Portico never takes autonomous action on a candidate (no auto-advance, no auto-reject, no auto-outreach). All actions require a human click. |
| Candidate transparency | Multi-role consideration is always disclosed on the candidate packet. Candidates see when they're being considered for more than one role. |
| Validated > inferred | Skill validation status is always visible. Validated skills are visually distinguished from inferred ones. |
| Churn is sensitive | Churn risk data is recruiter-only. Never surface to HMs. |
| Talent pool is permanent | Candidates in the pool don't expire unless explicitly archived or opted out. |

---

## Competitive Positioning vs. Greenhouse

Portico is **not** a replacement for Greenhouse. The positioning is:

> "Greenhouse is your transaction processor. Portico is your talent memory."

| Capability | Greenhouse | Portico |
|---|---|---|
| Job posting & application tracking | Yes | No |
| Interview scheduling | Yes | No |
| Offer management | Yes | No |
| Internal candidate surfacing | No | Yes |
| Talent pool with no expiration | No | Yes |
| Churn risk for at-risk employees | No | Yes |
| Cross-role candidate matching | No | Yes |
| Champion endorsement with disclosure | No | Yes |
| AI signal traceability | No | Yes |

Portico reads from Greenhouse via API (read-only in v1). It does not write back. The integration surfaces Greenhouse pipeline data inside Portico's intelligence layer — it does not replace the Greenhouse workflow.

**Sales motion:** Sell to recruiting teams already on Greenhouse. Portico is an add-on intelligence layer, not a rip-and-replace. ACV target: teams with 50+ open roles who have measurable regrettable attrition.

---

## v1 Scope Boundaries

**In scope:**
- Recruiter view (all screens above)
- HM view (scoped)
- Mock data prototype (no live integrations)
- Read-only Greenhouse integration (design only, not implemented in prototype)

**Out of scope for v1:**
- Candidate-facing view
- Write-back to ATS
- Email / calendar integrations
- Multi-tenant admin
- SSO / auth
- Mobile-optimized layout

---

## Tech Stack (Prototype)

- Single self-contained HTML file (`portico/index.html`)
- Vanilla JS, CSS, HTML — no framework, no build tool
- 100% mock data
- Google Fonts: DM Sans (UI) + DM Serif Display (editorial moments)
- Airbnb brand palette: Rausch (#FF5A5F), Babu (#00A699), Arches (#FC642D), Hof (#484848), Foggy (#767676)
