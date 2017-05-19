mkdir backup
mysqldump -uhomestead -p homestead > "backup/homestead$(date +%m%d%H%M).sql"
zip -ur backup.zip "backup"
