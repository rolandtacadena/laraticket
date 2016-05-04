# Laravel Ticketing System 5.2

## Laravel Ticketing System based on on Laravel 5.2 and Zurb Foundation 5 - Upgraded version of my first Laravel Project <https://github.com/rolandtacadena/LaravelTicketingSystem>.
* [Features](#feature1)
* [Requirements](#feature2)
* [How to install](#feature3)
* [Application Structure](#feature4)
* [Troubleshooting](#feature5)
* [Additional information](#feature6)
* [How Starter site is look like](#feature7)

<a name="feature1"></a>
## Laravel Ticketing System Site Features:
* Laravel 5.1.x
* Zurb Foundation 5
* Back-end
	* Ticket management.
	    * Add Ticket
	    * Assign Ticket to a User
	    * Update Ticket
	* Manage Tickets.
	* Soon will be more -(Admin area, deleting ticket, extending ticket functionalities, etc.)
* Front-end
	* User login, registration
	* View Tickets
	    * By User
	    * By Backlog
	    * By special filters (open, close)
	    * By Priority (low, medium, high)
	   * Pagination of tickets
	* soon will be more...
* Packages included:
	* illuminate/html

-----
<a name="feature2"></a>
##Requirements

    PHP >= 5.5.9
    OpenSSL PHP Extension
    PDO PHP Extension
    Mbstring PHP Extension
    Tokenizer PHP Extension

-----
<a name="feature3"></a>
##How to install:
* [Step 1: Get the code](#step1)
* [Step 2: Use Composer to install dependencies](#step2)
* [Step 3: Create database](#step3)
* [Step 4: Install](#step4)
* [Step 5: Start Page](#step5)

-----
<a name="step1"></a>
### Step 1: Get the code - Download the repository

    https://github.com/rolandtacadena/LaravelTicketingSystem.git

Extract it in www(or htdocs if you using XAMPP) folder and put it for example in laravelticketing folder for example.

-----
<a name="step2"></a>
### Step 2: Use Composer to install dependencies

Laravel utilizes [Composer](http://getcomposer.org/) to manage its dependencies. First, download a copy of the composer.phar.
Once you have the PHAR archive, you can either keep it in your local project directory or move to
usr/local/bin to use it globally on your system.
On Windows, you can use the Composer [Windows installer](https://getcomposer.org/Composer-Setup.exe).

Then run:

    composer install
to install dependencies Laravel and other packages.

-----
<a name="step3"></a>
### Step 3: Create database

If you finished first three steps, now you can create database on your database server(MySQL). You must create database
with utf-8 collation(uft8_general_ci), to install and application work perfectly.
After that, copy .env.example and rename it as .env and put connection and change default database connection name, only database connection, put name database, database username and password.

-----
<a name="step4"></a>
### Step 4: Install

Now that you have the environment configured, you need to create a database configuration for it. For create database tables use this command:

    php artisan migrate

And to initial populate database use this:

    php artisan db:seed

If you install on your localhost in folder laravelticketing, you can type on web browser:

	http://localhost/laravelticketing/public
-----
<a name="step5"></a>
### Step 5: Start Page

You can now login to admin part of Laravel Framework 5  Bootstrap 3 Starter Site:

    username: admin@admin.com
    password: admin
OR user

    username: user@user.com
    password: user

-----
<a name="feature5"></a>
## Troubleshooting

### RuntimeException : No supported encrypter found. The cipher and / or key length are invalid.

    php artisan key:generate

### Site loading very slow

	composer dump-autoload --optimize
OR

    php artisan dump-autoload

-----
<a name="feature6"></a>
## License

This is free software distributed under the terms of the MIT license

-----
<a name="feature6"></a>
## Additional information

----
<a name="feature7"></a>
##How Laravel Ticketing System Site look like

<a target="_blank" href="http://imgur.com/a/Beta8">View Screenshots of the project</a>

----

# There will be more features in the future! Thanks

