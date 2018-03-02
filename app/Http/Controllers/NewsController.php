<?php
namespace App\Http\Controllers;

use App\Models\News as ItemModel;

class NewsController extends Controller{

  public function index()
  {
    $data['news_data'] = ItemModel::with('i18n_first')->where('active',1)->orderBy('created_at', 'DESC')->get();
    return view('front/pages/news', $data);
  }

  public function newsDetails($slug){
    $data['news_details'] = ItemModel::with('i18n_first')->where('slug',$slug)->get();

    return view('front/pages/news_details', $data);
  }


}