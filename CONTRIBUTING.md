# 🤝 Contributing to Backend Collection

Thank you for helping make this collection more useful for beginners and freshers. Contributions can add a backend example, improve an existing project, fix setup instructions, or make a concept easier to understand.

## 🧭 Before you start

1. Look through the existing project folders and READMEs to understand how examples are organized.
2. For a large new example or a significant change, open an issue or discussion first so the scope and approach can be agreed on.
3. Work on a branch and keep your change focused on one project or improvement.

## 🏗️ Adding a backend example

- Place the project under its language folder, such as `node/`, `python/`, or `php/`.
- Use a descriptive, lowercase folder name, such as `express-basic/` or `fastapi-basic/`.
- Include a project README that explains:
  - What the example does and what a learner will practice.
  - Required language/runtime and tools.
  - Installation and run steps.
  - Environment variables and any external services needed.
  - Available routes or commands, with example requests where useful.
- Keep each example runnable on its own. Document project-specific dependencies and commands rather than assuming a repository-wide setup.
- Prefer small, readable examples that demonstrate a backend concept without unnecessary complexity.

## ✍️ Code and documentation guidelines

- Follow the language and framework conventions already used in the project you are changing.
- Choose clear names and keep route, data, and configuration responsibilities easy to follow.
- Validate and handle expected errors; return appropriate status codes and useful responses.
- Keep secrets, passwords, private keys, and personal credentials out of source files and commits. Use environment variables for local configuration and provide a safe example file with placeholder values when needed.
- Do not include generated dependency folders, build output, local databases, or editor-specific files unless the project explicitly requires them.
- Write for learners: explain non-obvious decisions, and prefer accurate step-by-step instructions over unexplained shortcuts.
- Update the relevant README whenever setup, routes, behavior, or project structure changes.

## 🧪 Test your changes

Run the checks that apply to the project you changed before submitting:

- Follow that project's documented installation and startup instructions.
- Exercise changed routes or behavior with the project's tests or an HTTP client.
- Run any project-provided lint, test, or build commands.
- For a new example, verify the documented setup from a clean project checkout when practical.

Some examples may not yet have automated tests. Do not claim checks passed unless you actually ran them; mention any checks you could not run and why.

## ✅ Pull request checklist

Before opening a pull request, make sure:

- [ ] The change has a clear, focused purpose.
- [ ] The relevant project README is accurate and complete.
- [ ] The project runs, and applicable checks have been run.
- [ ] No secrets, local environment files, or unrelated generated files are included.
- [ ] The pull request description explains what changed and how it was checked.

Use a descriptive pull request title, for example `Add a basic FastAPI example` or `Document MongoDB environment setup`.

## 💬 Review and questions

Be respectful and constructive in discussions and reviews. If you are unsure where an example belongs or how much detail to include, open an issue or ask in the pull request before making a broad change.