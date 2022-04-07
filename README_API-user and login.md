# cara menggunakan API

## login
callpoint: api/login\
tipe manggilnya post\
body isinya:\
name:{username}\
password:{password}

jika username dan password benar akan mereturn nilai level akses eg. 0, 1, 2\
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