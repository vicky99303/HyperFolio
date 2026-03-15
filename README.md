# HyperFolio

## Description

HyperFolio is a modern, responsive portfolio web application designed to showcase your projects, skills, and experiences in a clean and professional way. Built with scalability and performance in mind, HyperFolio allows developers and creatives to create a personalized online presence effortlessly.

## Technology Stack

- **Backend:** Laravel PHP Framework
- **Frontend:** HTMX (for dynamic, interactive UI)
- **Database:** MySQL
- **Styling:** Tailwind CSS
- **Build Tools:** NPM, Laravel Mix

## Features

- Responsive and mobile-friendly design
- Dynamic project and skills management
- User authentication and profile management
- Contact form with email notifications
- SEO optimized pages
- Easy customization and extensibility

## Installation

1. Clone the repository:

   ```bash
   git clone https://github.com/yourusername/hyperfolio.git
   cd hyperfolio
   ```

2. Install PHP dependencies using Composer:

   ```bash
   composer install
   ```

3. Install JavaScript dependencies:

   ```bash
   npm install
   ```

4. Copy the example environment file and configure your environment variables:

   ```bash
   cp .env.example .env
   ```

   Update `.env` with your database credentials and other settings.

5. Generate the application key:

   ```bash
   php artisan key:generate
   ```

6. Run database migrations and seeders:

   ```bash
   php artisan migrate --seed
   ```

7. Build frontend assets:

   ```bash
   npm run dev
   ```

## Usage

Start the local development server:

```bash
php artisan serve
```

Visit `http://localhost:8000` in your browser to view your HyperFolio portfolio.

For production deployment, build the assets with:

```bash
npm run prod
```

and configure your web server accordingly.

## Contribution

Contributions are welcome! Please fork the repository and submit a pull request with your improvements or bug fixes. Ensure your code follows the project's coding standards and includes appropriate tests.

## License

This project is licensed under the MIT License. See the [LICENSE](LICENSE) file for details.