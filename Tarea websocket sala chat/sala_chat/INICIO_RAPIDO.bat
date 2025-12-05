@echo off
echo ========================================
echo   INICIANDO SERVIDOR WEBSOCKET
echo ========================================
echo.
echo El servidor se iniciara en localhost:9000
echo NO CIERRES ESTA VENTANA mientras uses el chat
echo.
echo Para detener el servidor, presiona Ctrl+C
echo.
echo ========================================
echo.

cd /d "%~dp0"
"C:\xampp\php\php.exe" -q SalaChatServer.php

pause

