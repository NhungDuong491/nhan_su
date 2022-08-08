## Hướng dẫn cài đặt

**Yêu cầu:  Cài đặt <a href="https://www.apachefriends.org/download.html">Xampp</a> (hoặc warmpp) và cài đặt <a href="https://getcomposer.org/download/">Composer</a> 

- Clone về máy và để vào trong xampp (hoặc warmpp)
- Vào thư mục project, click phải vùng trắng -> Open Powershell Here
- Chạy lệnh "composer install"
- Mở Xampp, tạo 1 DATABSE mới
- Mở file " .env " trong project và thực hiện thay đổi thông tin DB_DATABASE, DB_USERNAME, DB_PASSWORD cho phù hợp với CSDL vừa tạo
- Vào lại thư mục project, click phải vùng trắng -> Open Powershell Here
- Chạy tiếp lệnh: "php artisan migrate --seed" để tạo mới cái bảng và dữ liệu