# TEA

TEA App

## Preface

TEA App is currently only running within a localhost environment. As it is build using the laravel framework with xampp, apache and php, this means there is quite a large set up process to get it up and running.

## Required Software

We use a few programs during the environment setup process.

### xampp

Install xampp from https://www.apachefriends.org/index.html

### composer

Install composer from https://getcomposer.org/download/

During installation, point composer to your php.exe within \\\xampp\php

## Initial Setup

Navigate to your new \\\xampp\htdocs directory

Place the \\lsapp folder inside the htdocs directory.

### Dependencies

Next, we must open cmd and navigate to the \\\xampp\htdocs\lsapp directory.

Using the following composer command from the \lsapp directory we find any missing dependencies.

    \\xampp\htdocs\lsapp> composer update

Then we install them using another command

    \\xampp\htdocs\lsapp> composer install

### Virtual host

Now we set up a virtual host.

Navigate to \\\xampp\apache\conf\extra

Edit the "httpd-vhosts.conf" file in a text editer and add the following at the bottom

    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs"
        ServerName localhost
    </VirtualHost>

    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/lsapp/public"
        ServerName lsapp.test
    </VirtualHost>

Next we must add our new localhost to our windows hosts file. Run notepad as an administrator and choose File>Open.

Navigate to "C:\Windows\System32\drivers\etc" and open the "hosts" file

Add the following lines to the bottom of the file:

    127.0.0.1 localhost
    127.0.0.1 lsapp.test

### Database

Navigate to \\\xampp and run "xampp-control.exe" as administrator

Start the Apache module using the start button

In a browser, navigate to localhost/phpmyadmin.

Create a new database from the left meny and name it lsapp

In cmd, navigate to \\\xampp\htdocs\lsapp

    \\xampp\htdocs\lsapp>php artisan migrate

Empty tables will now be created for you in the database

## Using TEA

In chrome, press f12 and then press ctrl+shift+m to set the view

TEA is now connected to the localhost server. navigate to lsapp.test in your browser

To create and answer a quiz, you must register an account.
