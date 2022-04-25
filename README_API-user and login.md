# cara menggunakan API

## login
callpoint: api/login\
tipe manggilnya post\
body isinya:\
name:{username}\
password:{password}

jika username dan password benar akan mereturn nilai level akses dan api_key, contoh:\
{\
    "level": 0,\
    "api_token": {string random 100 karakter}\
}

jika username/password salah akan me return -1 

contoh: (pakai data dummy dalem seeder)\
callpoint: api/login\ \
tipe: post\
body: \
name:admin\
password:admin\
return: 2

## table user
nama tabel: account\
cara akses sama seperti tabel aset lainnya.
atribut table dapat dilihat di tabel atribut.txt