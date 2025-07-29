param (
    [string]$version
)

$currentPath = [Environment]::GetEnvironmentVariable("PATH", "User")
$xamppPhpPath = "C:\xampp\php"
$php83Path = "C:\php8.3" # Update this path if you installed PHP 8.3 elsewhere

if ($version -eq "8.3") {
    # Remove XAMPP PHP from PATH
    $newPath = ($currentPath -split ';' | Where-Object { $_ -ne $xamppPhpPath }) -join ';'
    # Add PHP 8.3 to PATH
    if ($newPath -notlike "*$php83Path*") {
        $newPath = "$php83Path;$newPath"
    }
    [Environment]::SetEnvironmentVariable("PATH", $newPath, "User")
    Write-Host "Switched to PHP 8.3"
} elseif ($version -eq "8.1") {
    # Remove PHP 8.3 from PATH
    $newPath = ($currentPath -split ';' | Where-Object { $_ -ne $php83Path }) -join ';'
    # Add XAMPP PHP to PATH
    if ($newPath -notlike "*$xamppPhpPath*") {
        $newPath = "$xamppPhpPath;$newPath"
    }
    [Environment]::SetEnvironmentVariable("PATH", $newPath, "User")
    Write-Host "Switched to PHP 8.1 (XAMPP)"
} else {
    Write-Host "Please specify a valid PHP version: 8.1 or 8.3"
}

# Refresh environment variables in the current session
$env:Path = [System.Environment]::GetEnvironmentVariable("Path", "Machine") + ";" + [System.Environment]::GetEnvironmentVariable("Path", "User")

# Display current PHP version
php -v
