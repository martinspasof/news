<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ImageThumbnailer;

use Session;
use Mail;
use Input;
use Image;

use App\Models\Pages;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->search = '';
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {  
        $data['controller'] = 'index';

        return view('index', $data);
    }

    public function userProfileAvatar($id, $image)
    {
        return Image::make(storage_path().'/users/id/'.$id.'/uploads/images/avatar/'.$image)->response();
    }

    public function image($max=300, $thumb_link=null) {
        $link = urldecode(Input::get('link'));

        $linker = explode('.', $link);
        $thumb = $linker[0].'-'.$max.'._thumb.'.$linker[1];

        $img = new ImageThumbnailer; 
        $img->max_dimension = $max;

        if($max >= 900) {
            $img->compression_jpeg = 75;
            $img->compression_png = 3;
        }
        elseif($max < 900 && $max >= 400 ) {
            $img->compression_jpeg = 60;
            $img->compression_png = 4;
        }
        elseif($max < 400 && $max >= 100 ) {
            $img->compression_jpeg = 55;
            $img->compression_png = 5;
        }
        elseif($max < 100) {
            $img->compression_jpeg = 50;
            $img->compression_png = 6;
        }
        if(!file_exists($thumb)){
            $res = $img->draw($link, $thumb);
            $this->image($max, $thumb);
        }
        else
            $res =$img->draw($thumb);
        exit;
    }

    public function manage()
    {   
        $data['controller'] = 'home';

        return view('manage/home', $data);
    }

    public function error404() {
        $data['controller'] = 'home';
        die('error 404. not found.');
    }
}
