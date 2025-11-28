# Task Manager

A modern, responsive task management application built with Laravel 10, Tailwind CSS, and Alpine.js.

## Features

- **User Authentication** - Secure registration, login, and logout functionality
- **Task Management** - Full CRUD operations for tasks
  - Create, edit, and delete tasks
  - Set task status (Pending, In Progress, Completed)
  - Assign priority levels (Low, Medium, High)
  - Add due dates
  - Add descriptions
- **Categories** - Organize tasks with custom categories
  - Create categories with custom colors
  - Color-coded task organization
  - Track task count per category
- **Dashboard** - Overview of your productivity
  - Total tasks count
  - Tasks by status (Pending, In Progress, Completed)
  - Recent tasks list
- **Search & Filter** - Find tasks quickly
  - Search by title or description
  - Filter by status, priority, or category
  - Pagination support
- **Responsive Design** - Works seamlessly on desktop, tablet, and mobile devices

## Tech Stack

- **Backend:** Laravel 12.x
- **Database:** MySQL 8.0
- **Frontend:** Tailwind CSS 3.x, Alpine.js
- **Authentication:** Laravel Breeze
- **Development:** Laravel Sail (Docker)

## Requirements

### Using Docker (Recommended)
- Docker Desktop
- Docker Compose

### Without Docker
- PHP 8.1 or higher
- Composer
- MySQL 8.0 or higher
- Node.js 16.x or higher
- NPM or Yarn

## Installation

### Option 1: Using Docker/Sail (Recommended)

1. **Clone the repository**
   ```bash
   git clone https://github.com/ali-bouali/task-manager-laravel-10
   cd laravel-10-task-manager
   ```

2. **Copy the environment file**
   ```bash
   cp .env.example .env
   ```

3. **Install Composer dependencies**
   ```bash
   docker run --rm \
       -u "$(id -u):$(id -g)" \
       -v "$(pwd):/var/www/html" \
       -w /var/www/html \
       laravelsail/php84-composer:latest \
       composer install --ignore-platform-reqs
   ```

4. **Start Docker containers**
   ```bash
   ./vendor/bin/sail up -d
   ```

5. **Generate application key**
   ```bash
   ./vendor/bin/sail artisan key:generate
   ```

6. **Run database migrations**
   ```bash
   ./vendor/bin/sail artisan migrate
   ```

7. **Install NPM dependencies and build assets**
   ```bash
   ./vendor/bin/sail npm install
   ./vendor/bin/sail npm run build
   ```

8. **Access the application**
   - Open your browser and visit: `http://localhost`

### Option 2: Without Docker

1. **Clone the repository**
   ```bash
   git clone <your-repository-url>
   cd laravel-10-task-manager
   ```

2. **Copy the environment file**
   ```bash
   cp .env.example .env
   ```

3. **Update .env file**

   Edit the `.env` file and configure your database:
   ```env
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task_manager
   DB_USERNAME=root
   DB_PASSWORD=your_password
   ```

4. **Create the database**
   ```bash
   mysql -u root -p
   CREATE DATABASE task_manager;
   EXIT;
   ```

5. **Install Composer dependencies**
   ```bash
   composer install
   ```

6. **Generate application key**
   ```bash
   php artisan key:generate
   ```

7. **Run database migrations**
   ```bash
   php artisan migrate
   ```

8. **Install NPM dependencies and build assets**
   ```bash
   npm install
   npm run build
   ```

9. **Start the development server**
   ```bash
   php artisan serve
   ```

10. **Access the application**
    - Open your browser and visit: `http://localhost:8000`

## Configuration

### Environment Variables

All configuration is managed through the `.env` file:

```env
# Application
APP_NAME="Task Manager"
APP_ENV=local
APP_DEBUG=true
APP_URL=http://localhost

# Database (Docker/Sail)
DB_CONNECTION=mysql
DB_HOST=mysql
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=sail
DB_PASSWORD=password

# Database (Standard Installation)
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task_manager
DB_USERNAME=root
DB_PASSWORD=your_password
```

