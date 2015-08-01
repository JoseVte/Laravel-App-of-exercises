<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Input;
use Redirect;
use Auth;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
	protected $rules = [
		'email' => ['required','email'],
		'password' => ['required','alphaNum','min:3']
	];
	public function showLogin(){
		return view('auth.login');
	}

	public function doLogin(Request $request) {
		$this->validate($request,$this->rules);
		$userdata = array(
			'email' => Input::get('email'),
			'password' => Input::get('password')
		);

		if (Auth::attempt($userdata)) {
			return Redirect::route('exercises.index')->with('message', 'Logged correctly');
		} else {
			return Redirect::route('login')->withInput(Input::except('password'));
		}
	}

	public function doLogout(){
		Auth::logout();
		return Redirect::route('home');
	}
}
