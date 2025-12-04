# CMS de Artículos - CakePHP 4

## 📋 Descripción del Proyecto

Aplicación web tipo CMS (Content Management System) desarrollada con **CakePHP 4** que permite gestionar artículos de manera completa. El proyecto demuestra el dominio del ciclo **MVC (Model-View-Controller)**, las convenciones de CakePHP y las operaciones básicas **CRUD** (Crear, Leer, Editar, Eliminar).

### Objetivo General

Construir una aplicación web tipo CMS usando CakePHP 4 que permita gestionar artículos y mostrar esos artículos en la web, demostrando el entendimiento del ciclo MVC, las convenciones de CakePHP y las operaciones CRUD.

---

## ✨ Funcionalidades Implementadas

### Funcionalidades Mínimas Obligatorias ✅

- ✅ **Listado de artículos (index)**: Muestra títulos y fecha con paginación
- ✅ **Ver un artículo (view)**: Muestra título, contenido, fecha y enlace para editar
- ✅ **Agregar artículo (add)**: Formulario con validación y mensajes flash
- ✅ **Editar artículo (edit)**: Formulario para actualizar con validación
- ✅ **Eliminar artículo (delete)**: Solo por POST/DELETE usando `Form->postLink()` con confirmación
- ✅ **Modelo + Entidad Articles**: Con comportamiento Timestamp
- ✅ **Generación automática de slug**: Implementado en `beforeSave()` y uso de `findBySlug()` para rutas amigables
- ✅ **Validación del modelo**: `validationDefault()` para `title` y `body`
- ✅ **Componentes**: Paginator y Flash implementados
- ✅ **Rutas amigables**: URLs tipo `/articles/view/first-post`

### Funcionalidades Extras Implementadas 🎁

- 🎁 **Sistema de etiquetas (Tags)**: Relación many-to-many con tabla `articles_tags`
- 🎁 **Relación con usuarios**: Sistema de usuarios con relación `belongsTo`
- 🎁 **Gestión de tags**: Asignación de múltiples etiquetas a cada artículo

---

## 🛠️ Requisitos Previos

Antes de comenzar, asegúrate de tener instalado:

