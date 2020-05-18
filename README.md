# EAS - Final Project Pemrograman Integratif 

Nama: Desya Ananda Puspita Dewi 

NRP: 05311840000046

## Aplikasi Donasi Untuk Covid-19

Aplikasi Donasi untuk Covid-19 ini dibuat untuk memudahkan pendataan serta penyaluran donasi untuk para korban Covid-19.
Aplikasi ini dibuat berupa web html php dengan menggunakan database mysql dan berbasis MVC dan twig template. 
Dalam web ini, terdapat 2 buah fitur utama yaitu `Tambah Donasi` dan `List Donasi`

## Tampilan Aplikasi

- Seperti yang bisa dilihat dalam `homebase` awal, terdapat 2 buah fitur yaitu `Tambah Donasi` dan `List Donasi`

![capture](https://github.com/desyaapd/EAS_P.Integratif_05311840000046/blob/master/img/public.PNG)

- Saat kita mengeklik fitur `Tambah Donasi`, ia akan mengarah ke dalam `/public/donasi/index`. Dalam laman ini, pendonasi akan mengisi data diri serta banyaknya donasi yang akan diberikan. Terdapat juga fitur tambah untuk menambah jumlah donasi apabila mendonasikan lebih dari satu jenis barang.

![capture](https://github.com/desyaapd/EAS_P.Integratif_05311840000046/blob/master/img/tambahdonasi.PNG)

- Apabila telah selesai mengisi data dari donasi, maka akan muncul pemberitahuan bahwa data berhasil terinput seperti berikut

![capture](https://github.com/desyaapd/EAS_P.Integratif_05311840000046/blob/master/img/berhasil.PNG)

- Untuk melihat rekapan data dari donasi yang telah ada, maka kita dapat melihat di `List Donasi` yang akan mengarah ke laman `public/jenis`

![capture](https://github.com/desyaapd/EAS_P.Integratif_05311840000046/blob/master/img/data.PNG)

Dalam laman ini, kita dapat melihat siapa saja yang telah mendonasikan serta banyaknya donasi yang telah diberikan

- Untuk melihat atau mencari barang yang telah didonasi berdasarkan nama barang saja, kita dapat melakukan `getFilter` menggunakan search bar di pojok kanan atas dari tabel

![capture](https://github.com/desyaapd/EAS_P.Integratif_05311840000046/blob/master/img/data_filter.PNG)

setelah itu dia akan menampilkan siapa saja yang telah mendonasikan barang yang akan dicari tersebut
