@echo off
echo ========================================
echo   INSTALANDO SALA DE CHAT WEBSOCKET
echo ========================================
echo.
echo Este script copiara los archivos necesarios a XAMPP
echo.

set XAMPP_PATH=C:\xampp
set PROJECT_PATH=%~dp0

echo Verificando XAMPP en %XAMPP_PATH%...
if not exist "%XAMPP_PATH%\htdocs" (
    echo.
    echo ERROR: No se encontro XAMPP en %XAMPP_PATH%
    echo Por favor, edita este archivo y cambia XAMPP_PATH a tu ubicacion de XAMPP
    pause
    exit /b 1
)

echo.
echo Creando carpeta en htdocs...
if not exist "%XAMPP_PATH%\htdocs\sala_chat" mkdir "%XAMPP_PATH%\htdocs\sala_chat"

echo.
echo Copiando archivos del cliente...
echo   Desde: %PROJECT_PATH%cliente\client.html
echo   Hacia: %XAMPP_PATH%\htdocs\sala_chat\client.html
copy /Y "%PROJECT_PATH%cliente\client.html" "%XAMPP_PATH%\htdocs\sala_chat\client.html" >nul

echo.
echo ========================================
echo   INSTALACION COMPLETADA
echo ========================================
echo.
echo Archivos copiados a:
echo   - Cliente: %XAMPP_PATH%\htdocs\sala_chat\client.html
echo.
echo Ahora puedes:
echo   1. Ejecutar: daemons\sala_chat\INICIO_RAPIDO.bat (para iniciar el servidor)
echo   2. Abrir: http://localhost/sala_chat/client.html (en tu navegador)
echo.
pause

