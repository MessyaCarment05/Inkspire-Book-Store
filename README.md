# Inkspire
**Inkspire** is an online bookstore website designed for users to easily find and purchase books. With a clean and intuitive interface, customers can effortlessly browse a diverse selection of titles, add their favorites to the cart, and complete their purchases through a secure and straightforward checkout process. The platform prioritizes user experience, ensuring that book shopping is both convenient and enjoyable. Available anytime and anywhere, Inkspire connects readers with the books they love, making it a go-to destination for all their literary needs.

# Steps to use :
1. Open XAMPP, then start Apache and MySQL.
2. Open Explorer and navigate to the `htdocs` folder.
3. Run the command `git clone https://github.com/MessyaCarment05/Inkspire-Book-Store.git` in the terminal within the `htdocs` folder.
4. Open phpMyAdmin in XAMPP and create a new database.
5. In the cloned folder, create a new `.env` file and copy the contents from `.env.example` into the `.env` file.
6. In the `.env` file, change `DB_DATABASE=___` to `DB_DATABASE=(name of the database created in phpMyAdmin)`.
7. Run the command `php artisan migrate` in the terminal.
8. To insert book and category data, run the commands `php artisan db:seed --class=CategorySeeder` and `php artisan db:seed --class=BookSeeder`.
9. Finally, run the command `php artisan serve` in the terminal.
   
# Software used:
- XAMPP 8.1.10
- Composer 2.4.3
- Visual Studio Code 1.90.2

# Framework used:
- Laravel 10.48.11

# Programming Languages used:
- PHP 8.1.10
- CSS
- JavaScript
- Blade
