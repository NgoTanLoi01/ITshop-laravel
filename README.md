# Chuyên ngành - Ngô Tấn Lợi - DA20TTA - ITshop - Laravel
<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

[![Open in Visual Studio Code](https://img.shields.io/static/v1?logo=visualstudiocode&label=&message=Open%20in%20Visual%20Studio%20Code&labelColor=2c2c32&color=007acc&logoColor=007acc)](https://open.vscode.dev/microsoft/Web-Dev-For-Beginners)

<p align="center">
  
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/d/total.svg" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/v/stable.svg" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://poser.pugx.org/laravel/framework/license.svg" alt="License"></a>
</p>

## Thông tin dự án
#### Cơ sở dữ liệu:
![website_banthietbitinhoc](https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel/assets/112923143/d5019207-967d-4203-a981-b62cab6083ca)

#### Biểu đồ Use Case tổng quát:
![Biểu đồ use case tổng quát drawio](https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel/assets/112923143/a1da0bbc-7686-4609-8ef4-7369b791a2fa)


#### Giao diện người dùng:
![Poster_ChuyenNganh_NgoTanLoi_new](https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel/assets/112923143/e5b867a5-2a01-4b09-ae74-41ee9adc35aa)





## Cách cài đặt 
  - Cài đặt PHP phiên bản 7.3 trở lên và Composer
  - Tải dự án từ github

          git clone https://github.com/NgoTanLoi01/cn-da20tta-ngotanloi-ITshop-laravel.git
  - Cài đặt phần còn thiếu của dự án

          composer install
          composer update

  - Chạy dự án
    - Chạy lệnh sau để xóa symbolic link cũ trong thư mục public của Laravel 
   
           Remove-Item -Recurse -Force public\storage
    - Chạy lệnh sau để tạo ra một symbolic link mới trong thư mục public của Laravel
   
           php artisan storage:link
    - Chạy lệnh sau để tạo các bảng cơ sở dữ liệu
   
          php artisan migrate:fresh --seed
    - Chạy dự án laravel

          php artisan serve
    - Truy cập vào địa chỉ localhost vừa xuất hiện
   
          http://127.0.0.1:8000/

## Thông tin liên hệ tác giả
  - Họ tên: Ngô Tấn Lợi
  - SĐT: 0337120073
  - Email: ngotanloi2424@gmail.com
