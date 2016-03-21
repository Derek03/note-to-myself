<?php

class SessionsController extends \BaseController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		if (Auth::check()) {
			$images = array();
			$images[0] = "";
			$images[1] = "";
			$images[2] = "";
			$images[3] = "";
			$array = array();
			$array[0] = Auth::user()->emailaddress;
			$array[1] = "";
			$array[2] = "";
			$array[3] = "";
 			if(file_exists('public/notes/'. $array[0] . "-notes.txt")) {
				$array[1] = file_get_contents('public/notes/'. $array[0] . "-notes.txt");
			}
			if(file_exists('public/tbd/'. $array[0] . "-tbd.txt")) {
				$array[2] = file_get_contents('public/tbd/'. $array[0] . "-tbd.txt");
			}
			$files = scandir('public/uploads/');
			$i = 0;
			foreach($files as $file){
				if($file == (glob($array[0] . "*.{jpg,png}"))){
					$images[$i] = $file;
				}
				$i++;
			}
			$array[3] = $images;
			return View::make('sessions.index')->with('array', $array);
		}else{
			return Redirect::route('/'); //form
		}

	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		if(Auth::check()) // opposite of Auth::guest()
		{
			return Redirect::to('/mainpage');
		}
		return View::make('sessions.create'); // form

	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// only pass the email address and the password; nothing else
		if(Auth::attempt(Input::only('emailaddress', 'password')))
			// or if(Auth::attempt(['email']=>Input::get('email')))
			// or if(Auth::attempt(Input::all()
		{
			// if everything matches, Laravel will create a session
			// and we can access it via Auth::user()
			$images = array();
			$images[0] = "";
			$images[1] = "";
			$images[2] = "";
			$images[3] = "";
			$array = array();
			$array[0] = Auth::user()->emailaddress;
			$array[1] = "";
			$array[2] = "";
			if(file_exists('public/notes/'. $array[0] . "-notes.txt")) {
				$array[1] = file_get_contents('public/notes/'. $array[0] . "-notes.txt");
			}
			if(file_exists('public/tbd/'. $array[0] . "-tbd.txt")) {
				$array[2] = file_get_contents('public/tbd/'. $array[0] . "-tbd.txt");
			}
			$files = scandir('public/uploads/');
			$i = 0;
			foreach($files as $file){
				if($file == (glob($array[0] . "*.{jpg,png}"))){
					$images[$i] = $file;
				}
				$i++;
			}
			$array[3] = $images;
			return View::make('sessions.index')->with('array', $array);
		}else{
			//return "Unsuccessful login attempt.";
			return Redirect::back()->withInput();
		}
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}


	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}


	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy()
	{
		return Redirect::route('index'); // form
	}


}
