# HyperFolio

HyperFolio is a modern project management application built with Laravel, HTMX, and Tailwind CSS. It provides a seamless user experience with dynamic interactions powered by HTMX and a responsive design using Tailwind CSS. The application is containerized with Docker for easy setup and deployment.

## Technology Stack

- **Laravel**: PHP framework for backend and API development
- **HTMX**: For dynamic, AJAX-like interactions without writing JavaScript
- **Tailwind CSS**: Utility-first CSS framework for styling
- **Docker**: Containerization for consistent development and deployment environment

## Setup Instructions

### Prerequisites

- [Docker](https://www.docker.com/get-started) installed on your machine
- [Docker Compose](https://docs.docker.com/compose/install/) (usually included with Docker Desktop)

### Clone the Repository

```bash
git clone https://github.com/yourusername/hyperfolio.git
cd hyperfolio
```

### Environment Configuration

Copy the example environment file and generate an application key:

```bash
cp .env.example .env
```

You can customize the `.env` file if needed, but the defaults should work with Docker.

### Build and Run with Docker Compose

Build and start the containers:

```bash
docker-compose up -d --build
```

This command will:

- Build the application container
- Start the application and database containers
- Run necessary migrations and seeders (if configured)

### Access the Application

Once the containers are running, access HyperFolio at:

```
http://localhost:8000
```

### Running Artisan Commands

To run Laravel Artisan commands inside the Docker container:

```bash
docker-compose exec app php artisan migrate
docker-compose exec app php artisan db:seed
```

### Stopping the Containers

To stop the running containers:

```bash
docker-compose down
```

## Usage Notes

- Use the **Add New Project** button to create new projects dynamically via HTMX-powered modals.
- View, edit, and delete projects seamlessly without full page reloads.
- Pagination is supported for easy navigation through projects.
- Success messages and error handling are integrated for better user feedback.

## Testing

If tests are included, you can run them inside the container:

```bash
docker-compose exec app php artisan test
```

## Contributing

Feel free to fork and submit pull requests to improve HyperFolio.

---

Thank you for using HyperFolio! If you encounter any issues or have suggestions, please open an issue on the GitHub repository.