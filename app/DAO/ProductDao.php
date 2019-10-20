<?php
/**
 * Created by PhpStorm.
 * User: Computer of Linh
 * Date: 10/20/2019
 * Time: 3:44 PM
 */
namespace App\DAO;

use App\Product;

class ProductDao
{
    public function getAll()
    {
        return Product::paginate(5);
    }

    public function getDetail($id)
    {
        return Product::find($id);
    }

    public function deleteP($id)
    {
        $pro = $this->getDetail($id);
        if ($pro != null)
        {
            $pro->delete();
            return true;
        }
        return false;
    }
}