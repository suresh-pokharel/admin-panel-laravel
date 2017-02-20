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
use App\Misc;

class MiscController extends Controller
{
    
   public function index($title){
        $data=Misc::where('title',$title)->first();
         if (!isset($data)){
                abort(404);
            }
        return view('front.pages.messages', compact('data'));
    } 

     public function showMiscList (){//for admin
     	if (Auth::check()){
	    	$miscs=misc::paginate(10);
	    	return view('admin.pages.list-miscs-admin', compact('miscs'));
	    }
	    else
	    	return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

       /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-misc');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate (Request $request){           
            $this->validate($request, [
            'title'    => 'required|unique:Miscs',
            'description'    => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

            if(Input::hasfile('image')) { //if new image is not added
                /*process image*/                     
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/misc');
                            $img = Image::make($image->getRealPath());
                            $img->resize(160,160)->save($destinationPath.'/'.$input['imagename']);
                        $image_name="assets/images/misc/".$input['imagename'];
                }
                else{
                    $image_name="";
                }
                    /*/image*/
                        $misc = new misc;
                        $misc->title = Input::get('title');
                        $misc->description = Input::get('description');
                        $misc->tags = Input::get('tags');
                        $misc->image = $image_name;
                        $misc->save();
                     return Redirect::back()->with('success_message','New misc has been created.');
                }
                
    

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            //delete file
            $fp=misc::where('id',$id)->first();
            File::delete($fp->image);
            misc::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/


/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=misc::find($id);
                return view('admin.pages.edit-misc',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
        if (Auth::check()){                     
            $this->validate($request, [
            'description'    => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $destinationPath = public_path('/assets/images/misc');
                        $img = Image::make($image->getRealPath());
                        $img->resize(160,160)->save($destinationPath.'/'.$input['imagename']);
                        $path="assets/images/misc/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=misc::where('id',$id)->first();
                        File::delete($fp->image);
                    /*/image*/
            }else{
                $image_name = misc::where('id',$request->id)->first()->image;
                $path="";//as it contains full path
                }

                $misc = new misc;
                $misc = array(
                 'description' => Input::get('description'),
                 'tags' => Input::get('tags'),
                 'image' =>  $path.$image_name,
                );

                misc::where('id',$request->id)->update($misc);
                return Redirect::back()->with('success_message','misc updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/


}
