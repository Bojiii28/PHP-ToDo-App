# 📝 php-todo-app

A simple **To-Do List Application** built with **PHP** and **MySQL**.  
This project follows the **MVC architecture** (Model, View, Controller) and demonstrates **basic CRUD** operations.  
Perfect for beginners learning PHP and database integration.

---

## 🚀 Features

- ✅ Add new tasks
- 📋 View all tasks
- ✏️ Edit existing tasks
- ❌ Delete tasks
- ⏳ Mark tasks as pending or done
- 🧩 MVC pattern for clean and organized code

---

## 🧱 Project Structure

```

php-todo-app/
│
├── app/
│ ├── controllers/
│ │ └── TodoController.php
│ ├── dtos/
│ │ └── TodoDTO.php
│ ├── helpers/
│ │ └── TodoHelper.php
│ └── models/
│ └── Todo.php
│
├── config/
│ └── database.php
│
├── views/
│ ├── index.php
│ ├── create.php
│ └── edit.php
│
├── public/
│ ├── index.php
│ └── assets/
│ └── style.css
│
└── README.md

```

---

## ⚙️ Setup Instructions

### 1. Clone or Download

Copy this folder inside your **XAMPP htdocs**:

```

C:\xampp\htdocs\php-todo-app

```

Or use Git:

```

git clone [https://github.com/your-username/php-todo-app.git](https://github.com/your-username/php-todo-app.git)

```

---

### 2. Create the Database

Open **phpMyAdmin** and run this SQL script:

```sql
CREATE DATABASE todo_app;
USE todo_app;

CREATE TABLE todos (
  id INT AUTO_INCREMENT PRIMARY KEY,
  title VARCHAR(255) NOT NULL,
  description TEXT,
  is_done TINYINT(1) DEFAULT 0,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP;

);
```

---

### 3. Configure Database Connection

Open this file:

```
php-todo-app/config/database.php
```

Update the credentials:

```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "todo_db";
```

---

### 4. Run the App

Start **Apache** and **MySQL** in your **XAMPP Control Panel**.
Then open this URL in your browser:

```
http://localhost/php-todo-app/views/index.php
```

---

## 🧠 MVC Explanation

| Layer          | File                                 | Description                              |
| -------------- | ------------------------------------ | ---------------------------------------- |
| **Model**      | `app/models/Todo.php`                | Handles all database queries and logic   |
| **View**       | `views/`                             | Displays tasks and forms (UI)            |
| **Controller** | `app/controllers/TodoController.php` | Connects user input and model logic      |
| **Helper**     | `app/helpers/TodoHelper.php`         | Optional utilities or reusable functions |

---

## 🎨 Design

A simple clean interface styled with:

```
/assets/css/style.css
```

You can customize colors and spacing easily for your own theme.

---

## 🧩 Tech Stack

- 🐘 PHP (Core)
- 🗄️ MySQL (Database)
- 🧱 HTML & CSS (Frontend)
- ⚙️ XAMPP (Local Server)

---

## 🧑‍💻 Author

**John Mark M. Enriquez**
🎓 Beginner Full Stack Developer
📧 johnmarkenriquez12l@gmail.com

---
