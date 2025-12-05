# Fleet Management System

A web-based application for managing company vehicle fleets, built with PHP and MySQL. Includes admin and user portals, reservations, fault reporting, and role-based access control.

## Features

**Admin Panel**
- Manage vehicles and drivers
- Track faults and schedule services
- Review user requests and generate reports

**User Portal**
- Browse vehicles and make reservations
- Report faults and submit requests
- View reservation history

## Tech Stack
- **Backend:** PHP 7.4+  
- **Database:** MySQL/MariaDB (schema + seed scripts included)  
- **Frontend:** HTML5, CSS3, JavaScript (jQuery), Bootstrap  
- **Server:** Apache/XAMPP  

## Installation
1. Install XAMPP and start Apache & MySQL.  
2. Import database:
```bash
mysql -u root -p
CREATE DATABASE vozniparkdb;
mysql -u root -p vozniparkdb < database/vozniparkdb.sql
Configure config/config.php.

Open in browser: http://localhost/[project-folder]/index.html

Default Credentials
Admin: marko.petrovic@email.com / 12345
User: jovana.nikolic@email.com / 54321

Security
Password hashing, role-based access, prepared statements

Session management and form validations

License
Academic project, provided as-is for educational purposes.
