# TEA

TEA App

## Preface

TEA App is currently using an AWS Server but still requires a number of 3rd pary software as it is built using the laravel framework with xampp, apache and php, this means there is quite a large set up process to get it up and running.

## Required Software

We use a few programs during the environment setup process.

### xampp

Install xampp from https://www.apachefriends.org/index.html

### composer

Install composer from https://getcomposer.org/download/

During installation, point composer to your php.exe within \\\xampp\php

### Git - Optional
Install Git from https://git-scm.com/downloads 

## Initial Setup

Navigate to your new \\\xampp\htdocs directory

If cloning directly from the Git Repository is preferable use the command:
    git clone https://github.com/kohbc/project_tea
    At this point you will also have to 

OR, if not using Git to clone, place the \\project_tea folder inside the htdocs directory.

### Dependencies

Next, we must open cmd and navigate to the \\\xampp\htdocs\project_tea directory.

Using the following composer command from the \project_tea directory we find any missing dependencies.

    \\xampp\htdocs\project_tea> composer update

Then we install them using another command

    \\xampp\htdocs\project_tea> composer install

### Virtual host

Now we set up a virtual host.

Navigate to \\\xampp\apache\conf\extra

Edit the "httpd-vhosts.conf" file in a text editer and add the following at the bottom

    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs"
        ServerName localhost
    </VirtualHost>

    <VirtualHost *:80>
        DocumentRoot "C:/xampp/htdocs/project_tea/public"
        ServerName tea.example.com
    </VirtualHost>

Next we must add our new localhost to our windows hosts file. Run notepad as an administrator and choose File>Open.

Navigate to "C:\Windows\System32\drivers\etc" and open the "hosts" file

Add the following lines to the bottom of the file:

    127.0.0.1 localhost
    127.0.0.1 tea.example.com


## Using TEA

In chrome, In Chrome go to the URL http://tea.example.com/ 
Press f12 and then press ctrl+shift+m to set the view
Make sure the resolution of the app is 375 x 765

