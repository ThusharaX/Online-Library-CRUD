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
yarn lint
```

```
yarn serve
```

* ### Open your browser and type *http://localhost:3000/* OR *http://127.0.0.1:3000/*

## Sample login credentials:

* Email : thushara@gmail.com
* Password : pass


## Online-Library-CRUD Screenshots :

![image](https://user-images.githubusercontent.com/47711719/182203686-a4ba771e-36da-4bfb-b344-6077841d0853.png)

![image](https://user-images.githubusercontent.com/47711719/182203853-9286167a-1271-4cfd-9ecb-a95822ee9967.png)

![image](https://user-images.githubusercontent.com/47711719/182203899-1a7b0380-6695-4256-881e-2adb88be9af3.png)

![image](https://user-images.githubusercontent.com/47711719/182203960-465e0719-20e6-4db4-bc37-6bd95362772a.png)

![image](https://user-images.githubusercontent.com/47711719/182203985-412e7ac7-572e-4c65-9eb6-09ef766b19b3.png)

![image](https://user-images.githubusercontent.com/47711719/182204012-a07d25bc-972a-4c40-9e7f-068e57cf693e.png)

![image](https://user-images.githubusercontent.com/47711719/182204047-88bcd9e5-b4fa-49fd-9c79-c25549ba3499.png)

![image](https://user-images.githubusercontent.com/47711719/182204070-0f582778-b0d3-40e9-86da-ca33fed41c69.png)

![image](https://user-images.githubusercontent.com/47711719/182204093-0d92b5bb-f50b-421c-87fb-2cbabc4775f9.png)








