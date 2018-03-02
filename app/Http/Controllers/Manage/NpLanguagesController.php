<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use App\Models\Languages;
use App\Models\LanguageFields;
use Illuminate\Http\Request;

class NpLanguagesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return View('translations.show-languages');
    }

    public function fetchAll(Request $request)
    {
        $Languages = Languages::select('*');

        $response = new NpTranslationsController;

        if ($request->input('search')) {
            $Languages->where('lang', 'like', '%' . $request->input('search') . '%')
            ->orWhere('lang_full', 'like', '%' . $request->input('search') . '%');
        }

        $Languages->where('active', 1);
        $response->all_langs = $Languages->get();

        $response->list_langs = Languages::where('active', '!=', 1)->get();

        return json_encode($response);
    }

    public function fetchAllActive(Request $request)
    {
        $Languages = Languages::select('*');

        $Languages->orderBy('default_lang', 'desc')->where('active', 1)->where('status', 1);
        $response = $Languages->get();

        return json_encode($response);
    }

    public function changeDefault(Request $request) {
        Languages::where('default_lang', 1)->update(['default_lang' => 0]);

        Languages::where('id', $request->input('0'))->update(['default_lang' => 1, 'status' => 1]);

        return json_encode(array('status' => true, 'msg' => trans('backend.Updated!')));
    }

    public function changeStatus(Request $request) {
        $lang = Languages::where('id', $request->input('id'))->first();

        if ($lang->default_lang != 1) {
            Languages::where('id', $request->input('id'))->update(['status' => $request->input('status')]);
            return json_encode(array('status' => true, 'msg' => trans('backend.Updated!')));
        }
        
         return json_encode(array('status' => false, 'msg' => trans('backend.Error!')));
    }

    public function deleteLang(Request $request) {
        $lang = Languages::where('id', $request->input('0'))->first();
        if ($lang->default_lang != 1) {
            Languages::where('id', $request->input('0'))->update(['active' => 0]);
            LanguageFields::where('lang', $lang->lang)->delete();
            return json_encode(array('status' => true, 'msg' => trans('backend.Removed!')));
        }
        
        return json_encode(array('status' => false, 'msg' => trans('backend.Error!')));
    }

    public function addLang(Request $request) {
        Languages::where('id', $request->input('0'))->update(['active' => 1]);
        return json_encode(array('status' => true, 'msg' => trans('backend.Inserted!')));
    }

}
