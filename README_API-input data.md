# cara menggunakan API

callpoint: api/{tabel aset}\
tipe manggilnya post\
body isinya nama_atribut:isi_atribut

tabel aset ada 4 yaitu:
- asetTanah
- asetBangunan
- asetFurniturPeralatan
- asetKendaraan

nama atribut dapat dilihat pada "tabel atribut.txt" di root folder

contoh:\
callpoint: http://127.0.0.1:8000/api/asetBangunan \
tipe: post\
body:\
Nama_Bangunan:gedung test 12\
Alamat:jalan test no 12\
Jumlah_Lantai:2\
Foto:{gambarnya}\
Pendukung:{filenya(gambar juga)}

note:
- tabelnya ganti jadi harus migrate dulu. buat migrate jalanin dulu docker/sailnya terus pake command ini di wsl:
```
cd samset-salma-app
./vendor/bin/sail migrate:refresh --seed
```
- key buat upload gambar adalah "Foto" dan "Pendukung"
- gambar bisa langsung di akses di url yang ada di kolom foto/pendukung
- kalo gabisa dibuka coba jalanin ini di wsl:

jalanin docker/sail:
```
cd samset-salma-app
./vendor/bin/sail up
```
enable storage access:
```
cd samset-salma-app
./vendor/bin/sail artisan storage:link
```