<?php
namespace App\Datas;

class AuthData extends DataBase
{
    function setData()
    {
        $this->data = [
            "login" => [
                "email" => "text", 
                "password" => "password",
            ]
        ];
    }
}
