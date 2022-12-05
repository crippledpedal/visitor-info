## Visitor Info

Laravel projesine giriş yapan kullanıcıların ip bilgilerinin kaydedildiği paket.

## Kurulum

Kuruluma başlamadan önce aşağıdaki paketlerin kurulması gerekiyor: 
1) geoip: https://github.com/Torann/laravel-geoip
2) (OPTIONAL) laravel-excel: https://docs.laravel-excel.com/3.1/getting-started/installation.html


Daha sonra kurulum için aşağıdaki adımları izleyin.
1) composer require mezbilisim/visitor-info
2) php artisan vendor:publish --provider="Mezbilisim\VisitorInfo\VisitorInfoServiceProvider"
3) php artisan migrate
4) php artisan optimize:clear

config/visitor.php içindeki 'access-key' değerini doldurun. Bu değer formdaki doğrulama değeridir. 
