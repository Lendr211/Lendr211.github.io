# Исправление PATH для Node.js
Write-Host "Исправление PATH для Node.js..." -ForegroundColor Green

# Проверяем, есть ли Node.js в PATH
$nodePath = "C:\Program Files\nodejs"
$currentPath = [Environment]::GetEnvironmentVariable("PATH", "Machine")

if ($currentPath -notlike "*$nodePath*") {
    # Добавляем Node.js в системные переменные PATH
    $newPath = $currentPath + ";" + $nodePath
    [Environment]::SetEnvironmentVariable("PATH", $newPath, "Machine")
    Write-Host "Node.js добавлен в системные переменные PATH" -ForegroundColor Green
} else {
    Write-Host "Node.js уже есть в PATH" -ForegroundColor Yellow
}

Write-Host "Перезапустите PowerShell и попробуйте снова" -ForegroundColor Yellow
Read-Host "Нажмите Enter для продолжения"

