# Fleet Management System

A full-featured web-based application for managing company vehicle fleets, built with PHP and MySQL. Includes admin and user portals, reservation and service management, fault reporting, and role-based access control.

---

## Features

**Admin Panel**
- Manage vehicles: add, edit, delete, view
- Manage drivers and licenses
- Track vehicle faults and updates
- Schedule and track services
- Review user requests and inbox messages
- Generate searchable reports

**User Portal**
- Browse available vehicles in real-time
- Make, manage, and cancel reservations
- Report vehicle issues
- Submit requests to administrators
- View reservation history

---

## Tech Stack
- **Backend:** PHP 7.4+
- **Database:** MySQL/MariaDB (includes schema and seed data scripts)
- **Frontend:** HTML5, CSS3, JavaScript (jQuery), Bootstrap
- **Server:** Apache/XAMPP

---

## Database Overview
Key tables:
- `korisnici` – Users (Admin/User roles)
- `vozila` – Vehicles
- `vozaci` – Drivers
- `rezervacije` – Reservations
- `kvarovi` – Fault reports
- `servisi` – Service appointments
- `zahtevi` – User requests

---

## Installation & Setup

1. Install XAMPP (Apache + MySQL + PHP) and start Apache & MySQL.
2. Create database and import schema/seed data:
```bash
mysql -u root -p
CREATE DATABASE vozniparkdb;
mysql -u root -p vozniparkdb < database/vozniparkdb.sql
Configure database connection in config/config.php.

Open in browser:

http://localhost/[project-folder]/index.html

Default Credentials

Admin

Email: marko.petrovic@email.com

Password: 12345

User

Email: jovana.nikolic@email.com

Password: 54321

Security & Validation

Password hashing (password_hash())

Role-based access control (Admin/User)

Prepared statements to prevent SQL injection

Session-based authentication

Client & server-side form validations

Future Enhancements

Email notifications for reservations/services

Multi-language support

Mobile app integration

Advanced analytics dashboard

GPS tracking and fuel monitoring

PDF report generation

License

This project is part of an academic assignment and is provided as-is for educational purposes.
