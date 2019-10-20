<?php

namespace App\Http\Controllers;
//namespace DAO;

use App\Product;
use Illuminate\Http\Request;
use Mockery\Exception;
use Illuminate\Support\Facades\Session;


class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public $product;
    public function __construct()
    {
        $this->product = new Product();
    }

    public function index()
    {
        $listAll = Product::paginate(5);
        return view('admin.products.index', ['products'=>$listAll]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try
        {
            $formInput = $request->except('image');

            $this->validate($request, [
                'pro_name' => 'required',
                'pro_code' => 'required',
                'pro_price' => 'required',
                'image'=>'image|mimes:png,jpg,jpeg|max:10000'
            ]);

            $image = $request->image;
            if($image){
                $datetime = date('mdYhis', time());
                $imageName=$image->getClientOriginalName();

                $Hinh = $datetime. "_" . $imageName;
                while(file_exists('images' . $Hinh)){
                    $Hinh = $datetime. "_" . $imageName;
                }

                $image->move('images',$Hinh);
                $formInput['image']=$Hinh;
            }

            Product::create($formInput);

            Session::flash('suc', 'You succesfully created a product.');
            return redirect()->back();
        }
        catch (Exception $ex)
        {

        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
