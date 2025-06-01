# JustChat 🗨️

A lightweight, room-based chat application built with **PHP**, **HTML/CSS**, and **MySQL** for message persistence.  
It ships with separate chat rooms for popular sports—**Cricket, Football, Formula 1**, and a **General** lounge—making it easy to extend or customise.

---

## ✨ Features

| Area | What you get |
|------|--------------|
| **Modular rooms** | Each sport has its own folder & entry script, so adding a new room is just a matter of copying one directory. |
| **SQL-backed chat** | Messages are saved in MySQL, keeping the history available after a server restart. |
| **Pure-PHP stack** | No frameworks required—perfect for small hosting plans or quick demos. |
| **Simple UI** | Clean HTML/CSS you can restyle or replace with your favourite frontend framework. |

---

## 🛠 Tech Stack

- **PHP** ≥ 7.4  
- **MySQL/MariaDB** (5.x or 8.x)  
- HTML5, CSS3

---

## 📋 Prerequisites

| Tool | Version | Notes |
|------|---------|-------|
| PHP | 7.4 + | `php -v` |
| MySQL | 5.x / 8.x | Or MariaDB |
| Composer | *optional* | Only if you add packages later |

---

## ⚡ Quick Start

### 1. Clone the repo

```bash
git clone https://github.com/ShreyashM17/justchat.git
cd justchat
```

### 2. Create the database & table

```sql
-- Run in MySQL client
CREATE DATABASE justchat CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE justchat;

CREATE TABLE messages (
  id          INT UNSIGNED NOT NULL AUTO_INCREMENT,
  room        VARCHAR(50)  NOT NULL,
  username    VARCHAR(50)  NOT NULL,
  message     TEXT         NOT NULL,
  created_at  TIMESTAMP    DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (id),
  INDEX idx_room_created_at (room, created_at)
);
```

> **Tip:** Save the snippet above as `setup.sql` so anyone can import it with  
> `mysql -u <user> -p justchat < setup.sql`.

### 3. Configure database credentials

Create **`config.php`** (or update it) and set:

```php
<?php
$DB_HOST = 'localhost';
$DB_NAME = 'justchat';
$DB_USER = 'your_mysql_user';
$DB_PASS = 'your_mysql_password';
?>
```

*(Keeping credentials outside version control—e.g. via environment variables—is recommended for production.)*

### 4. Launch a local PHP server

```bash
# From the repo root
php -S localhost:8000
```

Open <http://localhost:8000> in your browser and start chatting!

---

## 🚀 Deployment Notes

| Host | Works out-of-the-box | Extra steps |
|------|----------------------|-------------|
| **Shared cPanel / LAMP** | ✔️ | Import `setup.sql`; upload files via FTP. |
| **Render (Docker)** | ✔️ | Add environment vars for DB creds. |
| **Heroku + ClearDB** | ✔️ | Use a ClearDB MySQL add-on; map creds to `config.php`. |
| **Vercel / Netlify** | *Static only* | These platforms don’t run PHP natively. Deploy the backend elsewhere or migrate to serverless functions. |

---

## 🗺 Project Structure

```text
justchat/
│
├─ cricket/         # Cricket chat room (index.php + assets)
├─ football/        # Football chat room
├─ formula1/        # Formula 1 chat room
├─ general/         # General chat room
│
├─ assets/          # Shared CSS / images
├─ config.php       # DB credentials (git-ignored in prod)
└─ index.html       # Landing page with room links
```

---

## 🔮 Roadmap / Ideas

- ✅ Store messages in MySQL  
- ☐ AJAX or WebSocket polling for real-time updates  
- ☐ User authentication & avatars  
- ☐ Admin panel for room moderation  
- ☐ Responsive redesign with Tailwind / Bootstrap  

---

## 🤝 Contributing

Pull requests are welcome! Please open an issue first to discuss what you’d like to change.


Happy hacking & happy chatting! 💬
