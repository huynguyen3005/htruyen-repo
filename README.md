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

# Stop and remove all containers
docker-compose down

# Remove all volumes
docker volume rm $(docker volume ls -q)

# Rebuild and start the containers
docker-compose up --build

# Start the containers
docker-compose up -d

# server phpMysql
http://localhost:8081/

# Link app
http://localhost:8080/

# Lệnh chạy trong docker link storage
docker exec -it reading_comic_app php artisan storage:link

# Lệnh copy file vào docker container 
docker cp /home/nguyenvanhuy3005/reading_comic_2.sql reading_comic_db:/tmp/reading_comic_2.sql

# lệnh kết nối vào app container
docker-compose exec app bash
composer install


# Lệnh tải file sql vào database
docker exec -it reading_comic_db mysql -u root -p
USE reading_comic
source /tmp/reading_comic_2.sql;

# reading-manga-project-repo

# kết nối với server
user: root
password: 12345678

ssh linuxuser@207.148.69.21
# kết nối server mới namecheap
ssh -p 21098 -i cpanel-key.pem htrubusl@209.74.67.50

docker exec -it reading_comic_app bash

docker-compose up -d
# copy sql file từ local lên host
scp /home/nguyenvanhuy3005/reading_comic_2.sql root@45.77.38.172:/root/

docker-compose exec reading_comic_filebrowser filebrowser users add admin admin --perm.admin=true


Cách đăng nhập filebrowser
Username: admin
Password: @Huy30052001

ssh -p 21098 -i cpanel-key.pem htrubusl@209.74.67.50


mysql -u htrubusl_huynguyen -p'@Huy30052001' htrubusl_htruyen-db < /home/htrubusl/reading_comic.sql
