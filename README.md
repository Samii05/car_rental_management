🚗 Car Rental Management Web Application


📌 Overview

This web application is designed to manage a car rental business efficiently. It allows users to:



✅ Add new cars and customers to the database.

✅ Insert new rentals and car sales.

🔍 Retrieve cars based on brand and model.

💰 Retrieve location price using a stored procedure.

🔄 Update location prices and rental records.




⚙️ Installation Guide

📋 Prerequisites

🖥️ WAMP Server (or any local server with PHP & MySQL)

Download and install WAMP.

🗄️ MySQL Database (can be managed with phpMyAdmin or MySQL Workbench).

🌐 Web Browser to run the application.



🛠️ Setup Steps

1️⃣ Place the Project in the WAMP Server Directory

📂 Copy the entire project folder and place it inside C:\wamp64\www\ (or C:\wamp\www\ for 32-bit systems).

2️⃣ Start WAMP Server

🚦 Run WAMP and ensure the icon in the system tray turns 🟢 green, indicating the server is active.

3️⃣ Import the Database



You can import the database using phpMyAdmin or MySQL Workbench.

Using phpMyAdmin:

🌍 Open phpMyAdmin.

📌 Click on "Databases" and create a new database (e.g., car_rental).

📂 Click on "Import" and upload the provided SQL file from the database folder.



Using MySQL Workbench:

🏗️ Open MySQL Workbench and connect to the MySQL server.

🔄 Click on "Server" > "Data Import".

📥 Select "Import from Self-Contained File" and choose the SQL file from the database folder.

✅ Click "Start Import" to complete the process.



4️⃣ Configure Database Connection

📂 Open the pages&connectiondb folder.

🔧 Locate the db_connection.php file.

✍️ Modify the database credentials if needed:

$host = 'localhost';
$user = 'root';
$password = '';
$database = 'car_rental';

5️⃣ Run the Application

🌐 Open a web browser and go to http://localhost/your_project_folder/

🎉 You should see the application interface.



🚀 Features

🏎️ Car & Customer Management

➕ Add new cars and customers.

📅 Rental Management

📝 Insert new rental transactions.

🔄 Update rental records with return dates.

🛒 Sales Management

💲 Insert car sales records.

🔍 Retrieve cars by brand and model.

💰 Pricing Management

📊 Retrieve rental price using stored procedures.

✏️ Update rental prices for specific cars.



ℹ️ Notes

⚠️ Ensure WAMP is running before accessing the web app.

🔑 If you change database credentials, update the db_connection.php file accordingly.

🛠️ Use either MySQL Workbench or phpMyAdmin to manage your database effectively.

📜 License

This project is licensed under MIT License.


AUTHOR
Sami Ramzi REZIG