# 🔄 FLOW APLIKASI
1. User login/registrasi.
2. Admin/User diarahkan ke dashboard.
3. Admin kelola data, User gunakan fitur aplikasi.

## **Struktur MVC**
index.php → controller → model → view

# low Login
>index.php (membaca user yang belum login juga dan di arahkan ke halaman login) 
  
>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/guest/Login.php 
   
>→ src/app/model/User_model.php 
   
>→ src/app/views/guest

# Flow Register
>index.php 
  
>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/guest/Register.php 
   
>→ src/app/model/User_model.php 
   
>→ src/app/views/guest

# Flow Fitur Admin
Beberapa alur jalannya file dari aplikasi
## Halaman Dashboard
>index.php 
  
>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/admin/dashboard.php 
   
>→ src/app/model 
   
>→ src/app/views/admin

## Halaman Koleksi Buku (ada fitur hapus buku)
>index.php 

>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/admin/koleksi_buku.php 
   
>→ src/app/model 
   
>→ src/app/views/admin

## Halaman Tambah Buku
>index.php 

>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/admin/tambah_buku.php 
   
>→ src/app/model/Book_model.php
   
>→ src/app/views/admin

## Halaman Daftar Pengguna
>index.php 

>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/admin/pengguna.php 
   
>→ src/app/model/User_model.php
   
>→ src/app/views/admin

## Halaman Logout
>index.php 

>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/admin/logout.php (menghapus sesi dan cookie) 
   
>→ src/app/controller/admin/login.php

# Flow Fitur User 
## Halaman Dashboard
> index.php 

>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/user/dashboard.php 
   
>→ src/app/model/Book_model.php
   
>→ src/app/views/user

## Halaman Buku
> index.php 

>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/user/book.php
   
>→ src/app/model/Book_model.php
>→ src/app/model/Lend_model.php
   
>→ src/app/views/user

## Halaman Riwayat Peminjaman
>index.php 

>→ src/app/core/App.php 
   
>→ src/app/core/Controller.php 
   
>→ src/app/controller/user/history.php
   
>→ src/app/model/Book_model.php
>→ src/app/model/Lend_model.php
   
>→ src/app/views/user



<-- [Kembali](./README.md)