**Important:** Never commit your `.env` file to version control!

## Usage

### Getting Started

1. **Register an Account**
   - Visit the homepage and click "Get Started"
   - Fill in your details and create an account

2. **Create Categories** (Optional)
   - Navigate to "Categories" from the menu
   - Click "New Category"
   - Choose a name and color for your category

3. **Create Your First Task**
   - Go to "Tasks" from the menu
   - Click "New Task"
   - Fill in the task details:
     - Title (required)
     - Description
     - Status (Pending, In Progress, Completed)
     - Priority (Low, Medium, High)
     - Category
     - Due Date

4. **Manage Tasks**
   - Edit tasks by clicking the "Edit" button
   - Delete tasks with the "Delete" button
   - Use filters to find specific tasks
   - Search by title or description

5. **Monitor Progress**
   - View your dashboard for an overview
   - Track tasks by status
   - See recent tasks and statistics

## Development Commands

### With Docker/Sail

```bash
# Start containers
./vendor/bin/sail up -d

# Stop containers
./vendor/bin/sail down

# Run migrations
./vendor/bin/sail artisan migrate

# Rollback migrations
./vendor/bin/sail artisan migrate:rollback

# Run seeders
./vendor/bin/sail artisan db:seed

# Clear cache
./vendor/bin/sail artisan cache:clear

# Build assets for production
./vendor/bin/sail npm run build

# Watch assets for development
./vendor/bin/sail npm run dev

# Run tests
./vendor/bin/sail artisan test
```

### Without Docker

```bash
# Run migrations
php artisan migrate

# Rollback migrations
php artisan migrate:rollback

# Run seeders
php artisan db:seed

# Clear cache
php artisan cache:clear

# Build assets for production
npm run build

# Watch assets for development
npm run dev

# Run tests
php artisan test

# Start development server
php artisan serve
```

## Database Schema

### Users Table
- id
- name
- email
- password
- timestamps

### Categories Table
- id
- name
- color
- user_id (foreign key)
- timestamps

### Tasks Table
- id
- title
- description
- status (pending, in_progress, completed)
- priority (low, medium, high)
- due_date
- category_id (foreign key)
- user_id (foreign key)
- timestamps

## Security

- All routes are protected with authentication middleware
- Authorization policies ensure users can only access their own data
- CSRF protection enabled on all forms
- Password hashing with bcrypt
- Input validation on all forms

## Deployment

### Production Checklist

1. Set `APP_ENV=production` in `.env`
2. Set `APP_DEBUG=false` in `.env`
3. Generate a strong `APP_KEY`
4. Configure production database credentials
5. Set up proper file permissions
6. Run `composer install --optimize-autoloader --no-dev`
7. Run `php artisan config:cache`
8. Run `php artisan route:cache`
9. Run `php artisan view:cache`
10. Build production assets: `npm run build`
11. Set up SSL certificate
12. Configure web server (Nginx/Apache)

## Troubleshooting

### Common Issues

**Issue:** "No application encryption key has been specified"
```bash
php artisan key:generate
# or with Sail:
./vendor/bin/sail artisan key:generate
```

**Issue:** Database connection refused
- Check your `.env` database credentials
- Ensure MySQL is running
- For Docker: Use `DB_HOST=mysql` not `127.0.0.1`

**Issue:** Permission denied errors
```bash
chmod -R 775 storage bootstrap/cache
```

**Issue:** Vite manifest not found
```bash
npm run build
# or with Sail:
./vendor/bin/sail npm run build
```

## Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is open-source software licensed under the [MIT license](https://opensource.org/licenses/MIT).

## Support

For issues, questions, or contributions, please open an issue on GitHub.

## Acknowledgments

- Built with [Laravel](https://laravel.com)
- Styled with [Tailwind CSS](https://tailwindcss.com)
- Interactive components with [Alpine.js](https://alpinejs.dev)
- Authentication scaffolding by [Laravel Breeze](https://laravel.com/docs/breeze)

---

**Made with ❤️ using Laravel**
