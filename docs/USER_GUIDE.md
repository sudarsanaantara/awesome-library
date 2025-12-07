# 📖 Panduan Pengguna

## Login atau Registrasi pada Website
![Gambar Login](/assets/tampilan_login.png)
1. Jika sudah memiliki akun tipe user/admin, pengguna dapat langsung masuk melalui username dan password akun tersebut.
2. Jika username dan password ditemukan, maka pengguna akan diarahkan sesuai role yang dimiliki.
3. Jika belum memiliki akun silakan buat akun terlebih dahulu
--

![Gambar Registrasi](/assets/tampilan_register.png)
1. Membuat akun cukup dengan menekan tombol daftar di menu login.
2. Lalu setelah akun berhasil dibuat silakan login dengan akun tersebut.



## User
### Dashboard User
![Dashboard User](/assets/tampilan_user.png)
1. Setelah login dan terdeteksi bahwa akun yang digunakan adalah akun user, pengguna akan diarahkan ke dashboard user.
2. Dalam dashboard ini terdapat beberapa konten seperti rekomendasi buku, pencarian buku, serta menu yang mengarah ke history peminjaman user

### Halaman Buku
![Tampilan Buku](/assets/tampilan_halaman_pinjam.png)
1. Setelah memilih buku yang akan dibaca user akan diarahkan ke halaman buku.
2. Pada halaman buku ini terdapat beberapa informasi mengenai buku.
3. Jika anda tertarik untuk membaca bukunya, anda dapat menekan tombol Pinjam.

![Tampilan Mode Baca Buku](/assets/tampilan_halaman_baca.png)
4. Setelah menekan tombol pinjam, tombol akan berubah menjadi baca dan anda sudah dapat membaca bukunya.
5. Saat ini aplikasi ini belum cukup fleksibel dalam waktu tempo waktu peminjaman bukuya. Buku hanya dapat dipinjam 1 hari.

### Halaman Riwayat Peminjaman
![Riwayat Peminjaman](/assets/history_peminjaman.png)
Dalam alaman riwayat peminjaman buku terlihat beberapa informasi seperti judul buku, tanggal pinjam, tanggal jatuh tempo, status peminjaman, dan tombol menuju buku.

## Admin

### Dashboard Admin
![Dashboard Admin](/assets/tampilan_admin.png)
1. Setelah terdeteksi bahwa pengguna login dengan akun admin, pengguna akan diarahkan ke halaman dashboard admin.
2. Tampilan awal halaman ini menampilan jumlah user aktif (tanpa admin), total buku, dan total peminjaman aktif.
3. Selain itu, pada sidebar terdapat fitur seperti Koleksi Buku untuk manejemen buku dan pengguna untuk memperhatikan pengguna.

### Halaman Koleksi Buku
![Koleksi Buku](/assets/koleksi_buku_setelah_ditambahkan.png)
Halaman ini menampilan koleksi buku yang dimiliki aplikasi, selain itu terdapat menu seperti menambahkan buku baru dan menghapus buku yang tersedia

### Halaman Tambah Buku
![Tambah Buku](/assets/success_menambahkan_buku.png)
Pada halaman buku terdapat beberapa kelengkapan data yang harus dipenuhi. Jika sudah mengisi semua keperluan maka buku dapat dibuat. Akan ada pesan tanda keberhasilan penambahan buku.

### Halaman Pengguna (Daftar Pengguna
![Halaman Pengguna](/assets/daftar_pengguna.png)
Pada halaman ini terdapat daftar pengguna diantaranya pengguna yang berstatus sebagai admin dan sebagai user. Untuk versi aplikasi saat ini, aplikasi hanya mendukung penghapusan anggota non-admin. Untuk penambahan admin juga harus dilakukan pada sql langsung dan belum ada fitur tersedia dalam aplikasi.

<-- [Kembali](./README.md)