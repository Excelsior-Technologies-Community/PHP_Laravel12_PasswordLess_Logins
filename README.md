# PHP_Laravel12_PasswordLess_Login
# Laravel Passwordless Login System (Magic Link Authentication)

## Project Overview

Laravel Passwordless Login System is a secure authentication mechanism that allows users to log in using a time‑limited magic link sent to their email address.

Instead of passwords, users authenticate through:

* One-time secure token
* Email-based verification
* Expiration control
* Single-use validation

This project demonstrates a modern passwordless authentication architecture built with Laravel 12.

---

## Step 1 – Create New Laravel Project

```bash
composer create-project laravel/laravel passwordless-login
cd passwordless-login
```

---

## Step 2 – Configure Database

Update `.env`:

```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=passwordless_login
DB_USERNAME=root
DB_PASSWORD=
```

Create the database manually in MySQL.

---

## Step 3 – Create Magic Links Migration

```bash
php artisan make:migration create_magic_links_table
```

Table: magic_links

Columns:

* id
* email (indexed)
* token (64 chars, unique)
* expires_at (timestamp)
* used (boolean)
* timestamps

Run migration:

```bash
php artisan migrate
```

---

## Step 4 – Create MagicLink Model

```bash
php artisan make:model MagicLink
```

Key Features:

* generateToken($email) method
* 30-minute expiration
* isValid() method
* Boolean and datetime casting

This model handles token generation and validation logic.

---

## Step 5 – Configure Mail (Mailtrap Example)

Update `.env`:

```
MAIL_MAILER=smtp
MAIL_HOST=smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=your_mailtrap_username
MAIL_PASSWORD=your_mailtrap_password
MAIL_ENCRYPTION=tls
MAIL_FROM_ADDRESS="hello@example.com"
MAIL_FROM_NAME="${APP_NAME}"
```

---

## Step 6 – Create Mail Class

```bash
php artisan make:mail MagicLinkMail
```

Responsibilities:

* Accept MagicLink instance
* Define subject
* Load email view

---

## Step 7 – Create Email View

Location:

```
resources/views/emails/magic-link.blade.php
```

Displays:

* Login button
* Expiration notice (30 minutes)
* Security notice

---

## Step 8 – Create MagicLinkController

```bash
php artisan make:controller Auth/MagicLinkController
```

Controller Methods:

* showLoginForm()
* sendLink()
* verifyLogin($token)

Flow:

1. User enters email
2. Token generated
3. Email sent
4. Token validated
5. User auto-logged in

If user does not exist, account is auto-created.

---

## Step 9 – Create Views

Structure:

```
resources/views/
├── auth/magic-login.blade.php
├── emails/magic-link.blade.php
└── dashboard.blade.php
```

Includes:

* Clean responsive login form
* Success and error alerts
* Simple dashboard view

---

## Step 10 – Update Routes

Routes include:

* GET /login/magic
* POST /login/magic
* GET /login/magic/{token}
* GET /dashboard (auth protected)
* POST /logout

---

## Step 11 – User Model

Ensure User model contains:

* name
* email
* password

Password field remains for Laravel compatibility.

---

## Step 12 – Testing the Application

```bash
php artisan serve
```

Visit:

```
http://localhost:8000

```
<img width="732" height="389" alt="image" src="https://github.com/user-attachments/assets/51e747e2-55f9-413f-a54d-053e329e350f" />
<img width="1607" height="415" alt="image" src="https://github.com/user-attachments/assets/83046153-79b3-461a-b4f6-965a7b184ce3" />


Testing Steps:

1. Enter email address
2. Check Mailtrap inbox
3. Click magic link
4. Automatically redirected to dashboard

---

## Optional – Add Rate Limiting

Use Laravel RateLimiter:

* Limit: 3 attempts per hour per email
* Prevents spam and abuse
* Returns error after exceeding attempts

---

## Security Features

* 64-character random token
* Single-use tokens
* Expiration time validation
* Email-based verification
* Auto invalidation after use
* Rate limiting support

---

## Real-World Use Cases

* SaaS applications
* Modern web authentication
* OTP alternative systems
* High-security admin panels
* Passwordless enterprise login

---

## Advantages of Passwordless Login

* No password storage risk
* Reduced brute-force attacks
* Improved user experience
* Simpler onboarding

---

## Future Enhancements

* Signed URL support
* Queue email sending
* Multi-device session control
* Login audit logs
* Two-factor verification

---

This Laravel Passwordless Login System demonstrates modern authentication architecture suitable for secure and scalable production applications.

