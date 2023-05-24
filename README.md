1. install folder yang ada di repository ini lalu unzip, 
2. pindahkan folder yang telah di unzip ke folder xampp/htdocs,
3. buat salinan file '.env.example' dan rename menjadi '.env',
4. konfigurasikan isi file env sesuai dengan konfigurasi yang ada di pc anda (settingan yang saya gunakan untuk connection: mongodb, host: 127.0.0.1, port: 27017),
5. setalah itu jalankan perintah 'php artisan migrate --seed' untuk membuat database serta data menambahkan beberapa data yang telah saya buat,
6. lalu jalankan perintah 'php artisan jwt:secret' setelah itu 'php artisan serve',
7. buka software postman lalu lakukan register dan login.


8. register => 
pilih post dan masukkan hostname 'localhost:8000/api/register', masuk ke bagian headers dan masukkan key 'Accept' dengan value 'application/json'. setelah itu masuk ke bagian body dan pilih x-www-form-urlencoded, setelah itu masukkan key key 'name', 'email', 'password' dengan value yang diinginkan namun untuk email hrs unik dan password harus lebih dari 5 karakter.

9. login =>
pilih post dan masukkan hostname 'localhost:8000/api/login', masuk ke bagian headers dan masukkan key 'Accept' dengan value 'application/json'. setelah itu masuk ke bagian body dan pilih x-www-form-urlencoded, setelah itu masukkan key key 'email', 'password' dengan value sesuai dengan yang telah dibuat di register.


10. akses data:
- membuka fungsi stok => pilih get dan masukkan hostname 'localhost:8000/api/kendaraan/stok', masuk ke bagian headers dan masukkan key 'Authorization' dengan value 'Bearer <token saat login>'.
- menjalankan fungsi penjualan motor => pilih get dan masukkan hostname 'localhost:8000/api/kendaraan/belimotor/(id motor)', masuk ke bagian headers dan masukkan key 'Authorization' dengan value 'Bearer <token saat login>'.
- menjalankan fungsi penjualan mobil => pilih get dan masukkan hostname 'localhost:8000/api/kendaraan/belimobil/(id mobil)', masuk ke bagian headers dan masukkan key 'Authorization' dengan value 'Bearer <token saat login>'.
- membuka laporan penjualan => pilih get dan masukkan hostname 'localhost:8000/api/kendaraan/penjualan', masuk ke bagian headers dan masukkan key 'Authorization' dengan value 'Bearer <token saat login>'.
