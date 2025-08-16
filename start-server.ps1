# Запуск 3D Portfolio сервера
Write-Host "Запуск 3D Portfolio сервера..." -ForegroundColor Green

# Устанавливаем переменные окружения
$env:NODE_PATH = "C:\Program Files\nodejs"
$env:PATH = "$env:NODE_PATH;$env:PATH"

# Переходим в папку проекта
Set-Location "C:\Users\moiyy\Desktop\portfolio-3d"

# Проверяем версию node
Write-Host "Проверка Node.js..." -ForegroundColor Yellow
& "$env:NODE_PATH\node.exe" --version

# Проверяем версию npm
Write-Host "Проверка npm..." -ForegroundColor Yellow
& "$env:NODE_PATH\npm.cmd" --version

# Запускаем сервер
Write-Host "Запуск сервера..." -ForegroundColor Yellow
& "$env:NODE_PATH\npm.cmd" run dev
