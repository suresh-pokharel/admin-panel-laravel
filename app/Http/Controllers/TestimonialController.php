<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Auth;
use Image;
use File;
use App\Http\Requests;
use App\Testimonial;

class TestimonialController extends Controller
{
    public function showTestimonialList (){//admin view
    	
    	if (Auth::check()){ 
    		$testimonials=Testimonial::paginate(10);
    		return view('admin.pages.list-testimonial-admin', compact('testimonials'));
    		}
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

        /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-testimonial');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate (Request $request){           
            $this->validate($request, [
            'fullname'    => 'required',
            'designation'    => 'required',
            'organization'    => 'required',
            'description'    => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        
                    /*process image*/  
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/people');
                        $img = Image::make($image->getRealPath());
                        $img->resize(160,160)->save($destinationPath.'/'.$input['imagename']);
                    /*/image*/
                        $testimonial = new testimonial;
                        $testimonial->fullname = Input::get('fullname');
                        $testimonial->designation = Input::get('designation');
                        $testimonial->organization = Input::get('organization');
                        $testimonial->description = Input::get('description');
                        $testimonial->image = "assets/images/people/".$input['imagename'];
                        $testimonial->save();
                     return Redirect::back()->with('success_message','Record of new testimonial has been added.');
                
  	  }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            $fp=Testimonial::where('id',$id)->first();
            File::delete($fp->image);
            Testimonial::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=Testimonial::find($id);
                return view('admin.pages.edit-testimonial',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
        if (Auth::check()){                     
            $this->validate($request, [
            'fullname'    => 'required',
            'designation'    => 'required',
            'organization'    => 'required',
            'description'    => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $destinationPath = public_path('/assets/images/people');
                        $img = Image::make($image->getRealPath());
                        $img->resize(160,160)->save($destinationPath.'/'.$input['imagename']);
                        $path="assets/images/people/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=Testimonial::where('id',$id)->first();
                        File::delete($fp->image);
                    /*/image*/
            }else{
                $image_name = Testimonial::where('id',$request->id)->first()->image;
                $path="";//as it contains full path
                }

    $testimonial = new testimonial;
    $testimonial = array(
     'fullname' =>   Input::get('fullname'),
     'designation' => Input::get('designation'),
     'organization' => Input::get('organization'),
     'description' => Input::get('description'),
     'image' =>  $path.$image_name,

);
                        // $testimonial->fullname = Input::get('fullname');
                        // $testimonial->designation = Input::get('designation');
                        // $testimonial->organization = Input::get('organization');
                        // $testimonial->description = Input::get('description');
                        // $testimonial->image = "assets/images/people/".$input['imagename'];
                        Testimonial::where('id',$request->id)->update($testimonial);
                     return Redirect::back()->with('success_message','Testimonial updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/

}
