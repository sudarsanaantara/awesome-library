# 🧩 Project Akhir Native Fullstack Development – Tecart SE

## 👥 Anggota Kelompok
| Nama                                  | NIM        | Peran              |
| ------------------------------------- | ---------- | ------------------ |
| Wayan Eka Putra Suradnyana            | 2505551008 | Frontend Developer |
| I Gusti Ngurah Agung Sudarsana Antara | 2505551010 | Backend Developer |

## 💡 Deskripsi Project
Website sistem peminjaman buku pada perpustakaan digital ini dirancang sebagai platform modern yang mempermudah pengguna dalam mengakses, mencari, dan meminjam koleksi buku secara online. Dengan tampilan antarmuka yang sederhana namun fungsional, pengguna dapat melakukan proses peminjaman tanpa harus datang langsung ke perpustakaan. Sistem ini juga dilengkapi fitur manajemen akun, pencarian buku, riwayat peminjaman, serta panel admin untuk mengelola koleksi dan aktivitas peminjaman. Kehadiran sistem ini menjadi solusi yang efektif dalam meningkatkan efisiensi, akurasi pencatatan, serta kemudahan akses layanan perpustakaan kapan pun dan di mana pun.

Tujuan dikembangkannya website ini adalah untuk mendukung proses digitalisasi layanan perpustakaan sehingga pengguna dapat mengakses layanan peminjaman dengan lebih cepat, mudah, dan terorganisir. Selain itu, sistem ini bertujuan mengurangi penggunaan data manual yang rentan terhadap kesalahan, mempercepat proses pelayanan, serta menyediakan metode peminjaman yang lebih fleksibel dan terstruktur bagi pengguna maupun administrator.

Manfaat dari penggunaan website perpustakaan digital ini antara lain meningkatkan kenyamanan pengguna dalam memperoleh informasi dan meminjam buku secara online tanpa batasan waktu dan tempat. Administrasi perpustakaan juga menjadi lebih efektif karena data peminjaman dan pengembalian tercatat otomatis dan dapat dipantau secara real-time. Selain itu, sistem ini membantu meningkatkan minat membaca melalui akses yang lebih mudah terhadap sumber pengetahuan digital. Secara keseluruhan, website ini mendukung transformasi layanan perpustakaan agar lebih modern, praktis, dan relevan dengan kebutuhan pengguna di era teknologi saat ini.

## ⚙️ Teknologi yang Digunakan
- Backend: Native PHP
- Frontend: HTML5, CSS3, JavaScript
- Database: MySQL

## 🚀 Cara Menjalankan Project
Hanya pernah ditest menggunakan Laravel sehingga tutorial ini akan berfokus pada laravel
1. Clone repository:
   ```bash
   git clone https://github.com/sudarsanaantara/awesome-library.git
   ```
2. Pindahkan folder hasil clone ke dalam folder ke www (folder pada Laravel).
3. **Import database** dari /docs/db_awesome.sql.
4. Setting **config file** pada ***/src/app/core/Config.php*** (yang paling diutamakan adalah variabel global BASEURL, pastikan tidak mengakhiri url dengan '/')
5. Jalankan di browser: http://localhost/awesome-library/

## 📊 Dokumentasi Tambahan
- [Flow Aplikasi](./FLOW_APP.md)
- [Panduan Pengguna](./USER_GUIDE.md)
