@echo off
echo Установка Node.js для 3D Portfolio...
echo.

echo Скачивание Node.js...
powershell -Command "& {Invoke-WebRequest -Uri 'https://nodejs.org/dist/v20.10.0/node-v20.10.0-x64.msi' -OutFile 'nodejs-installer.msi'}"

echo.
echo Запуск установщика...
start /wait nodejs-installer.msi

echo.
echo Очистка временных файлов...
del nodejs-installer.msi

echo.
echo Установка завершена! Перезапустите PowerShell и выполните:
echo npm install
echo npm run dev
echo.
pause
