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
        $image = Input::file('i');

        $destinationPath = public_path().'/upload';
        $filename = $image->getClientOriginalName();

        Input::file('i')->move($destinationPath, $filename);
        return Redirect::route('/session');
    }

}