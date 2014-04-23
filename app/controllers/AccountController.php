<?php 

class AccountController extends BaseController {

	public function getSignIn() {
		return View::make('account.signin');
	}

	public function postSignIn() {
		$validator = Validator::make(Input::all(),
			array(
				'username' 	=> 'required',
				'password' 	=> 'required'				
			)

		);

		
		if($validator->fails()) {
			//redirect to sign in page
			return Redirect::route('account-sign-in')
					->withErrors($validator)
					->withInput();
		} else {
			// attemp user sign in
			
			$remember = (Input::has('remember')) ? true : false;

			$auth = Auth::attempt(array(
				'username' => Input::get('username'),
				'password' => Input::get('password'),
				'active' => 1
			), $remember);

			if($auth) {
				//redirect to intended page
				return Redirect::intended('/');
			} else {
				return Redirect::route('account-sign-in')
				->with('global', 'username/password wrong, or account not activated.');
			}
		}

		return Redirect::route('account-sign-in')
				->with('global', 'There was a problem signing you in.');

	}


	public function getSignOut() {
		Auth::user()->timestamps = false;
		Auth::logout();
		return Redirect::route('home');
	}


	public function getCreate() {
		return View::make('account.create');
	}

	public function postCreate() {
		$validator = Validator::make(Input::all(),
			array(
				'email' 			=> 'required|max:50|email|unique:users',
				'username' 			=> 'required|max:20|min:5|unique:users',
				'full_name' 		=> 'required|max:20|min:5|unique:users',
				'password' 			=> 'required|min:6',
				'password_again'	=> 'required|same:password'
			)

		);

		if($validator->fails()) {
			// die('Failed.');
			return Redirect::route('account-create')
					->withErrors($validator)
					->withInput();
		} else {
			// Create account
			$email = Input::get('email');
			$username = Input::get('username');
			$password = Input::get('password');
			$full_name = Input::get('full_name');

			// Activation code
			$code = str_random(60);

			$user = User::create(array(
				'email' => $email,
				'username' => $username,
				'full_name' => $full_name,
				'password' => Hash::make($password),
				'code' => $code,
				'active' => 0
			));

			if($user) {

				Mail::send('emails.auth.activate', array('link' => URL::route('account-activate', $code), 'username' => $username), function($message) use ($user) {
					$message->to($user->email, $user->username)->subject('Activate your LV account');
				});

				return Redirect::route('home')
						->with('global', 'Your account has been created! We have sent you activation email');
			}
		}
		// print_r(Input::all());
	}

	public function getActivate($code) {
		// return $code;
		$user = User::where('code','=', $code)->where('active', '=', 0);

		// echo '<pre>', print_r($user->first()), '</pre>';		

		if($user->count()) {
			$user = $user->first();

			// Update user to active state
			$user->active = 1;
			$user->code = '';

			if($user->save()) {
				return Redirect::route('home')
						->with('global', 'Activated! You can now sign in!');
			}
		}

		return Redirect::route('home')
				->with('global', 'We could not activate your account. Try again later.');
	}

	public function getChangePassword() {
		return View::make('account.password')
					->with('var', 'Hi '. Auth::user()->username .' ,change your password');
	}

	public function postChangePassword() {
		$validator = Validator::make(Input::all(), 
			array(
				'old_password' 		=> 'required|',
				'password'			=> 'required|min:6',
				'password_again' 	=> 'required|same:password'
			)
		);

		if($validator->fails()) {
			// redirect
			return Redirect::route('account-change-password')
					->withErrors($validator);
		} else {
			// change password
			$user = User::find(Auth::user()->id);

			$old_password 	= Input::get('old_password');
			$password 		= Input::get('password');

			if(Hash::check($old_password, $user->getAuthPassword())){
				
				$user->password = Hash::make($password);

				if($user->save()) {
					return Redirect::route('home')->with('global', 'Your password has been changed!');
				}

			} else {
				return Redirect::route('account-change-password')->with('global', 'Your old password is incorrect!');
			}

		}

		return Redirect::route('account-change-password')
				->with('global', 'Your password could not be chaned');

	}

	public function getForgotPassword() {
		return View::make('account.forgot');
	}

	public function postForgotPassword() {
		$validator = Validator::make(Input::all(), 
			array(
				'email' => 'required|email'
			)
		);

		if($validator->fails()) {
			return Redirect::route('account-forgot-password')
					->withErrors($validator)
					->withInput();
		} else {

			$user = User::where('email', '=', Input::get('email'));

			if($user->count()) {
				$user = $user->first();

				$code = str_random(60);
				$password = str_random(10);

				$user->code = $code;
				$user->password_temp = Hash::make($password);

				if($user->save()) {
					Mail::send('emails.auth.forgot', 
						array('link' => URL::route('account-recover', $code),
							  'username' => $user->username,
							  'password' => $password
							  ), function($message) use ($user) {
							$message->to($user->email, $user->username)
									->subject('Your new password');
						});

				// 	Mail::send('emails.auth.forgot', array('link' => URL::route('account-recover', $code), 'username' => $username, 'password' => $user->$password), function($message) use ($user) {
				// 	$message->to($user->email, $user->username)->subject('Your new password');
				// });

					return Redirect::route('home')
							->with('global', 'We have send you a new password by email.');
				}
			}

		}

		return Redirect::route('account-forgot-password')
				->with('global','Could not request new password.');
	}

	public function getRecover($code) {
		$user = User::where('code', '=', $code)
						->where('password_temp', '!=', '');

		if($user->count()) {
			$user = $user->first();

			$user->password = $user->password_temp;
			$user->password_temp = '';
			$user->code = '';

			if($user->save()) {
				return Redirect::route('home')->with('global', 'Your account has been recover and you can sign in with your new password.');
			}
		}

		return Redirect::route('home')->with('global', 'Could not recore your account.');
	}

}
