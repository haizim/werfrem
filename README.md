# WERFREM
### Oleh : haizim
Sebuah framework sederhana yang saya buat untuk membantu saya membuat wireframe dari aplikasi yang akan saya buat.

## Install
```
composer install
```

## Menjalankan
```
cd public
php -S localhost:8000
```

## Perbedaaan dengan framework lain
Di sini terdapat 2 perbedaan utama dari beberapa framework PHP lainnya, yaitu :

### View
Pada saat pemanggilan view, akan langsung secara default menggabungkan dengan template. Sehingga pada file view tidak perlu untuk memanggilnya secara manunal.
### Model 
Di sini tidak menerapkan koneksi dengan database. Sebagai gantinya digunakanlah Collection dari Illuminate/Collection. Ini saya terpakan atas alasn kepraktisan. Yaitu dikarenakan saya tidak mau dipusingkan dengan manajemen database pada saat masih dalam tahap prototyping dan belum benar-benar memasuki tahap development.

## Bagian-bagian
Seperti halnya framework-framework PHP lainnya, kode utama untuk aplikasi berada pada direktori `App`. Di dalamnya terdapat beberapa direktori, yaitu:

### Component
Direktori ini berisi class-class yang berfungsi sebagai generator berbagai komponen. Di sini tedapat 2 class utama, yaitu :

- ComponentBase : Sebagai parent class untuk membuat class-class component lainnya
- Component : Sebagai listing dan memudahkan class-class component. Class ini dapat dipanggil melalui helper `component()`. Sehingga dapat dipanggil dari mana saja dengan mudah.

### Controller
Direktori ini berisi class-class controller yang akan dipanggil oleh router. Di sini terdapat 1 class utama, yaitu `Controller` yang berfungsi sebagai parent class bagi controller lainnya.

### Core
Direktori ini berisi class-class inti dari framework, yaitu:

- Router : Berfungsi untuk mengarahkan url dari user ke controller
- View : Berfungsi untuk mengambil tampilan dan menggabungkannya dengan template kemudian menampilkannya ke user.

### Datas
Direktori ini berisi class-class berisi data-data Collection yang digunakan sebagai pengganti koneksi ke database. Di sini terdapat 1 class utama yaitu, `DataBase` yang berfungsi sebagai parent class bagi class data lainnya.

### Helper
Direktori ini berisi helper yang berguna untuk membuat fungsi-fungsi yang dapat dipanggil dari mana saja sehingga dapat memudahkan pemanggilan fungsi yang sering digunakan.

### Router
Direktori ini berisi file list router yang mengarahkan url ke controller dan method yang dimaksud.

### Template
Direktori ini berisi kumpulan template yang diperlukan saat pemanggilan view. Untuk template default ialah `app.php`.

### View
Direktori ini berisi kumpulan file view yang berfungsi untuk memberikan tampilan pada halaman web. Di sinilah component dipanggil. Selain itu, untuk view ini juga sudah mendukung beberapa pemanggilan directive seperti pada laravel blade. Diantaranya : 

- `{{ $var }}` : menampilkan string pada variable $var
- `@if( condition ): ... @endif` : melakukan operasi if
- `@switch( $var ): case($cond): @endswitch` : melakukan operasi switch case
- `@for( condition ): ... @endfor` : melakukan operasi for
- `@foreach( condition ): ... @endforeach` : melakukan operasi foreach
- `@while( condition ): ... @endwhile` : melakukan operasi while

---
### Demikian sedikit pemaparan mengenai framework saya ini. Jika terdapat pertanyaan ataupun kritik dan saran dapat dilayangkan ke email wahihasyim@gmail.com ataupun ke sosmed IG/X : @haizim_