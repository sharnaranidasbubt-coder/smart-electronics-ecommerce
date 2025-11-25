#!/bin/bash
# Database Backup Script

DB_NAME="smart_electronics_db"
DB_USER="smart_wp_user"
DB_PASS="SmartWP@2025!Secure"
BACKUP_DIR="/var/www/smart-electronics/backups/database"
DATE=$(date +%Y%m%d_%H%M%S)

mkdir -p $BACKUP_DIR

echo "Backing up database..."
mysqldump --no-tablespaces -u $DB_USER -p$DB_PASS $DB_NAME | gzip > $BACKUP_DIR/db_backup_$DATE.sql.gz

echo "✓ Backup complete: db_backup_$DATE.sql.gz"

# Clean old backups (keep 30 days)
find $BACKUP_DIR -name "db_backup_*.sql.gz" -mtime +30 -delete
