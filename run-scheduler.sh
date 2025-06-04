#!/bin/bash

# Move to the working directory (matches your Dockerfile)
cd /var/www/html

# Run Laravel scheduler
php artisan schedule:run
