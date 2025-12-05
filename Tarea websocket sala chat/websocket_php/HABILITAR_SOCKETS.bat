@echo off
echo ========================================
echo   HABILITANDO EXTENSION SOCKETS EN PHP
echo ========================================
echo.

set PHP_INI=C:\xampp\php\php.ini

if not exist "%PHP_INI%" (
    echo ERROR: No se encontro php.ini en %PHP_INI%
    echo Por favor, verifica la ruta de XAMPP
    pause
    exit /b 1
)

echo Haciendo backup del php.ini...
copy "%PHP_INI%" "%PHP_INI%.backup" >nul
echo Backup creado: %PHP_INI%.backup
echo.

echo Descomentando extension=sockets...
powershell -Command "(Get-Content '%PHP_INI%') -replace ';extension=sockets', 'extension=sockets' | Set-Content '%PHP_INI%'"

echo.
echo ========================================
echo   EXTENSION HABILITADA
echo ========================================
echo.
echo La extension sockets ha sido habilitada en php.ini
echo.
echo IMPORTANTE: Si el servidor WebSocket esta corriendo,
echo             debes cerrarlo y volverlo a iniciar.
echo.
pause

