#!/bin/bash
# Flush All Caches

echo "=== FLUSHING CACHES ==="

# Redis
echo "Flushing Redis..."
redis-cli FLUSHALL

# Memcached
echo "Flushing Memcached..."
echo "flush_all" | nc localhost 11211

# OPcache
echo "Clearing OPcache..."
sudo systemctl reload php8.2-fpm

echo "✓ All caches cleared!"
