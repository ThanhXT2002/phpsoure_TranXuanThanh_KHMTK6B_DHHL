<?php

namespace App\Http\Controllers;
use App\Models\ProductModel;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function getProducts(){
        $products = ProductModel::orderBy('id', 'desc')->get();
        return view('admin.product.getProducts',
        ['products'=>$products]
    );}

    function getProductsbyBand(Request $request ){
        $band = $request->input('selectBand');
        $products = ProductModel::where('band', $band)->get();
        return view('admin.product.getProductsByBand', ['products'=>$products]);
    }
    function getProductsbyYear(Request $request ){
        $band = $request->input('selectYear');
        $products = ProductModel::where('year', $band)->get();
        return view('admin.product.getProductsByYear', ['products'=>$products]);
    }

    function forminsertProduct(){
        return view('admin.product.insertProduct');
    }

    function insertProduct(Request $request){
        $product = new ProductModel;
        $product->pid = $request->pid;
        $product->pname = $request->pname;
        $product->company = $request->company;
        $product->band = $request->selectBand;
        $product->year = $request->selectYear;

        if (isset($_FILES['img']) && $_FILES['img']['error'] === UPLOAD_ERR_OK) {
            $pimage = 'data:image/png; base64,'
            . base64_encode(file_get_contents($_FILES['img']['tmp_name']));
            $product->pimage = $pimage;
        }

        $product->save();
        return redirect('admin/product/getProduct')->with('Note',"Thêm thành công!");

    }

    function deleteProduct($pid){
        $product = ProductModel::where('pid', $pid)->first();
        $product->delete();
        return redirect('admin/product/getProduct')->with('Note','Xóa thành công');
    }

}
