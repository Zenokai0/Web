# product shop website

a zando clone

### how to use

```
#clone the repo
git clone https://github.com/Zenokai0/SA.git

#change directory to project
cd SA

#create a .env file in SA/.env
#copy all the details from .env.example
#add your db password(mysql root pw)

#run
composer install
php artisan key:generate
php artisan migrate:fresh --seed

php artisan serve

```