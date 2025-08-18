# Laravel 12 Installation Steps

After cloning this repository, follow these steps to set up Laravel 12:

1. **Install dependencies**
    ```
    composer install
    npm install
    ```

2. **Copy the example environment file**
    ```
    cp .env.example .env
    ```

3. **Generate application key**
    ```
    php artisan key:generate
    ```

4. **Configure your `.env` file**
    - Set your database and other environment variables as needed.

5. **Run migrations (optional)**
    ```
    php artisan migrate
    ```

7. **Storage Link (optional)**
    ```
    php artisan storage:link
    ```

6. **Start the development server**
    ```
    composer run dev
    ```