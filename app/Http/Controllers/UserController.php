<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class UserController extends Controller
{
	public function showLogin (){
		//if already logged in
		if (Auth::check()){
			return Redirect::to('/admin/dashboard');
		}
		else
		return view('admin.login');
	} 
    public function doLogin(){

    	// validate the info, create rules for the inputs
		$rules = array(
		    'email'    => 'required|email', // make sure the email is an actual email
		    'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('admin/login')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {

		    // create our user data for the authentication
		    $userdata = array(
		        'email'     => Input::get('email'),
		        'password'  => Input::get('password')
		    );

		    // attempt to do the login
		    if (Auth::attempt($userdata)) {

		        // validation successful!
		        // redirect them to the secure section or whatever
		        // return Redirect::to('secure');
		        // for now we'll just echo success (even though echoing in a controller is bad)
		        //check if verified
		        $user = Auth::getLastAttempted();
		        if ($user->verified==1) {
		        	return Redirect::to('/admin/dashboard');
		 		}
		 		else{
		 				Auth::logout(); 
		 			 return Redirect::to('admin/login')->with('invalid_login_msg','Your account is on the way for approval. You will receive an email when it is done.')->withInput(Input::except('password'));;

		 		}

		    } else {        

		        // validation not successful, send back to form 
		        return Redirect::to('admin/login')->with('invalid_login_msg','Invalid login information, try again')->withInput(Input::except('password'));;

		    }

		}
    }




    public function doLogout(){
		    Auth::logout(); // log the user out of our application
		    return Redirect::to('admin/login'); // redirect the user to the login screen
		}


	public function showDashboard(){
		    return view('admin.pages.home'); // redirect the user to the dashboard
		}

/*for user registration*/
	public function doRegister(){
	    	
    	// validate the info, create rules for the inputs
		$rules = array(
			'fullname'    => 'required',
		    'email'    => 'required|email|unique:users,email', 
		    'password' => 'required|alphaNum|min:6' // password can only be alphanumeric and has to be greater than 3 characters
		);

		// run the validation rules on the inputs from the form
		$validator = Validator::make(Input::all(), $rules);

		// if the validator fails, redirect back to the form
		if ($validator->fails()) {
		    return Redirect::to('admin/register')
		        ->withErrors($validator) // send back all errors to the login form
		        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
		} else {
	    	//$user= Input::all();
               $user = new User;
               $user->fullname = Input::get('fullname');
               $user->email = Input::get('email');
               $user->password = Hash::make(Input::get('password'));
               $user->role = Input::get('role');
               $user->phone = Input::get('phone');
               $user->image = 'assets/images/admin/users/'.Input::get('image');
               $user->save();
			 return Redirect::back()->with('signup_success_message','Successfully Registered.');
	    } 

}

	    public function showRegister (){
		    return view('admin.pages.create-user'); 
	    	
	    } 

/*end user registration*/

/*show edit form*/
    public function showEdit(){
        if (Auth::check()){ 
                $row=Auth::user();
                return view('admin.pages.edit-user',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
	        if (Auth::check()){                     
            $this->validate($request, [
           'fullname'    => 'required',
            ]);

                $user = new User;
                $user = array(
                 'fullname' => Input::get('fullname'),
                 'phone' => Input::get('phone'),
                 'image' => 'assets/images/admin/users/'.Input::get('image'),
                );

                User::where('id',$id)->update($user);
                return Redirect::back()->with('success_message','Profile updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/
/*do edit*/
public function changePassword (Request $request){
	        if (Auth::check()){                     
            $this->validate($request, [
           'password_old'    => 'required',
           'password' => 'required|alphaNum|min:6|confirmed',
           'password_confirmation' => 'required|alphaNum|min:6',
            ]);
            	$id=Auth::user()->id;
                User::where('id',$id)->update(array('password' => $request->password));
                return Redirect::back()->with('success_message','Password updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }



public function showUnderApprovalList (){//under approve user list
     	if (Auth::check()){
	    	$unapproved_accounts=User::orderBy('verified','asc')->paginate(10);
	    	return view('admin.pages.list-under-approval-admin', compact('unapproved_accounts'));
	    }
	    else
	    	return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

/*to activate/deactivate blog*/
            public function approveUnapprove($id){
            	/*for logged in user*/
            		if (Auth::user()->id==$id) {
            			return Redirect::back()->with('success_message','You can not deactivate your account when you are logged in.');
            		}
            	/*end for logged in user*/

            	/*check if admin is master*/
            		if (Auth::user()->role!='Master') {
            			return Redirect::back()->with('success_message','You are not authorized to control over other admins.Please contact to the master admin.');
            		}
            	/*end check if*/

            	
                $row=User::find($id);
                if ($row->verified=='1') {
                    $active=0;
                }
                else {
                    $active=1;
                }
                $data = array(
                 'verified' =>   $active,
                 );
            User::where('id',$row->id)->update($data);
              return Redirect::back()->with('success_message','Status of Admin ( '.$row->fullname.') has been changed.');

            } 


}