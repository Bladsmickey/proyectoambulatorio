<?php
class AuthController extends BaseController {
public function showLogin(){

	if(Auth::check()){
		return Redirect::to('/');
	}

	return View::make('/login');
}  }

?>