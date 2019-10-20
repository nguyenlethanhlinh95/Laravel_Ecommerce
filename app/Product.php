<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Mockery\Exception;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\DB;

class Product extends Model
{
    //
    protected $table = 'products';
    protected $primaryKey = 'id';
    protected $fillable = ['pro_name', 'pro_code', 'pro_price', 'spl_price', 'image', 'description', 'content'];


    private $products;

    public function getAll_Product()
    {
        return self::all();
    }

    public function getDetail_Product($id)
    {
        return self::getDetail_Product($id);
    }

    public  function  delete_Product($id)
    {
        return self::destroy($id);
    }

    public function insert_Product(Product $pro)
    {
        try{
            self::insert($pro);
            return true;
        }
        catch (Exception $ex)
        {
            return false;
        }

    }
}
