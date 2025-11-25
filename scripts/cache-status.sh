#!/bin/bash
echo "=== CACHE STATUS ==="

# Redis
echo "Redis:"
redis-cli ping > /dev/null 2>&1 && echo "✓ Running" || echo "✗ Not running"

# Memcached
echo "Memcached:"
echo "stats" | nc -q 1 localhost 11211 > /dev/null 2>&1 && echo "✓ Running" || echo "✗ Not running"

# OPcache
echo "OPcache:"
php -r "echo opcache_get_status()['opcache_enabled'] ? '✓ Enabled' : '✗ Disabled';"
echo ""
