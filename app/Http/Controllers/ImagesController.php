<?php

namespace App\Http\Controllers;

use Input;
use Validator;
use Response;

use App\Models\Images;
use Illuminate\Http\Request;

class ImagesController extends Controller
{
  public function upload($itemId, $item, $itemModel) {
     $itemId = (int)$itemId;
     if( $itemId == 0 )
       return Response::json('error', 400);
    $input = Input::all();
    $rules = array(
       'file' => 'image|max:5000',
       );
    $validation = Validator::make($input, $rules);
    if ($validation->fails())
    {
       return Response::make($validation->errors->first(), 400);
    }
    $path = $item . '/' . $itemId;
    foreach(Input::file('images') as $temporary_image) {
       $hashname = $this->uploadImage($path, $temporary_image);
       if( $hashname != false ) {
         $image = new Images(['filename' => $hashname]);
         $model = 'App\\Models\\' . $itemModel;
         $item = $model::find($itemId);
         $item->images()->save($image);
      }
      else {
         return Response::json('error', 400);
      }
   }
   return Response::json('success', 200);
}

public function delete_image($item, $itemId, $imageId){ 
  $imageId = (int)$imageId;
  if( $imageId == 0 )
    return Response::json('error', 400);
 $image = Images::find($imageId);
 $image_parts = pathinfo($image->filename);

 $destinationPath =  glob(public_path().'/uploads/' . $item. '/' . $itemId .  '/' .$image_parts['filename'] . '*');
 foreach($destinationPath as $file){ 
    if(is_file($file)) @unlink($file);
 }
 if($imageId > 0) {
    $image = Images::find($imageId);
    if( $image->delete() ) {
      return Response::json('success', 200);
   }
}
else 
 return Response::json('error', 400);
}

public function set_main_image($itemId, $imageId){ 
  $imageId = (int)$imageId;
  $itemId = (int)$itemId;
  if( $imageId == 0 || $itemId == 0 )
    return Response::json('error', 400);
 $updateAllImages = Images::where('imagable_id', $itemId)->update(['is_main' => 0]);
 $image = Images::find($imageId);
 $image->is_main = 1;
 if( $image->save() ) {
    return Response::json('success', 200);
 }
 else 
    return Response::json('error', 400);
}

public function update_image(Request $request){ 
  $id = (int) $request->input('id');

  $item = Images::find($id);
  $item->text = $request->input('text');

  if ($item->save()) {
    $response = array('status' => true, 'id' => $item->id, 'msg' => trans('backend.Success!'));
 } else {
    $response = array('status' => false, 'id' => $item->id, 'msg' => trans('backend.Error!'));
 }

 return $response;
}
}
