@echo off
echo Запуск 3D Portfolio сервера...
echo.

REM Устанавливаем переменные окружения
set NODE_PATH=C:\Program Files\nodejs
set PATH=%NODE_PATH%;%PATH%

REM Переходим в папку проекта
cd /d "C:\Users\moiyy\Desktop\portfolio-3d"

REM Проверяем версию node
echo Проверка Node.js...
"%NODE_PATH%\node.exe" --version

REM Проверяем версию npm
echo Проверка npm...
"%NODE_PATH%\npm.cmd" --version

REM Запускаем сервер
echo.
echo Запуск сервера...
"%NODE_PATH%\npm.cmd" run dev

pause
