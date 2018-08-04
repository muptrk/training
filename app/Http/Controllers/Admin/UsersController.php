<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\User as UserMod;
use App\Model\Shop as ShopMod;
use App\Model\Product as ProductMod;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mods = UserMod::paginate(15);
        return view('admin.user.lists', compact('mods'));
    

        /*$mods = UserMod::where('active', 1)
            ->where('city','bangkok')
            ->orderBy('name', 'desc')
            // ->take(10)
            ->get();*/

        // $mods = UserMod::find([11, 22, 33]);

        /*foreach ($mods as $item) {
            echo $item->name." ".$item->surname."<br>";
        }*/

        // return "Hello";

        // $count = UserMod::where('active', 1)->count();
        // echo "Count : ".$count;

        /*return view('test')
            ->with('name', 'My name')
            ->with('email', 'test@gmail.com');*/

        /*$data = [
            'name' => 'SONG',
            'surname' => 'MINO',
            'email' => 'myemail@gmail.com'
        ];*/

        /*$item = [
            'item1' => 'My Value1',
            'item2' => 'My Value2'
        ];

        $results = [
            'data' => $data,
            'item' => $item
        ];*/


        /*$user = UserMod::find(1);
        $mods = UserMod::all();
        return view('test', compact('data', 'user', 'mods'));*/

        //return view('test', compact('mods'));
        //return view('test', $results);
        // return view('test',$data);

        //return view('template');
        //return view('admin/layouts/template');

        //return view('admin.user.lists');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request); exit;
        $mod = new UserMod;
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   
        /*echo "<br>";
        $mod = UserMod::find($id);
        echo $mod->name." ".$mod->surname." => is owner Shop : ".$mod->shop->name;
        // echo "Show";
        // $shop = UserMod::find($id)->shop;
        echo "<br>";
        $shop = UserMod::find($id)->shop;
        echo $shop->name;*/

        /*$mod = ShopMod::find($id);
        echo $mod->name;
        
        echo "<br>";
        echo $mod->user->name;*/

        /*$products = ShopMod::find($id)->products;
        foreach ($products as $product) {
            echo $product->name;
            echo "<br>";
        }

        echo "<br>OR <br><br>";

        $shop = ShopMod::find($id);
        echo $shop->name;
        echo "<br>";

        foreach ($shop->products as $product) {
            echo $product->name;
            echo "<br>";
        }*/

        $product = ProductMod::find($id);
        echo "Product Name Is : ".$product->name;
        echo "<br><br>";
        echo "Shop Owner Is : ".$product->shop->name;

    }
    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $mod = UserMod::find($id);
        echo $mod->name;
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
        $mod = UserMod::find($id);
        $mod->name = $request->name;
        $mod->email = $request->email;
        $mod->password = bcrypt($request->password);
        $mod->save();
        echo "Success";
        // return "Update";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $mod = UserMod::find($id);
        $mod->delete();
        echo "Delete Success";
    }
    

}
