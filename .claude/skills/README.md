# Installed design skills

Third-party Claude Code skills installed for this project, used to drive the
2026 redesign of the marketing pages.

| Source | Skills | Licence |
|---|---|---|
| [Leonxlnx/taste-skill](https://github.com/Leonxlnx/taste-skill) | `taste-skill`, `taste-skill-v1`, `redesign-skill`, `minimalist-skill`, `soft-skill`, `brutalist-skill`, `brandkit`, `output-skill`, `stitch-skill`, `gpt-tasteskill`, `image-to-code-skill`, `imagegen-frontend-web`, `imagegen-frontend-mobile` | see `_licenses/taste-skill.LICENSE` |
| [emilkowalski/skills](https://github.com/emilkowalski/skills) | `animate`, `animate-expo`, `animation-vocabulary`, `apple-design`, `ask-sonner`, `emil-design-eng`, `find-animation-opportunities`, `improve-animations`, `pick-ui-library`, `prototype`, `review-animations`, `write-swift` | see `_licenses/emilkowalski-skills.LICENSE` |
| [pbakaus/impeccable](https://github.com/pbakaus/impeccable) | `impeccable` | see `_licenses/impeccable.LICENSE` and `impeccable.NOTICE.md` |

## What was applied in the redesign

- **taste-skill** drove the brief inference, the dial settings
  (`DESIGN_VARIANCE 6 / MOTION_INTENSITY 4 / VISUAL_DENSITY 5`), the redesign
  protocol in section 11 (preserve slugs, form field names, analytics), the
  layout-family variety rule, the eyebrow rationing, the em-dash ban and the
  final pre-flight checklist.
- **emilkowalski/animate** drove the motion: the "should this animate at all"
  gate, `transform`/`opacity` only, the `cubic-bezier(.23,1,.32,1)` ease-out,
  durations under 300ms for UI, transitions rather than keyframes on anything
  the user can trigger twice a second (the hero tabs), and shipping
  `prefers-reduced-motion` and `@media (hover:hover)` gating with the
  animation rather than afterwards.
- **impeccable** was consulted for craft-floor checks on contrast, focus
  states and spacing rhythm.

These files are documentation for the agent. They ship no runtime code to the
website and are not served to visitors.
