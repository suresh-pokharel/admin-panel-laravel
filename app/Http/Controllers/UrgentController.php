<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Urgent;

class UrgentController extends Controller{
	/*see list of notices for admin*/
    public function showUrgentList (){
		if (Auth::check()){ 
				$urgents=Urgent::paginate(5);
		    	return view('admin.pages.list-urgent-admin', compact('urgents'));
		    } 
		else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
	}



	/*show create form*/
	public function showCreate (){
		if (Auth::check()){ 
				return view('admin.pages.create-urgent');
		    } 
		else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
	}

	/*create new urgent notice */
	public function doCreate (){
		if (Auth::check()){ 			    	
		    	// validate the info, create rules for the inputs
				$rules = array(
					'title'    => 'required',
				    /*'referral_link' => 'required',*/   
				);

				// run the validation rules on the inputs from the form
				$validator = Validator::make(Input::all(), $rules);

				// if the validator fails, redirect back to the form
				if ($validator->fails()) {
				    return Redirect::to('admin/urgents/create')
				        ->withErrors($validator) // send back all errors to the login form
				        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
				} else {
			    	
		               $urgent = new Urgent;
		               $urgent->title = Input::get('title');
		               $urgent->referral_link = Input::get('referral_link');
		               $urgent->save();
					 return Redirect::back()->with('success_message','Successfully Created.');
			    } 
		 } 
		else return redirect('admin/login')->with('flash_msg', 'You have to login first');
	}

/*delete*/
	public function delete($id){
		if (Auth::check()){ 
			Urgent::where('id',$id)->delete();
			return Redirect::back()->with('success_message','Successfully Deleted.');
		}
		else return redirect('admin/login')->with('flash_msg', 'You have to login first');
	} 
/*/delete*/


/*show edit form*/
	public function showEdit($id){
		if (Auth::check()){ 
				$row=Urgent::find($id);
				return view('admin.pages.edit-urgent',compact('row'));

		    } 
		else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
	}

/*do edit*/
public function doEdit (Request $request,$id){
		if (Auth::check()){ 			    	
		   	$this->validate($request, [
            'title'    => 'required',
            ]);
					  $urgent=new Urgent;
	              	  // $urgent = Urgent::where('id',$request->id)->first();
		              $urgent->title = Input::get('title');
		              $urgent->referral_link = Input::get('referral_link');
		              //$urgent->toArray();
		              //echo $urgent;exit;
		              Urgent::where('id',$request->id)->update(array('title' => $urgent->title,'referral_link' => $urgent->referral_link));   
					  return Redirect::back()->with('success_message','Successfully Updated.');
			    } 
		else return redirect('admin/login')->with('flash_msg', 'You have to login first');
	}


/*/edit*/
}


