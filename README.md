# admin-panel-laravel
An full featured admin panel in laravel 5.2.45

## Installation

###STEP-1
Clone the project and store in your local server folder (eg. htdocs)

###STEP-2
I haven't updated migration file so create a database manually and import sql file that is stored in app->database folder. Import that file in your database(ie. phpMyAdmin)

###STEP-3
Change .env file as per your database configuration.

###STEP-4
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=fncn//database name
DB_USERNAME=root
DB_PASSWORD=null
```

###STEP-5
To install dependencies, Git Bash on the project directory or open terminal and run
`composer update`

###STEP-5
open initial url **localhost/admin-panel-laravel/public/admin** or change the route
