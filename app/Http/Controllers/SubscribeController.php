<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Image;
use File;
use Auth;
use App\Http\Requests;
use App\Subscribe;

class SubscribeController extends Controller
{
   
   public function doSubscribe(){
   	                // validate the info, create rules for the inputs
                $rules = array(
                    'email'    => 'email|required|unique:subscribes,email',  
                );

                //error messages
                $messages = [
                    'required' => 'The :attribute field is required.',
                    'unique'=>'This email is already in our list. Thank you !',
                ];
                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules,$messages);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                    return Redirect::back()
                        ->withErrors($validator) // send back all errors to the login form
                        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
                } else {
                        $subscribe = new Subscribe;
                        $subscribe->email = Input::get('email');
                        $subscribe->group = "Undefined";
                        $subscribe->type = "Subscribed";
                        $subscribe->save();
                        return Redirect::back()->with('success_message','Success! Thank you for subscribing us.');
                } 
   } 
}
