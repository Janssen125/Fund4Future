# Fund4Future

AOL Software Engineering

Requirements:

-   XAMPP
-   PHP 7.\*

How To Run?

1. Clone the repository
2. Open the project in your preferred code editor
3. Make sure you have XAMPP installed and running on your local machine
4. Create a new database in your XAMPP control panel and name it "fund4future" or any name that satisfied you
5. Type "php artisan migrate" in "/Fund4Future"
6. Type "php artisan db:seed" in "/Fund4Future"
7. Type "php artisan serve" in "/Fund4Future"
8. Open your web browser and navigate to "http://localhost:8000" to access the website

Or if we still have access to railway, you can use this link to open the project
https://fund4future-production.up.railway.app/

Developer Note:

-   Despite http and https can't be access due to mixed connection, if you want to acces the file through localhost, you have to change the secure_asset('') into asset('')
-   The project is still in development, so there might be some bugs or errors that need to be fix.
-   secure_asset('') supports https, asset('') supports http
