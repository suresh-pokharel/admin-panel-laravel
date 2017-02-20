<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Event;

class EventController extends Controller{

    public function showEventList (){//admin view
    	if (Auth::check()){
    		$events=Event::paginate(10);
    		return view('admin.pages.list-event-admin', compact('events'));
    	}else
            return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

     /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-event');
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
                    'address'    => 'required',
                    'date_event'    => 'required',
                    'description'    => 'required',   
                );

                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                    return Redirect::to('admin/events/create')
                        ->withErrors($validator) // send back all errors to the login form
                        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
                } else {
                    
                        $event = new Event;
                        $event->title = Input::get('title');
                        $event->date_event = Input::get('date_event');
                        $event->address = Input::get('address');
                        $event->description = Input::get('description');
                       $event->save();
                     return Redirect::back()->with('success_message','New event record has been added.');
                } 
         } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            Event::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=event::find($id);
                return view('admin.pages.edit-event',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
        if (Auth::check()){                     
            $this->validate($request, [
                    'title'    => 'required',
                    'address'    => 'required',
                    'date_event'    => 'required',
                    'description'    => 'required', 
            ]);

                $event = new Event;
                $event = array(
                 'title' => Input::get('title'),
                 'address' => Input::get('address'),
                 'date_event' => Input::get('date_event'),
                 'description' => Input::get('description'),
                );

                Event::where('id',$request->id)->update($event);
                return Redirect::back()->with('success_message','Event updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/



}



           