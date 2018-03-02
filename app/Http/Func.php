<?php

namespace App\Http;

class Func
{
   public static function saveBlobImage($pic, $item, $id)
   {
      $pic = base64_decode(preg_replace('#^data:image/\w+;base64,#i', '', $pic));
      $path = 'uploads/' . $item . '/' . $id;
      if (!file_exists($path)) {
         @mkdir($path, 0777, true);
      }

      $destinationPath =  glob($path . '/*');
      foreach($destinationPath as $file){ 
         if(is_file($file)) @unlink($file);
      }

      if (file_put_contents(public_path('uploads/' . $item . '/' . $id) ."/pic.png", $pic)) {
         return true;
      } else {
         return false;
      }
   }

}