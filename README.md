# SANAOL AGENCY (Talent Management System)

![image](https://github.com/therealmai/sanaol_agency/assets/84717650/7dadff08-7013-450f-b774-b163c92377cb)

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
https://app.swaggerhub.com/apis-docs/therealmai/masterboard/2.0.0




### SELENIUM SETUP

Notes
1. Test scripts are found in `vue/selenium` folder. There should be 8 test script files seen.
2. Test results and log files are found in the `results` folder. 

Requirements
1. python (latest version) (search in google how to install and verify)
2. chropath from https://chrome.google.com/webstore/detail/chropath/ljngjbnaijcbncmcnjfhigebomdlkcjo
3. Robot Code (vs code extension)
    1. extension id = d-biehl.robotcode
    2. search id in extension market place
    3. author is Daniel Biehl 
    4. extension has check mark
4. web driver (check the 36 min mark of sir's video) https://drive.google.com/drive/folders/1CuoVoHoWkfOV8d2p1tBF9uRr1Zt8OAzF
    
Creating venv
From the root foler, do:
```
cd vue/selenium
python -m venv venv
```

Activating venv
From the root folder, do:
```
cd vue/selenium/venv/Scripts
```

Activating venv using git bash
```
. activate   
```

Activating venv using powershell
```
.\activate   
```

Installing dependencies
In folder /vue/selenium, do:
```
pip install -r requirements.txt
```

Resolving Robot Framework package not found in workspace folder.
You will have this error when it shows a pop up errror message or when intellisense is not working in .robot files.
![image](https://user-images.githubusercontent.com/77256997/208225619-2995d666-a25f-4cb9-abf5-4b8bda7106e0.png)

1. Click "Select Python Interpreter"
2. Click "Enter interpreter path..."
3. Click "Find..."
4. Navigate to /vue/selenium/venv/Scripts
5. Select python.exe
6. Click Ok
7. Check if working

Robot Framework Docs https://robotframework.org/SeleniumLibrary/SeleniumLibrary.html
