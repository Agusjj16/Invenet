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