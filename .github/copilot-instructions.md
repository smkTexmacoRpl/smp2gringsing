# Copilot Instructions for SMP2 Laravel + Livewire Codebase

## Big Picture Architecture

-   This is a Laravel 12 web application using Livewire v3 for reactive UI components.
-   Main business logic is in `app/Http/Controllers/` (traditional MVC) and `app/Livewire/` (Livewire components).
-   Data models are in `app/Models/`, with Eloquent ORM relationships (e.g., `Post` belongs to `Kategori`, has many `Tag` via pivot table).
-   Blade views are in `resources/views/`, Livewire views in `resources/views/livewire/`.
-   Asset pipeline uses Vite (`vite.config.js`), with TailwindCSS v4 for UI styling.

## Developer Workflows

-   **Run locally:** Use `php artisan serve` for local dev server.
-   **Build assets:** Use `npm run dev` for hot reload, `npm run build` for production assets.
-   **Database:** Uses SQLite (`database/database.sqlite`). Migrate with `php artisan migrate`. Seed with `php artisan db:seed`.
-   **Testing:** Run tests with `php artisan test` (uses PHPUnit, see `tests/`).
-   **Livewire:** Components are created in `app/Livewire/`, registered automatically. Use `php artisan make:livewire ComponentName` to scaffold.

## Project-Specific Patterns

-   **CRUD Patterns:** CRUD logic for entities (e.g., Post) is handled in Livewire components, with modal forms and TailwindCSS UI.
-   **File Uploads:** Images are uploaded via Livewire, stored in `public/storage/posts`. Use `$this->cover_image->store('posts', 'public')`.
-   **Multi-Tag Selection:** Posts use a many-to-many relationship with tags, managed via `tags()->sync($tags)`.
-   **Modal Forms:** UI modals for create/edit are implemented in Blade with TailwindCSS classes and Livewire state (`$isModalOpen`).
-   **Validation:** Use Livewire's `$this->validate([...])` in component methods.
-   **Flash Messages:** Use `session()->flash('success', ...)` for user feedback.

## Integration Points

-   **External:** No external APIs by default, but can be added via Laravel HTTP client.
-   **Assets:** Vite handles JS/CSS, configured in `vite.config.js`. Tailwind config in `tailwind.config.js`.
-   **Storage:** Uploaded files are stored in `public/storage`, accessible via `asset('storage/...')`.

## Conventions & Structure

-   **Naming:** Models use singular (`Post`, `Tag`), tables plural (`posts`, `tags`).
-   **Livewire:** Component names match file names and Blade views (e.g., `PostIndex` → `post-index.blade.php`).
-   **Blade:** Use TailwindCSS v4 utility classes for all UI.
-   **Routes:** Web routes in `routes/web.php`, console routes in `routes/console.php`.
-   **Factories/Seeders:** For test data, see `database/factories/` and `database/seeders/`.

## Key Files & Directories

-   `app/Models/Post.php`, `app/Models/Kategori.php`, `app/Models/Tag.php`: Eloquent models and relationships.
-   `app/Livewire/Admin/PostIndex.php`: Main Livewire CRUD logic for posts.
-   `resources/views/livewire/admin/post-index.blade.php`: Main UI for post CRUD.
-   `database/migrations/`: Table definitions.
-   `public/storage/`: Uploaded images.

## Example: Creating a New CRUD Entity

1. Create migration/model in `database/migrations/` and `app/Models/`.
2. Scaffold Livewire component: `php artisan make:livewire EntityCrud`.
3. Implement CRUD logic in component, UI in Blade with TailwindCSS.
4. Register route in `routes/web.php`.

---

If any conventions or workflows are unclear, please ask for clarification or provide feedback to improve these instructions.
