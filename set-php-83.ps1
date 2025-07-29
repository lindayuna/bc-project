# Set-PHP-83.ps1
# This script sets PHP 8.3.21 from Laragon as the default PHP version

# Define the path to PHP 8.3.21
$php83Path = "C:\laragon\bin\php\php-8.3.21-nts-Win32-vs16-x64"

# Check if PHP 8.3.21 exists
if (-not (Test-Path "$php83Path\php.exe")) {
    Write-Host "PHP 8.3.21 not found at $php83Path" -ForegroundColor Red
    exit 1
}

# Get the current PATH values
$userPath = [System.Environment]::GetEnvironmentVariable('Path', 'User')
$systemPath = [System.Environment]::GetEnvironmentVariable('Path', 'Machine')

# Remove any existing PHP paths from the user PATH
$userPathParts = $userPath -split ';' | Where-Object { $_ -notlike "*\php*" }
$newUserPath = ($userPathParts -join ';').Trim(';')

# Add PHP 8.3.21 to the beginning of user PATH
$newUserPath = "$php83Path;$newUserPath"
[System.Environment]::SetEnvironmentVariable('Path', $newUserPath, 'User')

Write-Host "PHP 8.3.21 has been set as the default PHP version in your user PATH." -ForegroundColor Green
Write-Host "IMPORTANT: You need to restart your terminal/IDE for the changes to take effect." -ForegroundColor Yellow

# Display a warning if there's a PHP in the system PATH
if ($systemPath -like "*\php*") {
    Write-Host "`nWARNING: PHP installations were found in your system PATH:" -ForegroundColor Red
    $systemPath -split ';' | Where-Object { $_ -like "*\php*" } | ForEach-Object {
        Write-Host "  - $_" -ForegroundColor Red
    }
    Write-Host "`nIf you still experience issues with PHP version selection, you may need to:" -ForegroundColor Yellow
    Write-Host "1. Open System Properties (Win+Pause)" -ForegroundColor Yellow
    Write-Host "2. Click 'Advanced system settings'" -ForegroundColor Yellow
    Write-Host "3. Click 'Environment Variables'" -ForegroundColor Yellow
    Write-Host "4. In the 'System variables' section, find and edit 'Path'" -ForegroundColor Yellow
    Write-Host "5. Remove or reorder the PHP entries to ensure your preferred PHP comes first" -ForegroundColor Yellow
}

# Show the current PHP version from our desired path
Write-Host "`nVerifying PHP version from $php83Path" -ForegroundColor Cyan
& "$php83Path\php.exe" -v
