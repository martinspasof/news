<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LanguageFields extends Model
{
   public function foreign()
   {
      return $this->morphTo();
   }

   public static function updateAll($i18n) {
      foreach ($i18n as $v) {
         foreach ($v as $uv) {
            $id = $uv['id'];

            $item = LanguageFields::find($id);
            $item->text = $uv['text'];

            if ($item->save()) {
               $response = true;
            } else {
               $response = false;
            }
         }
      }
      return $response;
   }

   public static function createAll($i18n, $id, $Model) {
      $default = '';

      foreach ($i18n as $k => $v) {
         foreach ($v as $uk => $uv) {
            if (!isset($uv['text']) || $uv['text'] == '') $uv['text'] = $default;

            $fields =  array(
                  'foreign_id' => $id,
                  'lang' => $uk,
                  'foreign_type' => "App\\Models\\" . $Model,
                  'field_type' => $k,
                  'text' => $uv['text']
                  );

            if (LanguageFields::insert($fields)) {
               $default = $uv['text'];
               $response = true;
            } else {
               $response = false;
            }
            unset($fields);
         }
      }
      return $response;
   }

   public static function getAll($item, $i18n_fields, $Model) {
      $search_again = false;

      $langs = Languages::where('active', 1)->get()->keyBy('lang');
      $temp = $item->i18n->groupBy('field_type');

      foreach ($temp as $k => $v) {
/*         if (!in_array($k, $i18n_fields)) {*/
/*            foreach ($langs as $uk => $uv) {
               LanguageFields::insert([
                  'foreign_id' => $item->id,
                  'lang' => $uk,
                  'foreign_type' => "App\\Models\\" . $Model,
                  'field_type' => 'description',
                  'text' => 'Test'
                  ]);
               $search_again = true;
            }*/
/*         }*/

         $temp[$k] = $v->keyBy('lang');

         foreach ($langs as $uk => $uv) {
            if (!isset($temp[$k][$uk])) {
               LanguageFields::insert([
                  'foreign_id' => $item->id,
                  'lang' => $uk,
                  'foreign_type' => "App\\Models\\" . $Model,
                  'field_type' => $k
                  ]);
               $search_again = true;
            }
         }
      }

      if ($search_again == true) {
         $item = $item->fresh();
         $temp = $item->i18n->groupBy('field_type');

         foreach ($temp as $k => $v) {
            $temp[$k] = $v->keyBy('lang');
         }
      }

      $item->lang_fields = $temp;

      return $item;
   }
}
