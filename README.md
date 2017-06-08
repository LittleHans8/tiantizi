## README

### 环境

- nginx:`apt install nginx`
- composer:`apt install composer`
- php:`apt install php`
  - php-mysql:`apt install php-mysql`
  - php-ext-gd:`apt install php-gd`
  - php-ext-curl:`apt install php-curl`
  - php-ext-mbstring:`apt install php-mbstring`
  - php ext-dom/ext-simplexml:`apt install php-xml`



### 配置

- `git clone https://github.com/Littlehans8/tiantizi.git`


-  `composer install`
-  `php artisan key:genereate`
-  `crontab -e `
-  `* * * * * php /path-to-your-project/artisan schedule:run >> /dev/null 2>&1`
-  KEY: base64:iL9fl2yoGWO9KPJI53Kl9V4YiJY357GNdyqBoy6RVEM=





```shell
MAIL_DRIVER=smtp
MAIL_HOST=smtp.gmail.com
MAIL_PORT=587
MAIL_USERNAME=myemail@gmail.com
MAIL_PASSWORD=apppassword
MAIL_ENCRYPTION=tls
```

```nginx
location / {
    try_files $uri $uri/ /index.php?$query_string;
}
```

- `chmod -R 777 ` storage 
- `chmod -R 777 bootstrap/cache`