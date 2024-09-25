<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    protected function file_upload($file,$folder){
        $product_file=$file;
        $file_extension=$product_file->getClientOriginalExtension();
        $file_image_name=rand().time().'.'.$file_extension;
        $product_file->move($folder,$file_image_name);
        return $file_image_name;
    }

    protected function file_update($file,$folder,$old_file){
            if($old_file !=null){
                file_exists($folder.$old_file) ? unlink($folder.$old_file):false;
            }
            $product_file=$file;
            $file_extension=$product_file->getClientOriginalExtension();
            $file_image_name=rand().time().'.'.$file_extension;
            $product_file->move($folder,$file_image_name);
            return $file_image_name;
    }

    protected function file_remove($folder,$old_file){
        file_exists($folder.$old_file) ? unlink($folder.$old_file):false;
    }
}
