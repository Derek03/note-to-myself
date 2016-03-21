<?php

class UsersController extends \BaseController
{

	protected $user;

	public function __construct(User $user)
	{
		$this->user = $user;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		return View::make("users/index",['users'=>$this->user->all()]);
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('users.create');
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		$this->user->fill($input);

		$this->user->emailaddress = Input::get('emailaddress');
		$this->user->password = Hash::make(Input::get('password'));

		if(!($this->user->isValid()))
		{
			return Redirect::back()->withInput()->withErrors($this->user->messages);
		}

		$this->user->save();

		return Redirect::route('index');
	}


	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		return View::make('users.show',
			['u'=>$this->user->whereId($id)->first()]);
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
	public function destroy($id)
	{
		//
	}

	public function upload()
	{
		//$imgs = new CreateImagesTable();
		//notes
		$notes = Input::get('notes');
		$tbd = Input::get('tbd');
		$email = Auth::user()->emailaddress;
		//images
		if($image = Input::file('i')) {
			$destinationPath = public_path() . '/upload';
			$filename = $image->getClientOriginalName();
			Input::file('i')->move($destinationPath, $filename);
		}
		//if($link = Input::get('websites[]'){
		//}
		$filenotes = fopen('public/notes/'. $email . "-notes.txt","w");
		$filetbd = fopen('public/tbd/'. $email . "-tbd.txt", "w");
		fwrite($filenotes,$notes);
		fwrite($filetbd,$tbd);
		fclose($filenotes);
		fclose($filetbd);
		return Redirect::route('session.index')->with('email', $email);
	}
}
