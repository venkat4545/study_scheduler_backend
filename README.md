# Getting Started with Study Scheduler application

Download the project from github by using GitHUB links below

# Frontend:
https://github.com/venkat4545/study_scheduler_frontend

#Backend

# Make sure you use PHP8.1 for backend and Node18 for frontend

After Downloading go to backend PHP file

# run the backend application file

## `php artisan serve`

Runs the app in the development mode.\
Open [http://127.0.0.1:8000] to view it in your browser

# install Xampp for using database

Start apache and mysql after installing xampp
Open [http://localhost/phpmyadmin/index.php] for accessing DB

# DB creation process

Create new DB called `activity_scheduler`

Create new table by using SQL query

CREATE TABLE activities (
    activityId INT(11) NOT NULL AUTO_INCREMENT,
    name VARCHAR(30) NOT NULL,
    duration INT(11) NOT NULL,
    date DATE NOT NULL,
    isCompleted TINYINT(1) NOT NULL DEFAULT 0,
    PRIMARY KEY (activityId)
);

## Now open frontend application file

### `npm install`

## Available Scripts

In the project directory, you can run:

### `npm start`

Runs the app in the development mode.\
Open [http://localhost:3000](http://localhost:3000) to view it in your browser.

The page will reload when you make changes.\
You may also see any lint errors in the console.

#### CONGRATULATIONS START USING YOUR ACTIVITY SCHEDULER WEB APPLICATION

### `npm test`

# For deploying to production

### `npm run build`
