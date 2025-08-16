@echo off
echo Исправление PATH для Node.js...
echo.

REM Добавляем Node.js в системные переменные PATH
setx PATH "%PATH%;C:\Program Files\nodejs" /M

echo.
echo Node.js добавлен в системные переменные PATH
echo Перезапустите PowerShell и попробуйте снова
echo.
pause

