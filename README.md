# notebook
Test work for Courson.

 Необходимо ознакомиться со следующими стандартами оформления кода:
 - **[PSR-1](https://www.php-fig.org/psr/psr-1/)**
 - **[PSR-12](https://www.php-fig.org/psr/psr-12/)**

Необходимо сделать тестовое задание, следуя этим стандартам. 

Разработать веб-приложение "Телефонная книга":
* приложение должно быть написано на Laravel;
* должна быть регистрация, авторизация, восстановление пароля;
* пользователь должен иметь возможность:
    * создавать, редактировать контакты (ФИО, номер телефона);
    * просматривать список собственных контактов;
    * просматривать контакт на отдельной странице;
    * отмечать контакты как избранные;
    * удалять контакты;
* должно быть api для crud контактов.

Решение должно быть выложено на GitHub, Bitbucket.
~~~~~~~~~~~~

home.blade.php
миграции
CreateContactsTable
CreateUsersTable

сидеры
DatabaseSeeder
UsersTableSeeder
ContactsTableSeeder
UserContactsTableSeeder

фабрики
UserFactort
ContactFactory

модели
User
Contact 

вьюхи
контроллеры
роуты

ContactService
