<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Exports\BladeExport;
use App\User as UserMod; 


class DemoController extends Controller
{
    public function index()
    {
        //return "Method GET: Index";
        //return view('template');
        return "Method POST: demoone";
    }

    public function demotwo()
    {
        return "Method POST: demotwo";
    }
    
    public function demothree()
    {
        return "Method GET, POST : demothree";
    }

    public function demofour()
    {
        return "Method GET, POST, PUT/PATCH, DELETE : demofour";
    }

    public function testlinenoti()
    {
        $line_noti_token = "sogFZTB5aN3fIvp8JuykF19IbnxLU6hfI8Uxwo2QASq";
        
        $message = array(
          'message' => "Hello World",//required message
          'stickerPackageId'=> 2,
          'stickerId'=> 34
        );
        
        notify_message($message,$line_noti_token);
        
        return 'ok';
    }

    public function testexcel(){
        //ไป query database ทั้งหมดออกมา แล้วออกเป็น file excel
        $user = UserMod::all();
        
        return \Excel::download(new BladeExport($user->toArray()), 'invoices.xlsx');
    }


}


