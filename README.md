# POS System — TFA4

A CodeIgniter 4 POS application that manages customer and user account records from MySQL using Models.

## Requirements

- PHP 8.2 or newer
- Composer
- MySQL

## Setup

1. Open MySQL and create the database:

   ```sql
   CREATE DATABASE pos_system CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
   ```

2. Update `.env` if your MySQL username or password differs from the included local defaults.
3. Install dependencies with `composer install`.
4. Create the tables and insert the sample records:

   ```bash
   php spark migrate
   php spark db:seed AppSeeder
   ```

5. Start the application with `php spark serve`.
6. Visit `/login` and sign in with `admin01` and `Password123!`.

Alternatively, import `database/setup.sql` in phpMyAdmin or MySQL instead of running the migration and seeder commands. Do not use both methods, because that would duplicate the sample data.

## Database structure

- `customers`: `id`, `full_name`, `email`, `phone`, `created_at`
- `users`: `id`, `username`, `password`, `full_name`, `avatar`, `created_at`

## Authentication

Customer and user account pages are protected by the `auth` filter. Existing seeded users use the demo password `Password123!`; change passwords through the user edit form after signing in. Passwords are stored as hashes and are checked with `password_verify()`.

`/logout` destroys the current session and returns to the login page. Requests to `/customers`, `/customers/new`, `/customers/:id/edit`, `/users`, `/users/new`, and `/users/:id/edit` redirect to `/login` when no session is present.

## TFA3 features

- Create and edit customer accounts at `/customers/new` and `/customers/:id/edit`.
- Create and edit user accounts at `/users/new` and `/users/:id/edit`.
- Usernames are required and unique; customer email addresses must be valid.
- User avatars accept JPG or PNG files up to 2 MB. The saved image is resized to a 300 × 300 display-ready thumbnail in `public/uploads`, while only its filename is stored in the database.
- Users without an avatar show an initial-based placeholder.

After applying the new migration, make sure `public/uploads` exists and is writable by the web server. Existing TFA2 databases should be upgraded with:

```bash
php spark migrate
```

The original TFA1 navigation and table presentation are retained. The old `role` display was replaced with `created_at` because `role` is not included in the required TFA2 schema.