- **PHP 7.4 o superior**
- **Composer** ([Descargar Composer](https://getcomposer.org/download/))
- **MySQL/MariaDB** (o cualquier base de datos compatible)
- **Servidor web** (Apache con mod_rewrite habilitado) o usar el servidor de desarrollo de CakePHP

---

## 📦 Instalación

### 1. Clonar o descargar el proyecto

```bash
cd C:\xampp\htdocs\CakePHP
```

### 2. Instalar dependencias con Composer

```bash
composer install
```

Esto instalará CakePHP 4 y todas las dependencias necesarias.

### 3. Configurar la base de datos

#### Opción A: Usando el archivo SQL proporcionado

1. Crea la base de datos en MySQL:
```sql
CREATE DATABASE cake_cms CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
```

2. Importa el archivo `database.sql`:
```bash
mysql -u root -p cake_cms < database.sql
```

O desde phpMyAdmin:
- Selecciona la base de datos `cake_cms`
- Ve a la pestaña "Importar"
- Selecciona el archivo `database.sql` y ejecuta

#### Opción B: Verificar configuración en config/app.php

Abre el archivo `config/app.php` y verifica la configuración de la base de datos (líneas 237-282):

```php
'Datasources' => [
    'default' => [
        'className' => 'Cake\Database\Connection',
        'driver' => 'Cake\Database\Driver\Mysql',
        'host' => 'localhost',
        'username' => 'root',        // Cambia si es necesario
        'password' => '',            // Cambia si es necesario
        'database' => 'cake_cms',    // Nombre de tu base de datos
        'encoding' => 'utf8mb4',
        // ...
    ],
],
```

Ajusta `username` y `password` según tu configuración de MySQL.

### 4. Verificar permisos (Windows)

En Windows generalmente no hay problemas de permisos, pero asegúrate de que los directorios `tmp` y `logs` existan y sean accesibles.

---

## 🚀 Ejecutar el Proyecto

### Opción 1: Servidor de desarrollo de CakePHP (Recomendado)

Ejecuta el servidor de desarrollo integrado de CakePHP:

```bash
bin/cake server
```

Luego accede a la aplicación en tu navegador:

```
http://localhost:8765
```

O si prefieres especificar el puerto:

```bash
bin/cake server -p 8765
```

### Opción 2: Usando XAMPP/Apache

1. Asegúrate de que **mod_rewrite** esté habilitado en Apache
2. Inicia Apache y MySQL desde el panel de control de XAMPP
3. Accede a la aplicación:

```
http://localhost/CakePHP
```

**Nota**: Si usas XAMPP, verifica que mod_rewrite esté habilitado. Consulta `GUIA_INSTALACION.md` para más detalles.

---

## 📁 Estructura del Proyecto

```
CakePHP/
├── config/                 # Configuración de la aplicación
│   ├── app.php            # Configuración principal (incluye DB)
│   └── routes.php         # Definición de rutas
├── database.sql            # Script SQL para crear la base de datos
├── src/
│   ├── Controller/
│   │   ├── AppController.php
│   │   ├── ArticlesController.php  # Controlador principal
│   │   ├── TagsController.php
│   │   └── UsersController.php
│   └── Model/
│       ├── Entity/
│       │   ├── Article.php          # Entidad Article
│       │   ├── Tag.php
│       │   └── User.php
│       └── Table/
│           ├── ArticlesTable.php    # Modelo con validaciones y slug
│           ├── TagsTable.php
│           └── UsersTable.php
└── templates/
    └── Articles/
        ├── index.php      # Listado de artículos
        ├── view.php       # Ver un artículo
        ├── add.php        # Agregar artículo
        └── edit.php       # Editar artículo
```

---

## 🎯 Uso de la Aplicación

### Acceder al listado de artículos

```
http://localhost:8765
```

O directamente:

```
http://localhost:8765/articles
```

### Operaciones CRUD

1. **Listar artículos**: Página principal muestra todos los artículos con paginación
2. **Ver artículo**: Click en el título del artículo o accede a `/articles/view/nombre-del-slug`
3. **Agregar artículo**: Click en "➕ Agregar Artículo" o accede a `/articles/add`
4. **Editar artículo**: Click en "✏️ Editar" en el listado o en la vista del artículo
5. **Eliminar artículo**: Click en "🗑️ Eliminar" (con confirmación)

### Rutas Amigables

Las rutas utilizan slugs en lugar de IDs:
- ✅ `/articles/view/first-post` (en lugar de `/articles/view/1`)
- ✅ `/articles/edit/first-post`
- ✅ `/articles/delete/first-post`

---

## 🔍 Características Técnicas

### Validaciones Implementadas

- **Título**: Requerido, mínimo 3 caracteres, máximo 255 caracteres
- **Contenido**: Requerido, mínimo 10 caracteres

### Generación de Slug

Los slugs se generan automáticamente desde el título usando `Text::slug()` en el método `beforeSave()` del modelo.

### Componentes Utilizados

- **Paginator**: Para paginación del listado de artículos
- **Flash**: Para mensajes de éxito/error al usuario

### Relaciones de Base de Datos

- `articles` → `belongsTo` → `users`
- `articles` → `belongsToMany` → `tags` (tabla intermedia: `articles_tags`)

---

## 🐛 Solución de Problemas

### Error: "Class not found" o "vendor/autoload.php not found"
```bash
composer install
```

### Error: "mod_rewrite not enabled"
- Consulta `GUIA_INSTALACION.md` para habilitar mod_rewrite en Apache
- O usa el servidor de desarrollo: `bin/cake server`

### Error: "404 Not Found"
- Verifica que los archivos `.htaccess` estén en su lugar
- Verifica que mod_rewrite esté habilitado
- Intenta acceder directamente a: `http://localhost/CakePHP/webroot/index.php`

### Error de conexión a la base de datos
- Verifica que MySQL esté corriendo
- Verifica las credenciales en `config/app.php` (líneas 249-251)
- Verifica que la base de datos `cake_cms` exista y tenga las tablas
- Importa el archivo `database.sql` si las tablas no existen

### Error: "Table 'cake_cms.articles' doesn't exist"
```bash
# Importa el archivo SQL
mysql -u root -p cake_cms < database.sql
```

---

## 📸 Capturas de Pantalla

> **Nota**: Agrega aquí capturas de pantalla de:
> - Listado de artículos (index)
> - Vista de un artículo (view)
> - Formulario de agregar (add)
> - Formulario de editar (edit)
> - Mensajes flash de éxito/error

---

## 📝 Checklist de Entrega

- [x] Base de datos creada + INSERT de ejemplo
- [x] ArticlesTable + Article entity
- [x] ArticlesController con index, view, add, edit, delete
- [x] Templates: index.php, view.php, add.php, edit.php
- [x] Validaciones en validationDefault
- [x] beforeSave para slug
- [x] Paginator y Flash funcionando
- [x] README con pasos de instalación y ejecución
- [ ] Capturas de pantalla de cada vista (pendiente de agregar)

---

## 👨‍💻 Autor

[Tu nombre aquí]

---

## 📄 Licencia

Este proyecto es parte de un trabajo académico desarrollado con CakePHP 4.

---

## 🔗 Referencias

- [Documentación oficial de CakePHP 4](https://book.cakephp.org/4/en/index.html)
- [CakePHP Cookbook](https://book.cakephp.org/4/en/index.html)

---

## 📧 Contacto

Para preguntas o sugerencias sobre este proyecto, contacta a: [tu-email@ejemplo.com]

