@echo off
echo ========================================
echo   ABRIENDO CLIENTE DE CHAT
echo ========================================
echo.
echo Asegurate de que el servidor WebSocket este corriendo primero!
echo   (Ejecuta: daemons\sala_chat\INICIO_RAPIDO.bat)
echo.
echo Abriendo client.html desde XAMPP...
echo   URL: http://localhost/sala_chat/client.html
echo.

set XAMPP_PATH=C:\xampp

if exist "%XAMPP_PATH%\htdocs\sala_chat\client.html" (
    start "" "http://localhost/sala_chat/client.html"
    echo.
    echo Pagina abierta en el navegador.
    echo Si no se abrio, ve manualmente a:
    echo http://localhost/sala_chat/client.html
) else (
    echo.
    echo ERROR: No se encontro client.html en %XAMPP_PATH%\htdocs\sala_chat\
    echo.
    echo Por favor ejecuta primero: INSTALAR.bat (en la raiz del proyecto)
    echo O copia manualmente client.html a %XAMPP_PATH%\htdocs\sala_chat\
)

echo.
pause
