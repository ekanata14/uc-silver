# Laravel 12 Installation Steps

After cloning this repository, follow these steps to set up Laravel 12:

1. **Install dependencies**

    ```
    composer install
    ```

2. **Install node modules**

    ```
    npm install
    ```

3. **Copy the example environment file**

    ```
    cp .env.example .env
    ```

4. **Generate application key**

    ```
    php artisan key:generate
    ```

5. **Configure your `.env` file**

    - Set your database and other environment variables as needed.

6. **Run migrations**

    ```
    php artisan migrate
    ```

7. **Storage Link**

    ```
    php artisan storage:link
    ```
8. **Start Development Server**
    ```
    composer run dev
    ```
