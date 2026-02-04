<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Foods Prototype – Dish-First Food Discovery

This repository contains an **early prototype** of a dish-first food discovery platform.
The current implementation is built with **Laravel (PHP)**, but the core value is **framework-agnostic** and intended to be portable to **Node.js / API-first architectures**.

---

## 🍽️ Core Concept (Important for Node Team)

**Dish-first, not restaurant-first**

Instead of searching by restaurant names, users discover food by:
- Dishes
- Ingredients
- Real photos
- Community reviews
- Location & availability

Think:
> “Show me this dish, where to eat it, what’s inside, and whether people actually like it.”

---

## 🧠 Product Pillars

1. **Dish-first search**
   - Search by dish names and menu items
   - One dish → many restaurants

2. **Photo-based reviews**
   - Real photos from users
   - Ratings attached to dishes (not only restaurants)

3. **Map & open-now**
   - Distance, directions, open hours
   - Designed for geo-based queries

4. **Ingredient insights (future)**
   - Suggested ingredients
   - Allergens (beta / coming soon)

5. **Future ingredient marketplace**
   - Ingredients can be added to cart
   - One-click ordering (planned)

---

## 🧱 Current Tech (Prototype Only)

- Backend: **Laravel**
- Frontend: Blade + Tailwind
- Database: MySQL
- Purpose: **UI / UX + concept validation**

⚠️ Laravel is **not a hard requirement** for the final system.

---

## 🧩 What Node Team Can Reuse

### ✅ UX & Feature Flow
- Landing page structure
- Feature prioritization
- Dish → Review → Location journey

### ✅ Domain Model Ideas
You can safely reuse these entities:

```txt
Dish
Restaurant
Review
Photo
Ingredient
User
Location


# Foods Prototype – Dish-First Food Discovery

This repository contains an early prototype of a dish-first food discovery platform. The current implementation is built with Laravel (PHP), but the core idea and product direction are framework-agnostic and intentionally designed to be portable to a Node.js / API-first architecture.

## Core Concept

Dish-first, not restaurant-first.

Instead of searching by restaurant names, users discover food by dishes, ingredients, real photos, and community reviews, combined with location and availability data. The goal is to answer questions like: “What is this dish?”, “Where can I eat it nearby?”, “What’s inside it?”, and “Do people actually like it?”

## Product Pillars

Dish-first search allows users to search by menu items and dishes rather than business names. Photo-based reviews focus on real user-submitted photos and ratings tied directly to dishes. Map and open-now features provide distance, directions, and current opening status. Ingredient insights (planned) aim to surface suggested ingredients and allergen information. A future ingredient marketplace concept allows users to add ingredients to a cart and order them in one click.

## Current Technology (Prototype Only)

Backend is implemented using Laravel (PHP), frontend uses Blade and Tailwind CSS, and the database is MySQL. This codebase exists primarily for UI, UX, and product concept validation. Laravel is not a required technology for the final system.

## What the Node Team Can Reuse

This repository is most valuable as a reference for UX flow, feature prioritization, and domain modeling rather than implementation details. The following domain concepts are central to the product and can be reused directly:

Dish, Restaurant, Review, Photo, Ingredient, User, and Location.

Typical relationships include dishes belonging to multiple restaurants, reviews and photos attached to dishes, ingredients linked to dishes, and restaurants tied to geographic locations.

## Suggested Node Architecture (Guideline)

This prototype maps well to a Node.js backend using frameworks such as NestJS, Express, or Fastify. A service-based or modular architecture is recommended, for example: dish service, review service, media service, location service, and user service. REST or GraphQL APIs, a search engine (e.g. Meilisearch or Elasticsearch), and CDN-backed media storage are expected in later stages.

## Project Structure (Current)

The landing directory contains marketing and landing page UI. Resources include views and UI components. Public stores static assets such as images and videos. The database directory contains migrations that can be used as conceptual references for schema design.

## How to Run (Optional)

Install dependencies, generate the application key, run migrations, and start the development server:

composer install  
cp .env.example .env  
php artisan key:generate  
php artisan migrate  
php artisan serve  

## Status

This project is a prototype intended for concept validation and handoff. It is not production-ready and is expected to be re-architected.

## Final Note

This repository exists to answer “What should we build?”, not “How exactly should it be built?”. The Node team is encouraged to freely redesign and implement the system based on these ideas.

Owner: ETTH / Thathundol  
Status: Prototype / Handoff



## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

- [Simple, fast routing engine](https://laravel.com/docs/routing).
- [Powerful dependency injection container](https://laravel.com/docs/container).
- Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
- Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
- Database agnostic [schema migrations](https://laravel.com/docs/migrations).
- [Robust background job processing](https://laravel.com/docs/queues).
- [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework. You can also check out [Laravel Learn](https://laravel.com/learn), where you will be guided through building a modern Laravel application.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains thousands of video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the [Laravel Partners program](https://partners.laravel.com).

### Premium Partners

- **[Vehikl](https://vehikl.com)**
- **[Tighten Co.](https://tighten.co)**
- **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
- **[64 Robots](https://64robots.com)**
- **[Curotec](https://www.curotec.com/services/technologies/laravel)**
- **[DevSquad](https://devsquad.com/hire-laravel-developers)**
- **[Redberry](https://redberry.international/laravel-development)**
- **[Active Logic](https://activelogic.com)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
