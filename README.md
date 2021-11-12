## Visitor Info

Laravel projesine giriş yapan kullanıcıların ip bilgilerinin kaydedildiği paket.

## Kurulum

Kuruluma başlamadan önce ipinfo paketinin kurulması gerekiyor: https://github.com/ipinfo/laravel

1) composer require mezbilisim/visitor-info
2) php artisan vendor:publish --provider="Mezbilisim\VisitorInfo\VisitorInfoServiceProvider"
3) php artisan migrate
