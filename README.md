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

# Документация по API

**Регистрация**  
* URL:  
		http://notebook.eagle-projects.ru/api/sanctum/register  
* Тип запроса:  
		POST  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json		
* Параметры:  
		email  
		password  
		device_name  
		name  
	
**Получение токена**  
* URL  
		http://notebook.eagle-projects.ru/api/sanctum/token  
* Тип запроса:  
		POST  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json		
* Параметры:  
		email 			: string  
		password		: string  
		device_name		: string  

**Получение списка контактов**  
* URL  
		http://notebook.eagle-projects.ru/api/contacts  
* Тип запроса:  
		GET  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json	
* Авторизация:  
		Bearer Token  

**Получение контакта**  
* URL  
		http://notebook.eagle-projects.ru/api/contacts/{contactId}  
* Тип запроса:  
		GET  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json	
* Авторизация:  
		Bearer Token  
		
**Создание контакта**  
* URL  
		http://notebook.eagle-projects.ru/api/contacts  
* Тип запроса:  
		POST  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json	
* Авторизация:  
		Bearer Token  
* Параметры:  
		name		: string  
		phone		: string  
		favorited	: 'on' или ''  
		
**Редактирование контакта**  
* URL  
 http://notebook.eagle-projects.ru/api/contacts/{contactId}  
* Тип запроса:  
		PUT  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json	
* Авторизация:  
		Bearer Token  
* Параметры:  
		name		: string  
		phone		: string  
		favorited	: 'on' или ''  		
		
**Изменение статуса "В избранном"**  
* URL  
	http://notebook.eagle-projects.ru/api/favorite/{contactId}  
* Тип запроса:  
		PUT  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json	
* Авторизация:  
		Bearer Token  

**Удаление контакта**  
* URL  
		http://notebook.eagle-projects.ru/api/contacts/{contactId}  
* Тип запроса:  
		DELETE  
* Заголовки:  
		Content-Type	: application/json  
		Accept 			: application/json	
* Авторизация:  
		Bearer Token  

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
