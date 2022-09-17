## Estate Intel Assessment

EI API This is an assignment that contains listing of books from an external api and also CRUD
operations for books. It uses mysql database

### Installation Steps

1. Download the project (make sure to have composer and php installed on device)

2. Within the project folder run `composer install`

3. Create a database for your site (see
   the [Laravel database documentation](https://laravel.com/docs/6.x/database)), copy or rename
   the `.env.example` file to `.env`, edit the database configuration information, and
   run `php artisan key:generate`

4. Run `php artisan migrate`
5. Start the project with `php artisan serve` you will most likely be running on port
   8000 http://127.0.0.1:8000/
6. Access the postman
   documentation [here](https://documenter.getpostman.com/view/12186251/2s7YmwAP1N) and change
   LOCAL_URL variable to whatever port your laravel project is running on
7. Or you can simply use the API_URL variable as the application is deployed on
   heroku [Link](https://ie-api-test.herokuapp.com/)
8. Run `php artisan test` to run tests.





