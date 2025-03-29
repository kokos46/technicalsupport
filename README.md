# 1. Configure project
1. Install dependecies: 
```
composer install
```
1. Rename .env.example to .env
2. Change this values for database:
```
DB_CONNECTION
DB_HOST
DB_PORT
DB_DATABASE
DB_USERNAME
DB_PASSWORD
```
 for mail:
```
MAIL_MAILER (mail driver)
MAIL_HOST 
MAIL_PORT
MAIL_USERNAME
MAIL_PASSWORD
MAIL_FROM_ADDRESS
MAIL_FROM_NAME
```


3. Run commands:
```
php artisan migrate --seed
php artisan key:generate
php artisan serve
```

# User and manager
User: 
	email: test@example.com
	login: user
	password: password
Manager:
	email: manager@example.com
	login: manager
	password: managerpass