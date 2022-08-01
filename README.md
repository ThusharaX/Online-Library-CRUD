<h1>How to Run this project</h1>

## **Steps to run Laravel Backend**

## Step 1:

```
git clone https://github.com/ThusharaX/Online-Library-CRUD.git
```

```
cd Online-Library-CRUD/Laravel-Backend
```

## Step 2:

* ### Copy .env.example file to .env on the "Laravel-Backend" folder. You can type ```copy .env.example .env``` if using command prompt Windows

* ### Open XAMPP and start Apache server and MySQL server

* ### Open phpMyAdmin and create a database called "online_library_db"

* ### Open your .env file and change the database name (DB_DATABASE) to "online_library_db"

## Step 3:

```
composer install
```

```
php artisan key:generate
```

```
php artisan migrate
```

```
php artisan migrate:fresh --seed
```

```
php artisan serve
```

<hr/>

## **Steps to run Vue.js Frontend**

## Step 1:

* ### Run Laravel-Backend Application
* ### Open another terminal

## Step 2:

```
cd Online-Library-CRUD/Vue-Frontend
```

```
yarn install
```

```
yarn serve
```

* ### Open your browser and type *http://localhost:3000/* OR *http://127.0.0.1:3000/*

## Sample login credentials:

* Email : thushara@gmail.com
* Password : pass