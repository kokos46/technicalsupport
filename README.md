# 1. Клонирование проекта

В коммандной строке прписываете такую команду 
```
git clone https://github.com/kokos46/technicalsupport.git
```
# 2. Настройка проекта
1. В командной строке, где рабочая директория - папка проекта, прописываете такие команды: 
```
composer install
cp .env.example .env
```
2. В появившемся файле .env изменяем следующие строки для базы данных:
```
DB_CONNECTION=тип вашей базы данных (например для MySQL значение будет mysql)
DB_HOST=домен/ip сервера с бд
DB_PORT=порт
DB_DATABASE=имя базы данных
DB_USERNAME=юзернейм для базы данных
DB_PASSWORD=пароль для этого юзернейма
```

3. Для почты (в том же .env)
```
MAIL_MAILER=драйвер для отправки почты (чаще всего это smtp)
MAIL_HOST=хост 
MAIL_PORT=порт
MAIL_USERNAME=имя для аутентефикации на почтовом сервере
MAIL_PASSWORD=пароль для аутентефикации на почтовом сервере
MAIL_FROM_ADDRESS=адрес отправителя по умолчанию
MAIL_FROM_NAME=имя отправителя
```

4. Выключаем режим отладки (в том же .env)
```
APP_DEBUG=false
```

6. Выполняем команды:
```
php artisan optimize
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

# 5. Запуск приложения
Просто выполняем команды:
```
npm install && npm run build
composer run dev
```

всё - приложение работает.