# Contact-form-test202311
## 環境構築
- 1.git clone git@github.com:coachtech-material/laravel-docker-template.git
- 2.docker-compose up -d build 
- 3.mv laravel-docker-template contact-form-test
- 4.php artisan make:migrate create_contact_table
- 5.php artisan make:migrate create_categoris_table
- 6.php artisan make:migrate rename_create_contact_table
- 7.php artisan migrate
- 8.php artisan make:model Contact
- 9.php artisan make:model Category
- 10.php artisan make:seeder ContactFormTableSeeder
- 11.php artisan make:seeder CategoryTableSeeder
- 12.php artisan make:factory ContactFactory
- 13.php artisan db:seed

## 使用技術(実行環境)
- PHP 8.2.11
- Laravel 8.83.8
- mysql  Ver 8.0.26 for Linux on x86_64

## ER図
![test1 drawio](https://github.com/hibikaGO/Contact-form-test202311/assets/145337159/3792783f-4251-4843-a1e5-144f6532db3f)


## URL
- 開発環境：http://localhost/
- phpMyadmin:http://localhost:8080/
