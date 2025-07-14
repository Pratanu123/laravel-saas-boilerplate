# Laravel SaaS Boilerplate 🚀

A modern, scalable SaaS boilerplate built on **Laravel 12**, powered by **Docker**, **MySQL**, **Redis**, and **OAuth2 authentication** using **Laravel Passport**.

> ✅ Perfect for bootstrapping your next SaaS product, admin dashboard, or multi-tenant platform.  
> Built by [Pratanu Khajanchi](https://github.com/pratanu-k) — Senior Backend Engineer with 6+ years experience in Laravel, Golang, and real-time systems.

---

## ⚙️ Tech Stack

- **Framework**: Laravel 12 (PHP 8.2+)
- **Auth**: OAuth2 with Laravel Passport
- **Database**: MySQL (via Docker)
- **Cache/Queue**: Redis
- **Permissions**: Spatie Laravel Permission (RBAC)
- **Multi-Tenancy**: Scoped via `tenant_id`
- **Containers**: Docker + Laravel Sail
- **CI/CD**: GitHub Actions (coming soon)
- **Frontend**: Laravel Blade (clean admin scaffolding)

---

## 🚀 Getting Started

### 🐳 Requirements

- Docker Desktop (macOS/Windows)
- Git
- No local PHP/MySQL installation needed

### 🔧 Setup

```bash
git clone https://github.com/pratanu-k/laravel-saas-boilerplate.git
cd laravel-saas-boilerplate

cp .env.example .env
./vendor/bin/sail up -d
./vendor/bin/sail artisan key:generate
./vendor/bin/sail artisan migrate --seed
./vendor/bin/sail artisan passport:install
Visit the app at: http://localhost

🔐 Authentication
OAuth2 via Laravel Passport:

POST /oauth/token for access token

Supports: Password Grant, Client Credentials

Token scopes and guards extendable

Includes sample AuthController for:

Register (/api/register)

Login (/api/login)

Get user (/api/me)

Logout (/api/logout)

🧱 Features
✅ Dockerized Laravel 12 Setup

✅ MySQL & Redis via Sail

✅ OAuth2 Authentication (Passport)

✅ Multi-tenancy via tenant_id scoped models

✅ RBAC using Spatie Permissions

 Modular Services (User, Tenant, Billing)

 REST API + Swagger Docs

 CI Pipeline via GitHub Actions

 Seeders + Factories + Sample Tenants

🧪 Testing
bash
Copy
Edit
./vendor/bin/sail test
(PHPUnit configured — Pest optional)

📂 Folder Structure

app/
├── Http/
│   └── Controllers/Api/AuthController.php
├── Models/User.php
├── Models/Tenant.php
├── Traits/BelongsToTenant.php
routes/
├── api.php
├── web.php
database/
├── seeders/RoleSeeder.php
├── seeders/TenantSeeder.php
📄 License
MIT — Free to use for personal and commercial projects.

👨‍💻 Maintainer
Pratanu Khajanchi
Senior Backend Engineer
💼 PHP | Laravel | Golang | Kafka | Microservices
🌍 PropTech | EdTech | InsurTech | Real-time Systems


⭐ If you find this useful, give it a star!
💬 Feel free to fork, contribute, or connect with me.

---

## ✨ What Changed
✅ Added **Multi-tenancy** details  
✅ Mentioned **Role-Based Access Control** (RBAC)  
✅ Updated folder structure to reflect new models/seeders  
✅ Added `/api` routes and `AuthController` usage  
✅ Updated migrate step to `--seed`  
