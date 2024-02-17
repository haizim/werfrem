<?php
namespace App\Datas;

class MasterProdukData extends DataBase
{
    function setData()
    {
        $this->data = [
            "data" => [
                [
                    "nama" => "Madu Rasa 100ml", 
                    "merk" => "Madoe", 
                    "sku" => "MDR100ml", 
                    "harga" => 35000,
                    "waktu_pembaruan" => date_id("2024-02-12 13:14:15"),
                    "action" => "<a href='/master-produk/3' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/master-produk/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],
                [
                    "nama" => "Madu Rasa 150ml", 
                    "merk" => "Madoe", 
                    "sku" => "MDR150ml", 
                    "harga" => 45000,
                    "waktu_pembaruan" => date_id("2024-02-12 13:15:15"),
                    "action" => "<a href='/master-produk/3' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/master-produk/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],
                [
                    "nama" => "Telon Anggrek 100ml", 
                    "merk" => "Teelon", 
                    "sku" => "TAG100ml", 
                    "harga" => 50000,
                    "waktu_pembaruan" => date_id("2024-02-12 13:16:15"),
                    "action" => "<a href='/master-produk/1' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/master-produk/1/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],
                [
                    "nama" => "Telon Mawar 100ml", 
                    "merk" => "Teelon", 
                    "sku" => "TMW100ml", 
                    "harga" => 50000,
                    "waktu_pembaruan" => date_id("2024-02-12 13:17:15"),
                    "action" => "<a href='/master-produk/2' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/master-produk/2/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],
                [
                    "nama" => "Telon Melati 100ml", 
                    "merk" => "Teelon", 
                    "sku" => "TML100ml", 
                    "harga" => 50000,
                    "waktu_pembaruan" => date_id("2024-02-12 13:18:15"),
                    "action" => "<a href='/master-produk/3' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/master-produk/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],                
            ],
            'form' => [
                "nama" => "text", 
                "merk" => "text", 
                "sku" => "text",
                "harga" => "text",
            ]
        ];
    }
}
