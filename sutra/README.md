# Sutra — Talent Intelligence

**Live demo:** [sutratalent.com/demo](https://sutratalent.com/demo)

Sutra is a talent intelligence layer that sits on top of existing recruiting infrastructure (ATS, HRIS). It surfaces two high-value talent pools that most recruiting teams lose every day: strong internal employees who were never considered for open roles, and strong external candidates who fell off after a single rejection.

This repository contains the interactive prototype and companion journey map.

---

## Files

| File | Description |
|---|---|
| `index.html` | Interactive prototype — full recruiter and HM workflow |
| `journey.html` | User journey map with live embedded prototype views, personas, and design principles |
| `SPEC.md` | Full product specification: data model, screen inventory, non-negotiables, competitive positioning |

---

## Running locally

No build step required. Serve the `sutra/` directory over HTTP:

```bash
python3 -m http.server 8000
```

Then open `http://localhost:8000` for the prototype or `http://localhost:8000/journey.html` for the journey map.

---

## Prototype overview

- **Open Roles** — table of all active role instances with pipeline status and match counts
- **Role Breakout** — candidate pipeline per role, filterable by source and stage
- **Candidate Packet** — full profile with AI signals, validated skills, endorsements, and action items
- **At Risk** — internal employees with high churn probability (recruiter-only)
- **Analytics** — KPIs, pipeline funnel, hire origin attribution, time-to-fill, at-risk interventions, talent pool utilization
- **Settings** — org-level configurable thresholds

The prototype uses 100% mock data. No backend, no auth, no external dependencies beyond Google Fonts.

---

## Design principles

- **No hallucinations** — every AI signal is source-traceable
- **Human in the loop** — Sutra never takes autonomous action on a candidate
- **Validated > inferred** — skill validation status is always visible and distinguished
- **Churn is sensitive** — churn risk data is recruiter-only, never surfaced to hiring managers
- **Honest attribution** — Sutra-originated hires are distinguished from pipelines Sutra merely managed
