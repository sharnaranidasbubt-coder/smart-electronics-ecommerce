#!/bin/bash
# WordPress Installation Script

cd /var/www/smart-electronics

echo "Installing WP-CLI..."
curl -O https://raw.githubusercontent.com/wp-cli/builds/gh-pages/phar/wp-cli.phar
chmod +x wp-cli.phar
sudo mv wp-cli.phar /usr/local/bin/wp

echo "Downloading WordPress..."
wp core download --allow-root

echo "Creating wp-config.php..."
wp config create \
    --dbname=smart_electronics_db \
    --dbuser=smart_wp_user \
    --dbpass='SmartWP@2025!Secure' \
    --dbhost=localhost \
    --dbprefix=wp_se_ \
    --allow-root

echo "Installing WordPress..."
wp core install \
    --url=http://smart-electronics.local \
    --title='Smart Electronics Limited' \
    --admin_user=admin \
    --admin_password='SecureAdminPass123!' \
    --admin_email=admin@smart-electronics.com \
    --allow-root

echo "✓ WordPress installation complete!"
echo "URL: http://smart-electronics.local/wp-admin"
echo "Username: admin"
echo "Password: SecureAdminPass123!"
