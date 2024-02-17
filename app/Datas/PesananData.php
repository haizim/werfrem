<?php
namespace App\Datas;

use Carbon\Carbon;

class PesananData extends DataBase
{
    function setData()
    {
        $this->data = [
            "data" => [
                [
                    "id" => "123456",
                    "waktu" => date_id("2024-02-15 12:13:14"),
                    "produk" => "<ul><li>Madu Rasa 100ml</li>
                    <li>Telon Anggrek 100ml</li></ul>",
                    "total_harga" => 85000,
                    "action" => "<a href='/pesanan/1' class='btn btn-sm btn-secondary'>Detail</a>",
                ],
                [
                    "id" => "234567",
                    "waktu" => date_id("2024-02-16 13:14:15"),
                    "produk" => "<ul><li>Telon Mawar 100ml</li></ul>",
                    "total_harga" => 100000,
                    "action" => "<a href='/pesanan/2' class='btn btn-sm btn-secondary'>Detail</a>",
                ],
                [
                    "id" => "234582",
                    "waktu" => date_id("2024-02-16 14:13:14"),
                    "produk" => "<ul><li>Madu Rasa 100ml</li>
                    <li>Madu Rasa 150ml</li>
                    <li>Telon Melati 100ml</li></ul>",
                    "total_harga" => 130000,
                    "action" => "<a href='/pesanan/3' class='btn btn-sm btn-secondary'>Detail</a>",
                ],
            ],
            'detail_pesanan' => [
                [
                    [
                        'produk' => 'Madu Rasa 100ml',
                        'SKU' => 'MDR100ml',
                        'harga' => 35000,
                        'qty' => 1,
                        'subtotal' => 35000,
                    ],
                    [
                        'produk' => 'Telon Anggrek 100ml',
                        'SKU' => 'TAG100ml',
                        'harga' => 50000,
                        'qty' => 1,
                        'subtotal' => 50000,
                    ],
                ],
                [
                    [
                        'produk' => 'Telon Mawar 100ml',
                        'SKU' => 'TMW100ml',
                        'harga' => 50000,
                        'qty' => 2,
                        'subtotal' => 100000,
                    ],
                ],
                [
                    [
                        'produk' => 'Madu Rasa 100ml',
                        'SKU' => 'MDR100ml',
                        'harga' => 35000,
                        'qty' => 1,
                        'subtotal' => 35000,
                    ],
                    [
                        'produk' => 'Madu Rasa 150ml',
                        'SKU' => 'MDR150ml',
                        'harga' => 45000,
                        'qty' => 1,
                        'subtotal' => 45000,
                    ],
                    [
                        'produk' => 'Telon Melati 100ml',
                        'SKU' => 'TML100ml',
                        'harga' => 50000,
                        'qty' => 1,
                        'subtotal' => 50000,
                    ],
                ]
            ],
            'form' => [
                "produk" => "<select name='produk[0]' id='produk-0' class='form-select'><option>Pilih Produk</option></select>", 
                "sku" => "[autofill SKU barang]", 
                "qty" => "<input type='text' name='qty[1]' id='qty-1' class='form-control' placeholder='text'>",
                "harga" => "[autofill harga barang]", 
                "subtotal" => "[autofill subtotal]", 
            ]
        ];
    }
}
