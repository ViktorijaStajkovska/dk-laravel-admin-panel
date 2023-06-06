Laravel Project 03 - Doniraj kompjuter with Breeze Authentication
This is a Laravel project that uses the Breeze package for authentication. Breeze provides a simple and customizable way to add authentication to your Laravel application.

    //Installation
To install this project, follow these steps:

1. Clone the repository: git clone <repo-url>
2. Install dependencies: composer install
3. Copy the .env.example file to .env and configure your environment variables
4. Generate an application key: php artisan key:generate
5. Run the database migrations: php artisan migrate
6. Run the database seeders: php artisan db:seed
7. Run the command `php artisan storage:link` to create a symbolic link for the storage.
8. Install NPM dependencies: npm install
9. Build the front-end assets: npm run dev 

Generating a New Key for the Project:

1. Launch Postman, a popular API development tool.
2. Set the HTTP method to POST.
3. Enter the URL for the API route that generates a new key. (http://localhost:8000/api/generate_token/1)
4. Send the request to the API route.
5. The API route should handle the request and generate a new key for the project.
6. Once the request is successful, the new key will be returned in the response.
7. Copy the generated key and use it in the project.
8. After generating a new key, open the `public/js/application/application-create.js`, `public/js/application/application-table.js` and `resources/views/dashboard.blade.php` files in the project.
9. Look for a variable or configuration section that requires the key.
10. Replace the existing value with the newly generated key.
11. Save the changes to the file.


    //Usage
To use this project, follow these steps:

Start the development server: php artisan serve

Open your browser and navigate to http://localhost:8000

Enter the following credentials:

Email: admin@admin.com
Password: Admin123!
Click the "Login" button

    //Customization
Breeze provides several configuration options that you can customize to fit your application's needs. You can find more information about these options in the official documentation.

    //Troubleshooting
If you encounter any issues while using this project, please refer to the official Laravel documentation or seek help from the Laravel community.

    //License
This project is open-source software licensed under the MIT license.
