<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Support\Facades\DB;

use Storage;
use App\Categories;
use App\Attributes;
use App\Vendors;
use App\Collections;
use App\Orders;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;


    public function uploadImage($path, $file) {
        $ext                = $file->guessClientExtension();  

        $fullname           = $file->getClientOriginalName(); 
        $hashname           = date('H.i.s').'-'.md5($fullname).'.'.$ext; 

        $store = Storage::disk('uploads')->put($path, $file);
        
        if($store){
            $uploaded_image = explode('/', $store);
            return $uploaded_image[2];
        }
        else{
            return false;
        }
    }

}

