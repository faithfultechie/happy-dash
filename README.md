
# Introduction

Cooldash the starter admin dashboard for Laravel you need if you hate filepond uploads

## Laravel Cooldash

Your shortcut to coding bliss! It's like the express lane for starting your next Laravel project—no traffic jams, just smooth sailing offering features like: authentication, user management, roles and permissions, and more.

Cooldash is designed using [Laravel](http://dev.nodeca.com), [Tailwind CSS](http://dev.nodeca.com), [Livewire](http://dev.nodeca.com) and [Alpine](http://dev.nodeca.com).

![Minion](https://i.ibb.co/pdmWnYB/Fire-Shot-Capture-004-Page-Title-happy-dash-test.png)

## Features

+ Authentication
+ Registration
+ Profile Management
  + Disable Login
  + Force Password Change
+ Password Update
+ Password Confirmation
+ Two Factor Authentication
+ Activity Log
+ Authentication Log ​
+ Permission and Roles
+ FilePond Integration
+ Branding
  + Site Name
  + Logo

## Installation

We assume you have a basic knowledge of setting up Laravel and Composer. If you don't, please refer to the [Laravel Installation Documentation](https://laravel.com/docs/8.x/installation). Also, you need NPM installed on your machine. If you don't, please refer to the [NPM Installation Documentation](https://docs.npmjs.com/downloading-and-installing-node-js-and-npm).

## Requirements

+ PHP 8.1 or higher
+ MySQL 5.7 or higher
+ Composer
+ Node.js
+ NPM
  
## Download

### Git Clone (Recommended)

If you have Git installed on your server, this will be the easiest way to install Cooldash so that you can quickly grab updates.

`git clone https://github.com/otatechie/happy-dash.git`

To update moving forward, you'll just run `git pull` to grab the latest.

### Download Source

When you download the source, you're going to download a zip file containing all of the Cooldash files. Download the the latest release from Github.
You'll then unzip the archive to your new Cooldash installation directory.

## Install Dependencies

Once you have the source downloaded, you'll need to run `composer install` to install all of the dependencies.

## Configure Environment

Next, you'll need to copy the `.env.example` file to `.env` and update the values with your own. This section is where you edit configuration file to reflect your own settings, such as your database credentials.

### Required App Settings

In your `.env` file, you'll need to set the following values:
`FILESYSTEM_DISK=public`  and in your `config/filesystems.php` file, you'll need to set the `public` disk to the following:

```php
  'public' => [
            'root' => public_path('uploads'), // or wherever you want to store the files
        ],
```

## Finalizing Installation

You should install and build all of the front-end dependencies and migrate your database.

``` bash
npm install
npm run build
php artisan migrate
```

## Authentication

Laravel Cooldash comes with login, two-factor login, registration, password reset, and email verification out of the box. Under the hood, the authentication portion of Cooldash is powered by [Laravel Fortify](https://github.com/laravel/fortify) package.

## Registration  

Before anyone can use your application, they need to create an account. Email verification is disabled, we recommend enabling it by following the Laravel Fortify documentation. By default, the `rule` requires a password that is at least eight characters in length and contains at least one uppercase and one lowercase letter, one number, and one special character.
You can change this rule by following Laravel's [validation rule](https://laravel.com/docs/11.x/validation#validating-passwords) guide.

>💡 Go to  `app/Actions/Fortify/CreateNewUser.php` and change the `rule` object

### Profile Management

Cooldash profile management features are accessed by the user using the top-right user profile navigation dropdown menu.

### Two Factor Authentication

Cooldash security features are accessed by the user using the top-right user profile navigation dropdown menu. Add an extra layer of security to your account using two-factor authentication by clicking the enable button.

### Authentication Log

You can view all of the authentication events. Under the hood, Cooldash uses [Laravel Authentication Log](https://github.com/rappasoft/laravel-authentication-log) package which tracks your user's authentication information such as login/logout time, IP, Browser, Location, etc. as well as sends out notifications via mail, slack, or sms for new devices and failed logins.
>💡 Please read the documentation of [Laravel Authentication Log](https://github.com/rappasoft/laravel-authentication-log)

### Auditing

There is detailed auditing capabilities for Eloquent models. Under the hood, Cooldash uses [Laravel Auditing](https://github.com/owen-it/laravel-auditing), allowing you to keep track of changes made to records, as well as any changes to their attributes.
>💡 Please read the documentation of [Laravel Auditing](https://github.com/owen-it/laravel-auditing)

### Backup

The backup provides an interface for [Spatie Laravel Backup](https://spatie.be/docs/laravel-backup/v8/introduction) package. It lets you:

+ Create a backup
+ Check the health of your backups
+ List all backups
+ Download a backup
+ Delete a backup
+ Monitor used disk storage

>💡 Please read the documentation of [Spatie Laravel Backup](https://spatie.be/docs/laravel-backup/v8/introduction)

### Permission and Roles

The permssion and roles provides an interface for [Laravel Permssion](https://spatie.be/docs/laravel-permission/v6/introduction) package. It lets you:

+ Add role
+ Add permission
+ Delete permission
+ Delete role

>💡 Please read the documentation of [Laravel Permssion](https://spatie.be/docs/laravel-permission/v6/introduction)

### Personalisation  

Cooldash is customisable. You can change the logo and application name. To do this, click settings on the left side navigation, click the personalisation link to do this.

### Users  

You can add, edit, delete, and view users. It has the following features:

+ Assign role and permissions to users
+ Disable or enable users account
+ Force users to change password on next login
+ Permanently delete user 

#### Credits

+ Laravel

+ Alpine JS
+ Livewire
+ Wireui
+ Laravel auditing
+ Livewire Powergrid
+ Laravel Permission
+ Wire elements modal
+ Dicebear
