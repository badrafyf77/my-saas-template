#!/bin/bash

echo "🚀 Setting up Wave SaaS Template..."

# Check if Docker is running
if ! docker info > /dev/null 2>&1; then
    echo "❌ Docker is not running. Please start Docker and try again."
    exit 1
fi

# Build and start the containers
echo "📦 Building Docker containers..."
docker-compose up -d --build

# Wait for containers to be ready
echo "⏳ Waiting for containers to be ready..."
sleep 10

# Run Laravel setup commands
echo "🔧 Setting up Laravel application..."
docker-compose exec app php artisan key:generate
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
docker-compose exec app php artisan storage:link

# Set proper permissions
echo "🔐 Setting proper permissions..."
docker-compose exec app chmod -R 775 storage bootstrap/cache

# Install and build frontend assets
echo "🎨 Building frontend assets..."
docker-compose exec app npm install
docker-compose exec app npm run build

echo "✅ Setup complete!"
echo ""
echo "🌐 Your Wave SaaS application is now running at: http://localhost:8000"
echo ""
echo "📧 Admin credentials:"
echo "   Email: admin@admin.com"
echo "   Password: password"
echo ""
echo "🔧 Useful commands:"
echo "   - View logs: docker-compose logs -f"
echo "   - Stop application: docker-compose down"
echo "   - Restart application: docker-compose restart"
echo ""
echo "🎉 Enjoy your new SaaS application!" 