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

## Database Overview
Key tables:
- `korisnici` – Users (Admin/User roles)
- `vozila` – Vehicles
- `vozaci` – Drivers
- `rezervacije` – Reservations
- `kvarovi` – Fault reports
- `servisi` – Service appointments
- `zahtevi` – User requests

## Installation

1. Install XAMPP and start Apache & MySQL.  
2. Import database using the following SQL commands:
mysql -u root -p
CREATE DATABASE vozniparkdb;
mysql -u root -p vozniparkdb < database/vozniparkdb.sql

3. Configure database connection in `config/config.php`.  
4. Open in browser: `http://localhost/[project-folder]/index.html`  

## Default Credentials

**Admin**  
Email: `marko.petrovic@email.com`  
Password: `12345`  

**User**  
Email: `jovana.nikolic@email.com`  
Password: `54321`  

## Security & Validation
- Password hashing (`password_hash()`)  
- Role-based access control (Admin/User)  
- Prepared statements to prevent SQL injection  
- Session-based authentication  
- Client & server-side form validations  

## Future Enhancements
- Email notifications for reservations/services  
- Multi-language support  
- Mobile app integration  
- Advanced analytics dashboard  
- GPS tracking and fuel monitoring  
- PDF report generation  

## License
This project is part of an academic assignment and is provided **as-is** for educational purposes.
