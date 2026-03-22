# JCIConnect - JCI Zone 12 Platform

[![PHP](https://img.shields.io/badge/PHP-7.4%2B-blue?style=flat&logo=php&logoColor=white)](https://www.php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-5.7%2B-orange?style=flat&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![Apache](https://img.shields.io/badge/Apache-XAMPP-green?style=flat&logo=apache&logoColor=white)](https://www.apachefriends.org/)
[![License](https://img.shields.io/badge/License-JCI-red?style=flat)](README.md)

A comprehensive website for JCI Zone 12 - a global network of young active citizens building a better world.

## 🌐 Project Overview

**Project Name:** JCIConnect  
**Project Type:** Full-stack PHP Web Application  
**Core Functionality:** A membership-based platform for JCI (Junior Chamber International) Zone 12 that allows members to register, login, manage events, and maintain a business directory.  
**Target Users:** JCI members, potential new members, chapter leaders, and business owners within the JCI network.
**Current Directory:** `c:/xampp/htdocs/JCIConnect`

---

## 📋 Features

### 1. User Authentication
- **User Registration** - Members can create accounts with different membership types
- **User Login** - Secure login with email and password
- **Password Management** - Password hashing with PHP's `password_hash()`
- **Session Management** - Secure session handling with timeout
- **Role-based Access** - Different features for logged-in vs guest users

### 2. Membership Types
- Individual Member
- Educational Institution
- Corporate/Organization
- Business Owner

### 3. Business Directory
- Add new business listings (login required)
- Search businesses by name, owner, or tags
- Filter by category (Services, Products, Service Provider)
- Filter by city
- Sort by name (A-Z, Z-A)
- Contact business owners directly
- **Status:** Fully implemented with modern card grid, responsive design, sample data ✅

### 4. Event Management
- View upcoming and past events
- Event registration capability

### 5. Additional Pages
- Home Page - Hero slider with JCI creed/vision/mission
- Leaders - Leadership team information
- Partners - Partner organizations
- Contact - Contact form with submissions tracking

---

## 🛠️ Technology Stack

| Component | Technology |
|-----------|------------|
| **Frontend** | HTML5, CSS3, JavaScript, Font Awesome |
| **Backend** | PHP 7.4+ |
| **Database** | MySQL / MariaDB |
| **Server** | Apache (XAMPP) |
| **Fonts** | Google Fonts |

---

## 💻 System Requirements

- **XAMPP** (PHP 7.4+, MySQL 5.7+)
- Modern web browser

---

## 🚀 Quick Start

1. Start XAMPP (Apache + MySQL)
2. Import `database.sql` to phpMyAdmin (`jci_zone12` DB)
3. Open `http://localhost/JCIConnect/`

**Default Login:** `admin@jcizone12.org` / `Admin@123`

## Full Installation Guide

### Step 1: XAMPP Setup
Download/install XAMPP → Start Apache/MySQL.

### Step 2: Project Placement
Files already in `c:/xampp/htdocs/JCIConnect`.

### Step 3: Database
1. `http://localhost/phpmyadmin`
2. Create DB `jci_zone12`
3. Import `database.sql`

### Step 4: Run
`http://localhost/JCIConnect/`

---

## 📁 Project Structure

```
JCIConnect/
├── index.php              # Home (hero, JCI sections)
├── login.php, register.php
├── dashboard.php          # Member dashboard
├── dir.php                # Business directory (enhanced)
├── events.php, leaders.php, partner.php
├── add-business.php
├── database.sql
├── config/ (database.php, functions.php, session.php)
├── css/ (auth.css, common.css, index.css)
├── include/ (header.php, footer.php)
├── form.php               # Contact/join form
└── README.md
```

---

## 🖼️ Screenshots

### Home Page Hero
![Home Hero](JCI Zone.png)
![Join Banner](join.jpg)

### Business Directory
Modern card grid with filters/search (see `dir.php`).

---

## 🔧 Database Schema

**Key Tables:**
- `users` (roles, hashed pw)
- `businesses` (directory listings, FK to users)
- `contact_submissions`, `user_sessions`, `password_resets`

See `database.sql` for full schema.

---

## 📈 Recent Progress (from TODO.md)

**Business Directory:** Complete
- Fixed SQL/FK issues
- Card UI, search/filter/sort
- Responsive, login-gated add form
- Sample data ready

---

## 🎨 Design Notes

- JCI Blue (#0096D6) primary
- Hero slider auto-rotate
- Responsive mobile-first

---

## 🤝 Contributing

1. Fork repo
2. Create feature branch
3. Test locally (`localhost/JCIConnect`)
4. Submit PR

## 📞 Support & License

Check `SETUP.md`/`TODO.md`. For JCI Zone 12 use.

**Version:** 1.1.0 (Enhanced README)  
**Android App:** Full WebView project in `./android/JCIConnectApp/`.

## 📱 Android App Setup
1. **Open Project:** Android Studio → Open `c:/xampp/htdocs/JCIConnect/android/JCIConnectApp`
2. **Edit URL** in `MainActivity.java`:
   - Emulator: `http://10.0.2.2/JCIConnect` (maps to localhost)
   - Device: `http://[PC-IP]:80/JCIConnect` (`ipconfig` for IP, XAMPP running)
3. **Sync Gradle → Run** on emulator/device.

**Requires:** XAMPP running (web backend), Android SDK.

**Build APK:** Build > Generate Signed APK.

**Version:** 1.2.0 (Android Added)  
**Updated:** Current
