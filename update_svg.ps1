$file = "C:\xampp\htdocs\armstrong\resources\views\layouts\frontfooter.blade.php"
$content = Get-Content -Path $file -Raw
$content = $content -replace '<svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" viewBox="0 0 40 40">', '<svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 40 40">'
$content = $content -replace '<rect width="24" height="24" fill="#111111"/>', '<rect width="40" height="40" fill="#111111"/>'
Set-Content -Path $file -Value $content
