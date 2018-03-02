<?php

namespace App\Http\Controllers\Manage;

use Input;
use Validator;
use Response;
use UpdateBatch;
use DB;
use Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Func;
use App\Models\News as ItemModel;

use App\Models\Languages;
use App\Models\Images;
use App\Models\LanguageFields;

class NpNewsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');

        $this->item = "news";
        $this->model = "News";
        $this->title = "News";
        $this->multilang_fields = ['title', 'description'];
        $this->search = '';

    }

    public function list(Request $request)
    {
        $ItemModel = ItemModel::with('i18n_first');

        $this->search  = $request->input('search');

        if ($this->search) {
            $ItemModel->whereHas('i18n_first', function ($q) {
                $q->where('text', 'like', '%'. $this->search .'%');
            });
        }
        
        if ($request->input('list_all')) {
            $list = $ItemModel->get();
        } else {
            $list = $ItemModel->paginate(10);
        }

        if($list) {
            header('Content-Type: application/json');
            return json_encode($list);
        }
        else {
            return FALSE;
        }
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = array();
        $data['itemTitle'] = $this->title;
        $data['controller'] = $this->item;
        $data['meta'] = $this->title;
        return view('manage/'.$this->item.'/index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $d_lang = Languages::where('default_lang', 1)->first();

        if ($request->input('id')) {
            $id = $request->input('id');
            $item = ItemModel::find($id);
            $Model = null;
        } else {
            $id = 0;
            $item = new ItemModel;
            $item->user_id = Auth::user()->id;
            $Model = $this->model;
        }

        $messages = [
        'required' => __('backend.This field is required.'),
        'unique_with' => __('backend.There is an element with the same value.')
        ];

        $request->validate([
            'lang_fields.title.' . $d_lang->lang . '.text' => 'required',
            'lang_fields.description.' . $d_lang->lang . '.text' => 'required',
            'pic' => 'required',
            'slug' => 'required|unique_with:'. $this->item .', slug, ' . $id,
            ], $messages);

        $i18n = $request->input('lang_fields');

        $item->active = $request->input('active');
        $item->slug = preg_replace("/[^A-Za-z0-9-_А-Яа-я]/","",$request->input('slug'));
        $pic = $request->input('pic');

        if($item->save()) {

            if (!Func::saveBlobImage($pic, $this->item, $item->id)) {
                $response = array('status' => false, 'msg' => trans('backend.Error in saveing image! Please choose another one.'));
            }

            if ($item->storeMultilang($i18n, $item->id, $Model)) {
                $response = array('status' => true, 'id' => $item->id, 'msg' => trans('backend.Success!'));
            } else {
                $response = array('status' => true, 'msg' => trans('backend.Error in one or all of the multilang fields!'));
            }
        } else {
            $response = array('status' => true, 'msg' => trans('backend.Error in saving non-multilang fields!'));
        }

        return json_encode($response);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
       $item = ItemModel::with('i18n')->find($request->input('id'));

       if (empty($item)) 
        return json_encode(['status' => false]);

        $path = 'uploads/' . $this->item . '/' . $item->id;

        if (file_exists($path)) {
            $file = $path . '/pic.png';
            $type = pathinfo($file, PATHINFO_EXTENSION);
            $data = file_get_contents($file);
            $item->pic = 'data:image/' . $type . ';base64,' . base64_encode($data);
        } else {
            $item->pic = '';
        }

        $result = $item->getMultilang($item, $this->multilang_fields, $this->model);

        $result->pic = $item->pic;

        return json_encode($result);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Services  $services
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
     $itemId = (int) $request->input(0);

     if($itemId > 0) {
        $item = ItemModel::find($itemId);
        if( $item->delete() ) {
            if ($item->i18n()) $item->i18n()->delete();
            
            $response = array('status' => true, 'id' => $item->id, 'msg' => trans('backend.Success!'));
        } else {
            $response = array('status' => true, 'msg' => trans('backend.Error in deleting this item!'));
        }
    } else {
        $response = array('status' => true, 'msg' => trans('backend.No item with that id was found!'));
    }

    return json_encode($response);
    }
}
