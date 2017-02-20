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
use App\Scholar;

class ScholarController extends Controller{
     public function showScholarList (){//admin view
    	if (Auth::check()){ 
    		$scholars=Scholar::paginate(10);
    		return view('admin.pages.list-scholar-admin', compact('scholars'));
    	}
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 


    /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-scholar');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate (Request $request){           
            $this->validate($request, [
            'fullname'    => 'required',
            'designation'    => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        
                    /*process image*/
                        
                         $image = $request->file('image');
                         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/scholars');
                            $img = Image::make($image->getRealPath());
                            $img->heighten(120, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);
                    /*/image*/
                        $scholar = new Scholar;
                        $scholar->fullname = Input::get('fullname');
                        $scholar->designation = Input::get('designation');
                        $scholar->organization = Input::get('organization');
                        $scholar->image = "assets/images/scholars/".$input['imagename'];
                        $scholar->save();
                     return Redirect::back()->with('success_message','Record of new scholar has been added.');
                
    }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            //delete file
            $fp=Scholar::where('id',$id)->first();
            File::delete($fp->image);
            Scholar::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=Scholar::find($id);
                return view('admin.pages.edit-scholar',compact('row'));

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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $destinationPath = public_path('/assets/images/scholars');
                        $img = Image::make($image->getRealPath());
                        $img->heighten(120, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);
                        $path="assets/images/scholars/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=Scholar::where('id',$id)->first();
                        File::delete($fp->image);
                    /*/image*/
            }else{
                $image_name = scholar::where('id',$request->id)->first()->image;
                $path="";//as it contains full path
                }

                $scholar = new scholar;
                $scholar = array(
                 'fullname' => Input::get('fullname'),
                 'designation' => Input::get('designation'),
                 'organization' => Input::get('organization'),
                 'image' =>  $path.$image_name,

                );

                        scholar::where('id',$request->id)->update($scholar);
                        return Redirect::back()->with('success_message','Record of scholar added.');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/

}

