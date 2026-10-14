# Mathematics by Ajay Mittal

Premium public website for mathematics coaching (Laravel 13, Blade, Tailwind CSS 4, Vite). Content is driven by PHP configuration files so it can later be replaced with a MySQL-backed admin panel without rewriting the frontend.

## Requirements

- Docker & Docker Compose
- (Optional) Node.js 22+ and PHP 8.4+ for local development without Docker
- Use php for artisan commands: /opt/alt/php83/usr/bin/php

## Quick start (Docker)

```bash
cp .env.example .env
# Set DB_CONNECTION=mysql and DB_HOST=mysql for Docker (see .env.example)

docker run --rm -v "$(pwd):/app" -w /app composer:2 php artisan key:generate
docker run --rm -v "$(pwd):/app" -w /app composer:2 install
docker compose --profile build run --rm node
docker compose up -d --build

docker compose exec app php artisan migrate --seed
docker compose exec app php artisan maths:create-admin \
  --name="Admin User" --email="admin@example.com" --password="ChangeMeNow123!"
```

Admin panel: [http://localhost:8080/admin](http://localhost:8080/admin)

### MySQL connection refused?

`Connection refused` on `Host: mysql` almost always means the **MySQL container was not running or not ready yet**.

```bash
docker compose up -d mysql app nginx   # start MySQL + app (not only nginx)
docker compose ps                      # maths-ajay-mysql should be Up (healthy)
# wait until healthy, then:
docker compose exec app php artisan migrate --seed
```

Ensure `.env` uses `DB_HOST=mysql` when you run Artisan **inside** the `app` container. Use `DB_HOST=127.0.0.1` only if you run PHP on the host and MySQL is exposed on port 3306.

Open [http://localhost:8080](http://localhost:8080) (override with `APP_PORT` in `.env`).

### Vite dev server (optional)

```bash
docker compose --profile dev up vite
```

Run `php artisan serve` is not required when using nginx + php-fpm from Compose.

## Local development (without Docker)

```bash
composer install
cp .env.example .env
php artisan key:generate
npm ci
npm run dev   # terminal 1
php artisan serve --port=8000   # terminal 2
```

## Content management

**MySQL is the source of truth** for public content after migration/seeding.

- Run `php artisan migrate --seed` to import initial content from the legacy config files (only when tables are empty).
- Manage courses, resources, test papers, FAQs, testimonials, achievements, enquiries and site JSON from **`/admin`**.
- Legacy config files remain as defaults/fallbacks for site settings merge and the one-time import seeder.

Create administrators safely:

```bash
php artisan maths:create-admin --name="..." --email="..." --password="..."
```

Roles: `super_admin`, `content_manager`, `staff` (enquiries-focused access).

PDF files are stored on the `local` disk (private). Public downloads go through Laravel routes (`resources.download`).

## Admission enquiries

Submissions are validated server-side with CSRF and rate limiting. By default, enquiries append to `storage/app/enquiries/YYYY-MM-DD.jsonl`. Set `ENQUIRY_HANDLER=mail` and configure mail in `.env` to send email (entries are still logged to file).

## Routes

- `/` — Homepage
- `/courses`, `/courses/{slug}` — Course catalogue and detail
- `/resources`, `/resources/{slug}`, `/resources/{slug}/download` — Resource library
- `/results`, `/about`, `/faq`, `/contact`
- `/sitemap.xml`, `/robots.txt`

## Future work (out of scope for this phase)

- Admin panel, student accounts, payments, subscriptions
- MySQL content storage (migrations and models)
- Access-controlled downloads

## License

Proprietary — Mathematics by Ajay Mittal.
