<?php

namespace App\Http\Controllers\Manage;

use App\Http\Controllers\Controller;
use Spatie\TranslationLoader\LanguageLine;
use App\Models\Languages;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Artisan;
use UpdateBatch;

class NpTranslationsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return View('translations.show-translations');
    }

    public function fetchAll(Request $request)
    {
        $response = new NpTranslationsController;
        $LanguageLine = LanguageLine::select('*');        
        $response->all_langs = Languages::orderBy('default_lang', 'desc')->where('active', 1)->get();

        $response->tr_groups = LanguageLine::getGroups();

        if ($request->input('lang_group')) {
            $LanguageLine->where('lang_group', $request->input('lang_group'));
        }

        if ($request->input('search')) {
            $LanguageLine->where('text', 'like', '%' . $request->input('search') . '%')
            ->orWhere('lang_key', 'like', '%' . $request->input('search') . '%');
        }

        $orderBy = 'id';
        $orderType = 'desc';

        if ($request->input('order_by') && $request->input('order_type')) {
            $orderBy = $request->input('order_by');
            $orderType = $request->input('order_type');
        }

        $LanguageLine->orderBy($orderBy, $orderType);
        $response->tr_all = $LanguageLine->paginate(10);

        return json_encode($response);
    }

    public function updateAll(Request $request)
    {
        if (UpdateBatch::updateBatch('language_lines', $request->all(), 'id')) {
            Artisan::call('cache:clear');
            return json_encode(array('status' => true, 'msg' => trans('backend.Updated!')));
        }
        return json_encode(array('status' => false, 'msg' => trans('backend.Error!')));
    }

    public function deleteTrans(Request $request) {
            LanguageLine::where('id', $request->input('0'))->delete();
            return json_encode(array('status' => true, 'msg' => trans('backend.Removed!')));
    }
}
