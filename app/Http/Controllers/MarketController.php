<?php

namespace App\Http\Controllers;


use App\Models\Market;
use Illuminate\Http\Request;

class MarketController extends Controller
{

    public function AddProduct(Request $request)
    {
        $data = new Market;
        $data->name = $request->input('name');
        $data->price  = $request->input('price');
        $data->description = $request->input('description');
        $data->path = $request->file('path')->store('images'); #name inside input('here') same word must write in raect js when use formData() and append('here')


        $data->save();
        return $data;
        // return 'data here';

    }


    public function list()
    {
        return Market::all();


        // U MUST DO THIS STEP TO CAN ACCESS DATA
        //    must change file-path to make browser understand the path and get it in react
        // for that ::
        // config-->filesystems.php ->change links from app/public to app/products
        // must be     "links" =>   public_path('products') => storage_path('app/products'),
        // php artisan storage:link
    }

    // delete depending on id of products
    public function delete($id)
    {
        // return 'delete id : '.$id;
        $deleteProduct = Market::where('id', $id)->delete();
        if ($deleteProduct) {
            return ["result" => 'products has been deleted '];
        } else {
            return ["result" => 'Operation failed '];
        }
    }
    // get single  product u can do this by use react router dom useParams

    public function getProduct($id)
    {
        // return $id;
        return Market::find($id);
    }


     function search($key)
    {
        return Market::where('name','like',"%$key%")->get();
    }
}
