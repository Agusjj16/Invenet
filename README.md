<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

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

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

You may also try the [Laravel Bootcamp](https://bootcamp.laravel.com), where you will be guided through building a modern Laravel application from scratch.

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
# Invenet - Sistema de Gestión de Inventario de Dispositivos

## 📌 Introducción al proyecto
Este sistema permite registrar, visualizar y gestionar dispositivos tecnológicos dentro de una organización.  
Los usuarios pueden reportar anomalías, generar órdenes de reparación y consultar el estado de los equipos.

El backend se encarga de la lógica de negocio, la conexión con la base de datos, la autenticación de usuarios y la exposición de endpoints para consumo por parte del frontend.

---

## ⚙️ Arquitectura general

- **Patrón:** MVC (Model - View - Controller)
- **Lenguaje:** PHP
- **Framework:** Laravel 11
- **Base de datos:** MySQL
- **API REST:** Laravel Sanctum para autenticación
- **Herramientas de desarrollo:**
  - Postman (para testing de endpoints)
  - Git (control de versiones)
  - Laravel Artisan (gestión de comandos)
  - Laravel Tinker (testing interactivo en consola)

---

## 🗂️ Estructura del código

- `app/Models/`: modelos Eloquent (Dispositivo, Rol, Usuario, etc.)
- `app/Http/Controllers/API/`: controladores RESTful
- `routes/api.php`: definición de rutas protegidas
- `database/migrations/`: migraciones para estructura de la base de datos

---

## 🔁 Endpoints y API

- Los endpoints están protegidos por `auth:sanctum`
- Pruebas realizadas con Postman
- Flujo típico: el frontend envía datos → el backend valida → guarda en DB → devuelve respuesta JSON

---

## 🧩 Base de datos

- Modelo relacional con claves foráneas y migraciones:
  - `users`, `roles`, `dispositivos`, `salas`, `permisos`, `informe_anomalia`, `orden_reparacion`
- Migraciones automáticas con Artisan
- Seeders opcionales para carga inicial

---

## 🔐 Seguridad y autenticación

- Laravel Sanctum (token-based authentication)
- Middleware `auth:sanctum` en rutas API
- Cada usuario tiene un rol que define su nivel de acceso

---

## ⚠️ Errores y validaciones

- Validaciones personalizadas con `Validator`
- Respuestas con formato estandarizado y códigos HTTP apropiados (200, 404, 422, etc.)
- Estructura JSON para todos los mensajes

---

## ✅ Buenas prácticas

- Uso de control de versiones con Git y ramas
- Código modular y comentado
- Estructura RESTful en endpoints
- Código limpio y organizado

---

## 🛠️ Instalación y uso local

### Requisitos
- PHP >= 8.2
- Composer
- MySQL
- Node.js y npm (opcional si hay frontend)
  
### Pasos

```bash
# Clonar el repositorio
git clone https://github.com/Agusjj16/Invenet.git
cd Invenet

# Instalar dependencias
composer install

# Copiar el archivo de entorno y configurar
cp .env.example .env
php artisan key:generate

# Configurar base de datos en .env
DB_DATABASE=nombre_de_tu_db
DB_USERNAME=usuario
DB_PASSWORD=contraseña

# Ejecutar migraciones
php artisan migrate

# Levantar el servidor local
php artisan serve
Ahora podés acceder a tu API en:
http://127.0.0.1:8000/api