# cara menggunakan API

callpoint: api/{tabel}/{primary key}\
tipe manggilnya delete\

tabel ada 5 yaitu:
- asetTanah
- asetBangunan
- asetFurniturPeralatan
- asetKendaraan
- account

primary key:
- 'Idx' untuk tabel aset
- 'name' untuk tabel user

nama atribut dapat dilihat pada "tabel atribut.txt" di root folder

contoh:\
callpoint: http://127.0.0.1:8000/api/asetBangunan/1 \
tipe: delete