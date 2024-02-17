<?php
namespace App\Datas;

class UsersData extends DataBase
{
    function setData()
    {
        $this->data = [
            "data" => [
                [
                    "nama" => "Admin App", 
                    "email" => "admin_app@mail.com", 
                    "role" => "Admin Aplikasi", 
                    "status" => "Aktif", 
                    "terdaftar" => date_id("2024-02-12 10:11:12"),
                    "action" => "<a href='/users/1' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/users/1/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],
                [
                    "nama" => "Admin 1", 
                    "email" => "admin1@mail.com", 
                    "role" => "Admin", 
                    "status" => "Aktif", 
                    "terdaftar" => date_id("2024-02-12 10:11:12"),
                    "action" => "<a href='/users/2' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/users/2/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],
                [
                    "nama" => "Gudang 1", 
                    "email" => "gudang1@mail.com", 
                    "role" => "Gudang", 
                    "status" => "Aktif", 
                    "terdaftar" => date_id("2024-02-12 10:11:12"),
                    "action" => "<a href='/users/3' class='btn btn-sm btn-secondary'>Detail</a>
                    <a href='/users/3/edit' class='btn btn-sm btn-secondary'>Edit</a>",
                ],
            ],
            'form' => [
                "nama" => "text", 
                "email" => "text", 
                "role" => "select",
                "status" => "select",
            ]
        ];
    }
}
