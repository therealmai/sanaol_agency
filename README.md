Trello: https://trello.com/b/FaILhCut/masterboard

GDocs: https://docs.google.com/document/d/1Svu7aSQSrrJWlBobQ3g16plVqbe4gtShEG3oo7ViGs8/edit

ERD: https://lucid.app/lucidchart/9a1cab09-f0a9-442d-a978-dfa0e3b312db/edit?viewport_loc=-669%2C-99%2C3945%2C1969%2C0_0&invitationId=inv_39c2fe27-80e4-464b-b9e3-ffd73aea9b29

UI: https://www.figma.com/file/z3FHt6b2J9WzAWoE3pkZcq/Masterboard?node-id=0%3A1&t=RqSsjF12qRpDYPWm-1

ScreenFlow: https://www.figma.com/file/Qj2A3fi7RsCjYLZrDSDn3c/CS-3105-Screenflow?node-id=0%3A1&t=s8OGxrQuUisViISM-1

Laravel Docs: https://laravel.com/docs/9.x/installation

SwaggerHub: https://app.swaggerhub.com/apis-docs/therealmai/masterboard/1.0.0

# 3105 APPLICATION DEVELOPMENT - SANAOL AGENCY 

## About

Sanaol Agency is a web-based Content Management System built using Vue.js, Laravel, and Tailwindcss.

## Setup and Deployment Instructions/Steps:

1. After cloning and local repository initialization, open terminal or integrated terminal of project and do the following:
First, fetch dependencies in the root folder (SANAOL_AGENCY Folder):

```
npm install
composer update
```

2. Change directory to vue folder by typing `cd vue` in the terminal and run the ff commands: 

```
npm install
npm run tailbuild
```

## Basic Commands To Run During Development 

During each and every development session, execute these commands:

### FRONTEND:


Terminal 1 - Launch a local dev server

```
npm run dev
```

Terminal 2 - watch for css changes; install compilation and build

```
cd vue
npm run tailwatch
```

### BACKEND:

First, make sure you have the database running in the server by setting up the database in phpmyadmin:

1. Turn on Apache and MySQL in XAMPP
2. go to http://localhost/phpmyadmin
3. create new database and name it `3105_DB`

Second, inside the VScode terminal:

```
composer install
php artisan key:generate
```

```
php artisan migrate
```

If you want to refresh the migration/seeder:

```
php artisan migrate:refresh --seed
```

To run the laravel localhost server:

```
php artisan serve
```

### CREATING A TICKET BRANCH

Steps to create a ticket branch.
1. Merge "main" branch to "{feature}/main" branch to update the "{feature}/main" branch. 
    Ex: services/main, events/main
2. Checkout to "{feature}/main" and do
```
git checkout -b {feature}/{ticket no.}
```

### CREATING A PULL REQUEST

Steps to create a pull request.
1. Commit your changes to the "{feature}/{ticket no.}" branch.
2. Go to the "Pull requests" section and click "New pull request"
3. Set the "compare:" field to your ticket branch.
4. Set the "base:" field to the "{feature}/main" branch. Do not leave it in the default main branch.
5. Click "Create pull request". 
6. Write down the changes you have applied based on the code you have contributed. Attach supporting image/s whenever necessary.
7. Click "Create pull request"

### SwaggerHub API Documentation Masterboard
https://app.swaggerhub.com/apis-docs/therealmai/masterboard/1.0.0