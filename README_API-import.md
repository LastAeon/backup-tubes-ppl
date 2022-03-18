# cara menggunakan API

callpoint: api/importAset\
tipe manggilnya post\
body isinya file:{filenya}

file berbentuk excel(.xls atau .xlsx)\
akan ada 4 sheet yang di proses\
tidak menggunakan header\
contoh file dapat dilihat pada "contoh data aset untuk import.xlsx" di root folder

contoh:\
callpoint: http://127.0.0.1:8000/api/importAset \
tipe: post\
body: file:{filenya}

note:
install laravel excel dulu, caranya:
- uncomment extension=gd di php.ini
- jalanin di terminal 
>composer require maatwebsite/excel --with-all-dependencies