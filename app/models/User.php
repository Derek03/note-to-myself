<?php

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Auth\Reminders\RemindableTrait;
use Illuminate\Auth\Reminders\RemindableInterface;

class User extends Eloquent implements UserInterface, RemindableInterface {

	public $timestamps = true;

	protected $fillable = ['emailaddress', 'password'];

	use UserTrait, RemindableTrait;

	protected $table = 'users';

	public $messages;

	protected $hidden = array('password', 'remember_token');

	public static $rules = [
		'emailaddress'=>'required|email',
		'password'=>'required|min:6|max:80'
	];

	public function isValid()
	{
		$v = Validator::make($this->attributes, static::$rules);

		if($v->passes())
		{
			return true;
		}

		$this->messages = $v->messages();
		return false;
	}

}
