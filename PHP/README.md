# PHP Learning Directory

Welcome to the PHP Learning Directory! This folder contains various files and examples designed to help you learn and practice PHP.

## What is PHP?

PHP (Hypertext Preprocessor) is a popular open-source scripting language that is especially suited to web development. It is fast, flexible, and pragmatic, powering everything from simple websites to content management systems like WordPress. PHP code is usually processed on a web server, which then sends the resulting output (often HTML) to the client (your browser).

## How to View PHP Output in a Web Browser

Below are the basic steps to get your PHP environment set up so you can view the output of your files in a web browser:

1. **Install Apache and MySQL**
   - You can install Apache, PHP, and MySQL separately, or you can use a package like [XAMPP](https://www.apachefriends.org/) or [WAMP](http://www.wampserver.com/).
   - These packages provide a simple installation of Apache (the web server), PHP (the language you’ll be coding in), and MySQL (the database system).

2. **Place Your PHP Files in the Web Server’s Root Directory**
   - If you installed XAMPP:
     - Move your PHP files into the `htdocs` folder (often found at `C:/xampp/htdocs/` on Windows).
   - If you installed WAMP:
     - Move your PHP files into the `www` folder (often found at `C:/wamp/www/` on Windows).
   - On a typical Linux setup with Apache:
     - The default root directory is usually `/var/www/html/`.

3. **Start Apache and MySQL Services**
   - Ensure Apache (and MySQL if needed) is running.
   - Using XAMPP, open the XAMPP Control Panel and click "Start" next to Apache and MySQL.
   - Using WAMP, click on the system tray icon and start the required services.
   - On Linux, you may use commands like `sudo service apache2 start` (Debian/Ubuntu) or `sudo systemctl start httpd` (Fedora/CentOS).

4. **Access Your PHP Files in the Browser**
   - Open your web browser and go to `http://localhost/your-file-name.php`.
   - If your project is in a subfolder, for example `/my-php-project/index.php`, navigate to `http://localhost/my-php-project/index.php`.

5. **Check for Errors or Configuration Issues**
   - If you see a 404 error, ensure you typed the correct file path and name.
   - If you see raw PHP code in the browser, ensure Apache’s PHP module is correctly enabled and running.
   - If you encounter database-related errors, verify your MySQL connection details.

## Additional Resources

- [PHP Official Website](https://www.php.net)
- [XAMPP Documentation](https://www.apachefriends.org/docs/)
- [MySQL Documentation](https://dev.mysql.com/doc/)

## NOTES
- had to change MySQL port from 3306 to 3307 because wsl was using 3306.
- I was having trouble seeing script in browser the problem was I use a wsl subsystem to edit files and for another project I had to install and run an apache server but never stopped It
    - **Resolving the issue**
        - stopped apache on wsl
        - that freed port 80 to listen to all request on windows including wsl
        - and WALLA! the script appeared! :D
- Variables always start with a dollar sign *$* for example:
    - $name = "Luis Fonsi";
    - $song = "Despacito";
    - It also has global variables called superglobal variables:
        - $GLOBALS
            - An associative array containing references to all variables currently defined in the global scope.
        - $_SERVER
            - An array containing information such as headers, paths, and script locations. For example, `$_SERVER['HTTP_USER_AGENT']` gives you the User-Agent string.
        - $_GET
            - An associative array of variables passed to the current script via the URL parameters (query string).
        - $_POST
            - An associative array of variables passed to the current script via the HTTP POST method.
        - $_FILES
            - An associative array of items uploaded to the current script via the HTTP POST method.
        - $_COOKIE
            - An associative array of variables passed to the current script via HTTP cookies.
        - $_SESSION
            - An associative array containing session variables available to the current script.
        - $_REQUEST
            - An associative array that by default contains the contents of `$_GET`, `$_POST`, and `$_COOKIE`.
        - $_ENV
            - An associative array of variables passed to the current script via the environment method.
