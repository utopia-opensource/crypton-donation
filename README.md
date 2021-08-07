# crypton-donation
Web service for donating in Crypton

![image](https://github.com/jared970/crypton-donation/raw/main/res/image.png)

A service that allows you to simultaneously shorten your Crypton address, as well as create a link to get Crypton.
You can use such a link in your blog, websites and forums, in your social channels.

## requirements

* PHP 7.4+
* PHP-gmp extension
* Composer 2+

## install

```bash
cp example.env .env
composer install
```

* & import db dump from `dump.sql`
* specify db params in `.env`
