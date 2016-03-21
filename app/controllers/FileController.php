<?php

/**
 * Created by PhpStorm.
 * User: rbs
 * Date: 2016-03-20
 * Time: 5:29 PM
 */
class FileController extends \BaseController {

    public function index()
    {
        return View::make('fileupload');
    }

    public function upload(){
        //save image file
        $image = Input::file('i');
        $imagePath = public_path().'/upload';
        $filename = $image->getClientOriginalName();
        Input::file('i')->move($imagePath, $filename);
        //save user URL's
        $url = Input::get('websites[]');
        $sitePath = public_path().'/sites';


    }

}