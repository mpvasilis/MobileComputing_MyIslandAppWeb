# My Island App (Web Panel)
My Island App Web Panel- Project at the Mobile Computing (Android) course @ ECE UOWM

This is the web panel of the project. It is built on top of the Laravel framework (PHP).

You can find the android app [here](https://github.com/mpvasilis/MobileComputing_MyIslandApp).

### Screenshots

Login page:

![My Island App Web Login page](https://i.imgur.com/egjcBfH.png)
### Setup Project

1. Create a new database (MySQL and PostgreSQL supported).
2. Edit .env and fill the database connection information.
3. Run `composer install` to install all project packages
4. Run `artisan key:generate` to generate new application key
5. Run `php artisan migrate` to perform the database migrations
6. Done! Run `php artisan serve` to serve the application locally. Go to http://127.0.0.1:8000/install to continue with the installation.
