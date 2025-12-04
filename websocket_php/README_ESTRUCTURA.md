# 📁 Estructura del Proyecto WebSocket

## 🎯 Ubicación Correcta de Archivos

### ✅ Estructura Actual (Organizada y Clara)

```
C:\Users\marti\OneDrive\Escritorio\websocket_php\
├── cliente\                    ← 📝 ARCHIVOS FUENTE DEL CLIENTE
│   ├── client.html             ← ✅ Aquí editas el cliente
│   └── ABRIR_CHAT.bat         ← ✅ Script para abrir el chat
│
├── daemons\                    ← 🖥️ SERVIDOR WEBSOCKET
│   └── sala_chat\              ← ✅ Servidor (ejecutar aquí)
│       ├── SalaChatServer.php
│       ├── websockets.php
│       ├── users.php
│       └── INICIO_RAPIDO.bat
│
└── INSTALAR.bat                ← ✅ Ejecuta esto primero

C:\xampp\                       ← ✅ XAMPP instalado aquí (no lo muevas)
└── htdocs\
    └── sala_chat\              ← 🌐 COPIA PARA WEB (Apache sirve desde aquí)
        └── client.html         ← ✅ Copia automática de cliente\client.html
```

## 📋 Pasos para Configurar

### 1️⃣ Primera vez: Instalar archivos en XAMPP

Ejecuta desde la raíz del proyecto:
```
INSTALAR.bat
```

**¿Qué hace?**
- Copia `cliente\client.html` → `C:\xampp\htdocs\sala_chat\client.html`
- Crea la carpeta en htdocs si no existe

### 2️⃣ Iniciar el servidor WebSocket

Doble clic en:
```
daemons\sala_chat\INICIO_RAPIDO.bat
```

O ejecuta manualmente:
```batch
"C:\xampp\php\php.exe" -q "C:\Users\marti\OneDrive\Escritorio\websocket_php\daemons\sala_chat\SalaChatServer.php"
```

**Verás:**
```
Server started
Listening on: localhost:9000
```

⚠️ **NO CIERRES esta ventana** mientras uses el chat.

### 3️⃣ Abrir el cliente en el navegador

**Opción A - Script automático:**
```
cliente\ABRIR_CHAT.bat
```

**Opción B - Manual:**
Abre tu navegador y ve a:
```
http://localhost/sala_chat/client.html
```

## 🔍 Explicación de Cada Carpeta

### 📝 `cliente/` - Archivos Fuente del Cliente
- **Ubicación**: En tu proyecto
- **Contiene**: `client.html` (archivo que editas)
- **Función**: Aquí trabajas y editas el código del cliente
- **NO es accesible vía web directamente**

### 🖥️ `daemons/sala_chat/` - Servidor WebSocket
- **Ubicación**: En tu proyecto
- **Contiene**: Código PHP del servidor
- **Función**: Proceso que corre en segundo plano, escucha en puerto 9000
- **Ejecutar**: `INICIO_RAPIDO.bat`

### 🌐 `C:\xampp\htdocs\sala_chat/` - Copia para Web
- **Ubicación**: En XAMPP (fuera de tu proyecto)
- **Contiene**: Copia de `client.html`
- **Función**: Apache sirve archivos desde `htdocs\`
- **Acceso**: `http://localhost/sala_chat/client.html`
- **Se actualiza**: Ejecutando `INSTALAR.bat` de nuevo

## ⚙️ Si XAMPP está en otra ubicación

Edita `INSTALAR.bat` y cambia:
```batch
set XAMPP_PATH=C:\xampp
```

Por tu ruta, por ejemplo:
```batch
set XAMPP_PATH=D:\xampp
```

## 🔄 Flujo de Trabajo

### Cuando editas `client.html`:

1. **Editas**: `cliente\client.html`
2. **Copias a XAMPP**: Ejecuta `INSTALAR.bat` (o copia manualmente)
3. **Pruebas**: Abre `http://localhost/sala_chat/client.html`

### Uso diario:

1. **Iniciar servidor**: `daemons\sala_chat\INICIO_RAPIDO.bat`
2. **Abrir cliente**: `cliente\ABRIR_CHAT.bat` o `http://localhost/sala_chat/client.html`

## 🚀 Probar Multiusuario

1. Inicia el servidor (Paso 2)
2. Abre varias pestañas del navegador con `http://localhost/sala_chat/client.html`
3. En cada pestaña, ingresa un alias diferente (PEPE, MARIETTA, etc.)
4. Haz clic en "Reconectar" en cada pestaña
5. Envía mensajes desde una pestaña y verás que aparecen en todas

## 📊 Resumen Visual

```
┌─────────────────────────────────────────┐
│  cliente\                               │
│  → Editas aquí                          │
│  → client.html (fuente)                 │
└─────────────────────────────────────────┘
              ↓ (INSTALAR.bat copia)
┌─────────────────────────────────────────┐
│  C:\xampp\htdocs\sala_chat\            │
│  → Apache sirve desde aquí             │
│  → client.html (copia)                 │
└─────────────────────────────────────────┘
              ↕️ (comunicación WebSocket)
┌─────────────────────────────────────────┐
│  daemons\sala_chat\                    │
│  → Servidor corriendo                  │
│  → Escucha en puerto 9000              │
└─────────────────────────────────────────┘
```

¡Listo! 🎉
