<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Documentation / Dokumentasi
### Installation / Installasi

1. Clone Repo
```
git clone https://github.com/DwiBlackList/Test-FastPrintIndonesia.git
```
2. Composer Install
```
composer i
```
3. NPM Install
```
npm i
```
4. Make .env
- Copy .env.example
```
cp .\.env.example .env
```
- Generate key
```
php artisan key:generate
```
- Change APP_ENV TO production
```
APP_ENV=production
```
> [!NOTE]
> Jika APP_ENV=local ; maka Poin nomor 6 diganti dengan npm run dev

- Set up connection to database
```
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=test-fastprintindonesia
DB_USERNAME=root
DB_PASSWORD=
```
5. Setup Database
- Run Migration
```
php artisan migrate
```
- Run Seeders
```
php artisan db:seed
```
6. Build CSS And JS via NPM
```
npm run build
```
7. Run Project
```
php artisan serve
```
<hr>

### About The Website

![Bagian Awal Website.](https://i.imgur.com/QjVb3q8.png)
Pada halaman awal diwebsite akan ditampilkan list produk dengan status "bisa dijual" sesuai dengan soal <br>
5. Lalu tampilkan data yang hanya memiliki status " bisa dijual "<br>

Terdapat tombol login dan register yang sebetulnya tidak diperlukan register karena login disini bertujuan untuk login admin website , bukan sebagai user / orang yang bisa berjualan diwebsite kita (layaknya e-commerce)<br>

Selain itu telah terdapat Fitur Pencarian nama produk , Fitur Filter kategori , dan dilengkapi pagination
![Hasil Pencarian Nama.](https://i.imgur.com/jkAMeck.png)
> [!NOTE]
> Hasil Pencarian

![Hasil Filter Kategori.](https://i.imgur.com/etQaAX5.png)
> [!NOTE]
> Hasil Filter Kategori

![Pagination.](https://i.imgur.com/orYSJKM.png)
> [!NOTE]
> Pagination Pojok Kiri Bawah

Dari sisi Admin Web<br>
hal pertama adalah login
![Halaman Login.](https://i.imgur.com/IeNaR7J.png)
> [!NOTE]
> Akun admin. Username : test@example.com , Password : password

Setelah login berhasil akan diarahkan ke halaman Dashboard
![Halaman Dashboard.](https://i.imgur.com/IeorSNh.png)
Pada halaman dashboard masih kosongan , hal ini biasanya di isi dengan data-data penjualan<br>
Diatas / navigation bar telah terdapat link untuk menuju CRUD data produk , kategori , status , dan profil / log-out<br>
setiap CRUD data memiliki kesamaan , yang paling berbeda adalah data produk , karena menggabungkan data dari tabel lain.<br>
hanya halaman data produk juga yang memiliki fitur pencarian , dan filter.
![Halaman Data Produk.](https://i.imgur.com/8dpwtv4.png)
Penambahan / Pengeditan data memunculkan pop-up / modal untuk form<br>
Validasi pada Soal "7. Untuk fitur tambah dan edit gunakan form validasi (inputan nama harus diisi, dan harga harus berupa inputan angka)" juga sudah di implementasikan melalui code controller request
![Add Data Produk.](https://i.imgur.com/2sxXuHG.png)
![Add Data Produk.](https://i.imgur.com/0HSsH1O.png)
![Add Data Produk.](https://i.imgur.com/NNE648N.png)
Edit Form
![Edit Data Produk.](https://i.imgur.com/U6zJrAi.png)
Penghapusan data juga telah diberikan Alert / Konfirmasi pada soal "8. Untuk fitur hapus beri alert/konfirmasi(confirm) ketika di klik hapus"
![Edit Data Produk.](https://i.imgur.com/Vlom6Zt.png)

### About The Code
Kode Laravel telah menggunakan MVC<br>
Singkatnya
```
php artisan make:model Produk -a -r
```
Pada command tersebut akan membuat seluruh kebutuhan seperti file migration , controller , model , seeder , dan lainnya<br>
Langkah-langkah
- File Migration
![File Migration.](https://i.imgur.com/64pKrkw.png)
> [!NOTE]
> Fungsi utama adalah membangun tabel

- File Models
![File Models.](https://i.imgur.com/MlNUjOV.png)
![File Models.](https://i.imgur.com/woeXGHo.png)
![File Models.](https://i.imgur.com/GEBfFZc.png)
> [!NOTE]
> Berfungsi sebagai pemetaan kolom yang bisa diisi , dan object-relational mapper (ORM) / Membangun relasi antar tabel

- File Controller
![File Controller.](https://i.imgur.com/zuSMQLd.png)
![File Controller.](https://i.imgur.com/8iC93R1.png)
![File Controller.](https://i.imgur.com/AGAs3xL.png)
![File Controller.](https://i.imgur.com/cie0z32.png)
> [!NOTE]
> File Controller berfungsi sebagai jembatan antara model dan view (tampilan)

- File Request
![File Request.](https://i.imgur.com/UxynIVj.png)
> [!NOTE]
> Pada File Request baik store ataupun update , disini adalah tempat untuk melakukan Validasi Form (Bisa juga dituliskan di file Controller)

- File Views
![File Views.](https://i.imgur.com/ANIGpcA.png)
![File Views.](https://i.imgur.com/R3W9KoN.png)
![File Views.](https://i.imgur.com/inRUAWm.png)
> [!NOTE]
> Pada File Views adalah kode untuk tampilan
