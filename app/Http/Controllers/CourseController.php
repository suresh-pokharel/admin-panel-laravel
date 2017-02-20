<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Auth;
use App\Http\Requests;
use App\Course;

class CourseController extends Controller
{
     public function index (){
    	$courses=Course::paginate(10);
    	return view('pages.available-subjects', compact('courses'));
    } 

     public function show_filter($level){
    	$courses=Course::where('level',$level)->paginate(10);
    	return view('pages.available-subjects', compact('courses'));
    } 

     public function showCourseList (){//admin view
    	if (Auth::check()){
            $courses=Course::paginate(10);
    	    return view('admin.pages.list-course-admin', compact('courses'));
        }else
            return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 


    /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-course');
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
                    'level'    => 'required',
                    'college'    => 'required',
                    'seats'    => 'required',
                    /*'referral_link' => 'required',*/   
                );

                // run the validation rules on the inputs from the form
                $validator = Validator::make(Input::all(), $rules);

                // if the validator fails, redirect back to the form
                if ($validator->fails()) {
                    return Redirect::to('admin/courses/create')
                        ->withErrors($validator) // send back all errors to the login form
                        ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
                } else {
                    
                        $course = new Course;
                        $course->title = Input::get('title');
                        $course->level = Input::get('level');
                        $course->college = Input::get('college');
                        $course->college_address = Input::get('college_address');
                        $course->seats = Input::get('seats');
                        $course->description = Input::get('description');
                        $course->save();
                     return Redirect::back()->with('success_message','Record of new course has been added.');
                } 
         } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            Course::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=course::find($id);
                return view('admin.pages.edit-course',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
        if (Auth::check()){                     
            $this->validate($request, [
                   'title'    => 'required',
                    'level'    => 'required',
                    'college'    => 'required',
                    'seats'    => 'required',
            ]);

                $course = new Course;
                $course = array(
                 'title' => Input::get('title'),
                 'college_address' => Input::get('college_address'),
                 'level' => Input::get('level'),
                 'college' => Input::get('college'),
                 'seats' => Input::get('seats'),
                 'description' => Input::get('description'),
                );

                Course::where('id',$request->id)->update($course);
                return Redirect::back()->with('success_message','Course\'s record updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/


    

}

           