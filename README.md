All my project files and code files are in master brunch</br>
Project Overview

    Separate Dashboards: Created distinct dashboards for Admin, Trainer, and Trainee.</br>
    Authentication: Login and logout functionalities work perfectly.</br>
    Admin Features:</br>
        Adding trainers</br>
        Assigning class schedules</br>
    Trainee Features: Ability to book classes.</br>
    Database Functionality: All database tables function correctly.</br>
    Frontend: Developed views using HTML and Bootstrap.</br>
    Data Handling: All data transfers from the frontend to the database work seamlessly.</br>

Database Schema

    User Table: Stores all types of users with their roles.</br>
    Trainer Table: Contains expertise and availability information.</br>
    Class Table: Stores class date, time, capacity, and trainer ID.</br>
    Booking Table: Records trainer ID, class ID, and booking time.</br>

API Overview

Initially, I struggled with the API concept but eventually created it using web.php routes. Although I couldn’t integrate them into the frontend views, all APIs have been tested in Postman and are functioning correctly.
Admin APIs

    Manage Trainers:</br>
        GET /admin/trainers: Retrieves all trainers stored in the User table.</br>
        POST /admin/trainers: Adds a new trainer.</br>
        PUT /admin/trainers/{id}: Updates an existing trainer.</br>
        DELETE /admin/trainers/{id}: Deletes a trainer.</br>

    Manage Classes:
        GET /admin/classes: Retrieves all classes.</br>
        POST /admin/classes: Adds classes and assigns trainers.</br>

Trainer APIs</br>

    View Assigned Classes:</br>
        GET /trainer/classes: Displays the classes assigned to the trainer.</br>

Trainee APIs</br>

    Booking Classes:</br>
        GET /trainee/bookings: Displays all available classes.</br>
        POST /trainee/bookings: Allows trainees to book available classes.</br>
        DELETE /trainee/bookings/{id}: Enables trainees to delete their bookings.</br>

Admin Credentials</br>

    Login Form:</br>
        Email: ananta@gmail.com</br>
        Password: 12345678</br>
    (Use these credentials to access the admin dashboard.)</br>
Trainer Credentials </br>
     Login Form:</br>
        Email: sakib@gmail.com</br>
        Password: 12345678</br>
    (Use these credentials to access the trainer dashboard.)</br>
Trainee Credentials </br>
     Login Form:</br>
        Email: fahim@gmail.com</br>
        Password: 12345678</br>
    (Use these credentials to access the trainee dashboard.)</br>


Live Deployment Link

When i try to deploy it heroku ask for credential,that's why i can't deploy it
