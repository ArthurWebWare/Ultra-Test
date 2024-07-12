### README.md

# Laravel Test Project

## Introduction 

This is a test project to demonstrate the creation of a small application using the Laravel framework. The project consists of a blog with two main entities: users and posts.

## Installation

To set up the project, follow these steps:

1. Clone the repository to a convenient folder:
    ```bash
    git clone git@github.com:ArthurWebWare/Ultra-Test.git
    cd Ultra-Test
    ```

2. Build the Docker containers:
    ```bash
    docker-compose build
    ```

3. Start the Docker containers:
    ```bash
    docker-compose up -d
    ```

4. Access the running container:
    ```bash
    docker exec -it laravel-app-php-cli bash
    ```

5. Inside the container, run the following commands to download all dependencies, run the migrations, and seed the database with test data:
    ```bash
    composer install
    php artisan migrate
    php artisan db:seed
    ```

## Configuration

No additional configuration is needed.

## Usage

To use the application, start the Docker containers and access the application at `localhost:8081`.

### API Endpoints

Here are the available API endpoints:

- **User Registration and Authentication:**
    - `POST /register` - Register a new user
    - `POST /login` - Log in a user

- **Posts:**
    - `GET /posts` - Get a paginated list of all posts
    - `GET /post/{id}` - Get a specific post by ID
    - `GET /users/{user}/posts` - Get a paginated list of posts for a specific user

- **Authenticated Routes:**
    - `POST /post` - Create a new post
    - `PUT /post/{id}` - Update a post
    - `DELETE /post/{id}` - Delete a post
    - `POST /logout` - Log out a user

## Console Commands

This project includes custom console commands for processing post statuses:

- **CheckPostStatus**
    - Command: `posts:check-status`
    - Description: This command checks the posts and marks those older than two days as inactive. It also queues the IDs of old posts for processing.

- **ProcessPostStatus**
    - Command: `posts:process-status`
    - Description: This command processes the queued post IDs and updates their status to inactive.

### Running the Console Commands

To run the console commands, use the following syntax within the Docker container:

```bash
php artisan posts:check-status
php artisan posts:process-status
```

---

