<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Session;

class News extends Model
{
   public function i18n()
   {
      return $this->morphMany('App\Models\LanguageFields', 'foreign');
   }

   public function i18n_first(){
      return $this->i18n()->where('lang', Session::get('locale'));
   }

   public function storeMultilang($i18n, $id, $Model) {
      if ($Model) {
         return LanguageFields::createAll($i18n, $id, $Model);
      }

      return LanguageFields::updateAll($i18n);
   }

   public function getMultilang($page, $i18n_fields, $Model) {
      return LanguageFields::getAll($page, $i18n_fields, $Model);
   }

   protected static function boot() 
   {
      parent::boot();

      static::deleting(function($items) {
         $destinationDir =  public_path().'/uploads/news/' . $items->id;
         $destinationPath =  glob($destinationDir . '/*');
         
         foreach($destinationPath as $file){ 
            if(is_file($file)) @unlink($file);
         }
         if(is_dir($destinationDir)) rmdir($destinationDir);

         foreach ($items->i18n()->get() as $i18n) {
            $i18n->delete();
         }

      });
   }
}
