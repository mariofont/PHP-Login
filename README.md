# PHP-Login

Simple, easy-to-use, and database-free login system.

## How it works

* The system is coded 100% in PHP (although a minimal knowledge of HTML is required).
* The visual framework used is [Bootstrap](http://getbootstrap.com).
* There are four main pages: `login.php` shows the login form, `index.php` the default password-protected area, `logout.php` simply ends the session and `config.php` stores the user's information.

## How to use it

1. Download the source files to your computer.
2. Open `config.php` with your favorite text editor (I suggest you use [Atom](https://atom.io)) and find the variables `$Username` and `$Password`.
3. Change the username and password (note that you have to use the salted version of your password.
4. Save the files, upload them to your webserver and give it a try.

###### EXTRA:

* If you want to password-protect any page, just add this snippet of code at the beginning of it:

```php
<?php
  session_start(); /* Starts the session */
  if($_SESSION['Active'] == false){ /* Redirects user to login.php if not logged in */
    header("location:login.php");
    exit;
  }
?>
```

## Authors

* **Mario Font** - *Whole project* - [GitHub](https://github.com/mariofont)
* **Calebrw** - *Security fixes* - [GitHub](https://github.com/Calebrw)
