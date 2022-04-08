# cara menggunakan API
## filter(interval)
callpoint: api/history/interval/{interval}\
tipe manggilnya get\
nilai interval yang mungkin:
- d -> hari ini
- w -> seminggu
- m -> sebulan
- y -> setahun
- a -> semua

contoh:\
callpoint: http://127.0.0.1:8000/api/history/interval/a \
tipe: get

## search(global_id)
callpoint: api/history/search/{global_id}\
tipe manggilnya get\
global_id merupakan kolom baru dari tabel aset yang terdiri dari kode tabel dan index eg. AB1, AFP10
kode tabel aset sebagai berikut:
- asetTanah                 -> AT
- asetBangunan              -> AB
- asetFurniturPeralatan     -> AFP
- asetKendaraan             -> AK

contoh:\
callpoint: http://127.0.0.1:8000/api/history/search/AB8 \
tipe: get