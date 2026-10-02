# SimplePOS — CodeIgniter 4

A student POS account-management application built with CodeIgniter 4.

## Laboratory features

- Database-backed customer and user listings
- Add and edit customer accounts
- Add and edit user/staff accounts
- Server-side form validation and unique email/username checks
- JPG/PNG avatar upload on the user edit page (maximum 2 MB)
- Automatic 300 × 300 display-ready avatar preparation
- Placeholder image when no avatar is available
- Five sample customer records and five sample user records
- SQLite database migration, seeder, and SQL export

## Run locally

Requirements: PHP 8.2+, Composer, and the `intl`, `mbstring`, `sqlite3`, and `gd` extensions.

```bash
composer install
php spark migrate --all
php spark db:seed PosSeeder
php spark serve
```

Then open `http://localhost:8080`.

## Main routes

| URL | Purpose |
| --- | --- |
| `/customers` | List customer accounts |
| `/customers/new` | Add a customer |
| `/customers/edit/{id}` | Edit a customer |
| `/users` | List user accounts and avatars |
| `/users/new` | Add a user |
| `/users/edit/{id}` | Edit a user and upload an avatar |

## Database export

The submission-ready SQL export is located at `database/pos_database_export.sql`.

## Render deployment

The included Dockerfile installs SQLite and GD, creates the required writable directories, runs migrations and sample-data seeding, and starts CodeIgniter. Pushing changes to the existing GitHub repository will redeploy the existing Render service.
