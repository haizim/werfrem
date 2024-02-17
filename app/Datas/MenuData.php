<?php
namespace App\Datas;

class MenuData extends DataBase
{
    function setData()
    {
        $admin = [
            'pesanan' => '/pesanan',
            'stok' => '/stok',
        ];
        $gudang = [
            'stok' => '/stok',
        ];
        
        $adminApp = [
            'master_produk' => '/master-produk',
            'users' => '/users',
        ];
        $adminApp = array_merge($admin, $adminApp);

        $this->data = [
            "admin" => $admin,
            "admin_aplikasi" => $adminApp,
            "gudang" => $gudang
        ];
    }
}
