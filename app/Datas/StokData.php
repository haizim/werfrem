<?php
namespace App\Datas;

class StokData extends DataBase
{
    function setData()
    {
        $this->data = [
            "data" => [
                [
                    "nama" => "Madu Rasa 100ml", 
                    "merk" => "Madoe", 
                    "SKU" => "MDR100ml", 
                    "jumlah" => "35",
                    "waktu_pembaruan" => date_id("2024-02-16 13:14:15"),
                    "_action" => "<a href='/stok/3' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/stok/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                    "action" => "<a href='/stok/3' class='btn btn-sm btn-secondary'>Detail</a>",
                ],
                [
                    "nama" => "Madu Rasa 150ml", 
                    "merk" => "Madoe", 
                    "SKU" => "MDR150ml", 
                    "jumlah" => "45",
                    "waktu_pembaruan" => date_id("2024-02-16 13:15:15"),
                    "_action" => "<a href='/stok/3' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/stok/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                    "action" => "<a href='/stok/3' class='btn btn-sm btn-secondary'>Detail</a>",
                ],
                [
                    "nama" => "Telon Anggrek 100ml", 
                    "merk" => "Teelon", 
                    "SKU" => "TAG100ml", 
                    "jumlah" => "50",
                    "waktu_pembaruan" => date_id("2024-02-16 13:16:15"),
                    "_action" => "<a href='/stok/1' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/stok/1/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                    "action" => "<a href='/stok/1' class='btn btn-sm btn-secondary'>Detail</a>"
                ],
                [
                    "nama" => "Telon Mawar 100ml", 
                    "merk" => "Teelon", 
                    "SKU" => "TMW100ml", 
                    "jumlah" => "50",
                    "waktu_pembaruan" => date_id("2024-02-16 13:17:15"),
                    "_action" => "<a href='/stok/2' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/stok/2/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                    "action" => "<a href='/stok/2' class='btn btn-sm btn-secondary'>Detail</a>"
                ],
                [
                    "nama" => "Telon Melati 100ml", 
                    "merk" => "Teelon", 
                    "SKU" => "TML100ml", 
                    "jumlah" => "50",
                    "waktu_pembaruan" => date_id("2024-02-16 13:18:15"),
                    "_action" => "<a href='/stok/3' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/stok/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                    "action" => "<a href='/stok/3' class='btn btn-sm btn-secondary'>Detail</a>"
                ],                
            ],
            'form' => [
                "nama" => "text readonly",
                "merk" => "text readonly",
                "sku" => "text readonly",
                "qty" => "text",
            ]
        ];
    }
}
