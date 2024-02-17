<?= component()->Detail($detail) ?>
<?= component()->Table($table) ?>
<br>
<p>
    <a href='{{ $_SERVER["HTTP_REFERER"] ?? "./" }}' class='btn btn-secondary'><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <a href='../' class='btn btn-secondary'>Simpan</a>
</p>