{{ component()->Table($table ?? []) }}
<button class='btn btn-secondary'><i class="fa-solid fa-plus"></i> Tambah Produk</button>
<hr>
<p>
    <b>Total : [auto fill total]</b>
</p>
<p>
    <a href='{{ $_SERVER["HTTP_REFERER"] ?? "./" }}' class='btn btn-secondary'><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <a href='{{ $_SERVER["HTTP_REFERER"] ?? "./" }}' class='btn btn-secondary'>Simpan</a>
</p>