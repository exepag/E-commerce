<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller {

    public function getContent() {
        $content = session()->get('cart_content');
        return response()->json($content);
    }

    public function addContent(Request $request) {
        $id = $request->input('id');

        session()->push('cart_content',$id);
        return "Ok";
    }

    public function getDetail() {
        $content = session()->get('cart_content');

        $total = 0;
        $productSelected = [];
        if(count($content) > 0) {
            $qty = array_count_values($content);
            $productSelected = DB::select("select * from products where id in (".join(',',$content).")");

            foreach ($productSelected as $product) {
                $total += ($product->price * $qty[$product->id]);
            }
        }
        
        //dd($productSelected);

        $data = [
            'total' => $total,
            'productSelected' => $productSelected,
            'qty' => $qty
        ];
        return view('cart/detail',$data);
    }

}

?>