## Petunjuk

1. nyalakan XAMPP
2. `git clone https://github.com/tiannnn15/sppd` 
3. `composer install` pada folder git clone
4. copy .env.example menjadi .env
5. `php artisan key:generate`
6. buat database pada phpmyadmin
7. ubah variable DB_DATABASE pada .env menjadi database yang sudah dibuat
8. `php artisan migrate --seed`
9. tambah data pegawai dari file berikut [pegawai.sql](https://drive.google.com/file/d/1OvunqN9w86HbWGwtap547XTsY9oQK473/view?usp=sharing)
10. `php artisan serve`
11. sebelum login ubah role pada database di tabel users role_id 1 untuk sekretaris, 2 untuk kepala dinas, 3 untuk staff, 4 untuk bendahara
12. login dengan memasukkan email dan password
NOTE :    * password = 'password' (berlaku untuk semua role)
          * email pada tabel users dapat diubah sesuai kebutuhan
