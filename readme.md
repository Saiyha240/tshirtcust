### Install Composer Packages

Run `composer install`

### Migrate and Populate Database

Run `php artisan migrate:refresh --seed`

### Generate IDE Helper File

Run `php artisan ide-helper:generate`

### Notes

Fix error 35 when paypal is in server
    Change `CURLOPT_SSLVERSION` from 1 to 4 in `vendor/paypal/lib/PayPal/Core/PayPalHttpConfig.php`
    [Link to fix](https://www.zen-cart.com/showthread.php?214914-PayPal-Error-(35)-error-1408F10B-SSL3_GET_RECORD-wrong-version-number#post_1261341)

Cant Upload images even if png and less than 2Mb
    Edit php.ini and configue `post_max_size` or `upload_max_size` to a higher value