<?= component()->Form($form)->setAction($action ?? 'store')->setMethod('post') ?>

<p>
<a href='{{ $_SERVER["HTTP_REFERER"] ?? "./" }}' class='btn btn-secondary'><i class="fa-solid fa-arrow-left"></i> Kembali</a>
    <button class="btn btn-secondary" onclick="$('#form').submit()">Simpan</button>
</p>