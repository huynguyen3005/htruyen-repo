-   create modle as a l5-repository patterm
    php artisan make:entity Comic

-   laravel-service-generator
    link : https://github.com/timwassenburg/laravel-service-generator
    command : php artisan make:service UserService

-   trước khi fetch data truyện cần chạy work
    php artisan queu:work



- netstat -ano | findstr :8000 // Kiểm tra cổng có mở trên Windows chư
- netsh advfirewall set allprofiles state off // tắt firewall
- php artisan serve --host=0.0.0.0 --port=8000  //chạy project trên ip máy
- http://localhost:8000/  // truy cập trên mấy tính
- http://192.168.1.158:8000  // truy cập từ điện thoại // dùng khi car điện thoại và máy tính cùng 1 wifi

- ngrok http http://localhost:8000 // dùng khi không cùng wifi

