<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Church;
use Auth;

class ChurchController extends Controller{

    public function show(){
    	$churches=Church::orderby('name','asc')->paginate(10);
    	return view('front.pages.associated-churches', compact('churches'));
    } 


    public function show_filter($skey){
    	$churches=Church::where('name', 'like', $skey.'%')->paginate(10);
    	return view('front.pages.associated-churches', compact('churches'));
    } 


    public function showChurchList (){//admin view
       if (Auth::check()){ 
            $churches=Church::orderby('name','asc')->paginate(10);
            return view('admin.pages.list-church-admin', compact('churches'));
        }
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

    /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-church');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate (){
        if (Auth::check()){                     
                // validate the info, create rules for the inputs
                $rules = array(
                    'name'    => 'required',
                    'address'    => 'required',
                    'registered_on'    => 'required',
                    'valid_till'    => 'required',
                    'address'    => 'required',
                    'pastors_name'    => 'required',
                    'email'    => 'email',
                    /*'referral_link' => 'required',*/   
                );

                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                    return Redirect::to('admin/churches/create')
                        ->withErrors($validator) // send back all errors to the login form
                        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
                } else {
                    
                       $church = new Church;
                       $church->name = Input::get('name');
                        $church->address = Input::get('address');
                        $church->phone = Input::get('phone');
                        $church->website = Input::get('website');
                        $church->email = Input::get('email');
                        $church->pastors_name = Input::get('pastors_name');
                        $church->pastors_phone = Input::get('pastors_phone');
                        $church->description = Input::get('description');
                        $church->registered_on = Input::get('registered_on');
                        $church->valid_till = Input::get('valid_till');
                       
                       
                       $church->save();
                     return Redirect::back()->with('success_message','New Church record has been added.');
                } 
         } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            Church::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=Church::find($id);
                return view('admin.pages.edit-church',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
        if (Auth::check()){                     
            $this->validate($request, [
                    'name'    => 'required',
                    'address'    => 'required',
                    'registered_on'    => 'required',
                    'valid_till'    => 'required',
                    'address'    => 'required',
                    'pastors_name'    => 'required',
                    'email'    => 'email',
            ]);

                $church = new church;
                $church = array(
                 'name' => Input::get('name'),
                 'address' => Input::get('address'),
                 'phone' => Input::get('phone'),
                 'website' => Input::get('website'),
                 'email' => Input::get('email'),
                 'pastors_name' => Input::get('pastors_name'),
                 'pastors_phone' => Input::get('pastors_phone'),
                 'description' => Input::get('description'),
                 'registered_on' => Input::get('registered_on'),
                 'valid_till' => Input::get('valid_till'),
                );

                church::where('id',$request->id)->update($church);
                return Redirect::back()->with('success_message','church\'s record updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/


    
}

            
        