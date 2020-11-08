# Data Wilayah Indonesia untuk Laravel

[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NU3XK7VXYTYKY)
[![Latest Stable Version](https://poser.pugx.org/sentrasoft/laravel-indonesia/v/stable)](https://packagist.org/packages/sentrasoft/laravel-indonesia)
[![Total Downloads](https://poser.pugx.org/sentrasoft/laravel-indonesia/downloads)](https://packagist.org/packages/sentrasoft/laravel-indonesia)
[![Monthly Downloads](https://poser.pugx.org/sentrasoft/laravel-indonesia/d/monthly)](https://packagist.org/packages/sentrasoft/laravel-indonesia)
[![Latest Unstable Version](https://poser.pugx.org/sentrasoft/laravel-indonesia/v/unstable)](https://packagist.org/packages/sentrasoft/laravel-indonesia)
[![License](https://poser.pugx.org/sentrasoft/laravel-indonesia/license)](https://packagist.org/packages/sentrasoft/laravel-indonesia)

Berisi data Provinsi, Kabupaten/Kota, Kecamatan, dan Keluarahan/Desa di seluruh Indonesia. Paket ini adalah hasil penyederhanaan dari repository [laravolt/indonesia](https://github.com/laravolt/indonesia).

## Instalasi

#### Via Composer

``` php
$ composer require sentrasoft/laravel-indonesia
```

#### Via edit `composer.json`

	"require": {
		"sentrasoft/laravel-indonesia": "dev-master"
	}

Selanjutnya, update Composer melalui terminal:

``` bash
$ composer update
```

## Konfigurasi

Setelah mengupdate Composer, daftarkan ServiceProvider ke `config/app.php`.
> Mulai versi 5.5 ke atas, Laravel sudah support fitur auto discover sehingga tidak perlu lagi mendaftarkan ServiceProvider dan Facade secara manual.

```php
'providers' => array(
    ...

    Sentrasoft\Indonesia\IndonesiaServiceProvider::class,
);
```

Kemudian tambahkan alias ke `config/app.php`.

```php
'aliases' => array(
    ...

    'Indonesia' => Sentrasoft\Indonesia\Facades\Indonesia::class,
);
```

Anda dapat melakukan publish berkas migrasi dan konfigurasi `indonesia.php`:
``` php
$ php artisan vendor:publish --provider="Sentrasoft\Indonesia\IndonesiaServiceProvider"
```

Setelah itu Anda perlu menjalankan migrasi:
``` php
$ php artisan migrate
```

dan lakukan seeder untuk mengisi data wilayah:
``` php
$ php artisan indonesia:seed
```

## Penggunaan

#### Mendapatkan semua data provinsi
```php
$provinces = \Indonesia::allProvinces();
```

## Support Us
[![Donate](https://img.shields.io/badge/Donate-PayPal-green.svg)](https://www.paypal.com/cgi-bin/webscr?cmd=_s-xclick&hosted_button_id=NU3XK7VXYTYKY)

Help us to keep making awesome stuff. You don't have to be a developer to support our open source work. If you want to receive personal support, or just feel all warm and fuzzy inside from helping open source development, donations are very welcome. Thank you.

## License

The MIT License (MIT). Please see [License File](LICENSE.md) for more information.
