# Instrucciones para subir el proyecto a GitHub

## ⚠️ IMPORTANTE: Antes de subir

1. **Cambia el Security Salt**: En `config/app.php` línea 77, cambia `'__SALT__'` por un string aleatorio único.
   Puedes generar uno con: `openssl rand -base64 32` o usar cualquier string largo y aleatorio.

2. **Verifica las credenciales de base de datos**: Asegúrate de que `config/app.php` no tenga contraseñas reales en producción.

## Pasos para subir a GitHub

### 1. Inicializar Git (si no está inicializado)

```bash
cd C:\xampp\htdocs\CakePHP
git init
```

### 2. Agregar todos los archivos

```bash
git add .
```

### 3. Hacer el primer commit

```bash
git commit -m "Initial commit: CMS de Artículos con CakePHP 4"
```

### 4. Conectar con tu repositorio de GitHub

```bash
git remote add origin https://github.com/Martin-Granada/Trabajos-PWD.git
```

### 5. Verificar la conexión

```bash
git remote -v
```

### 6. Subir el código (primera vez)

```bash
git branch -M main
git push -u origin main
```

## Si ya tienes archivos en el repositorio

Si el repositorio ya tiene archivos (como un README), primero haz pull:

```bash
git pull origin main --allow-unrelated-histories
```

Luego resuelve cualquier conflicto y haz push:

```bash
git push -u origin main
```

## Comandos útiles para el futuro

### Ver el estado de los archivos
```bash
git status
```

### Agregar cambios específicos
```bash
git add archivo.php
git commit -m "Descripción del cambio"
git push
```

### Ver el historial
```bash
git log
```

## Nota sobre archivos ignorados

El archivo `.gitignore` está configurado para NO subir:
- `/vendor/` (se instala con `composer install`)
- `/tmp/` (archivos temporales)
- `/logs/` (archivos de log)
- Archivos de configuración local sensibles

Esto es correcto y recomendado.

