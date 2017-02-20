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
use App\Program;

class ProgramController extends Controller
{
    
    public function index (){
    	$programs=Program::Paginate(4);
    	return view('front.pages.list-programs', compact('programs'));
    } 

    /*for single program*/
        public function single($id){
        $program=Program::where('id',$id)->first();
            if (!isset($program)){
                abort(404);
            }
        $program->views+=1;
        $program->save();
        return view('front.pages.single-program', compact('program'));
    } 

     public function showProgramList (){//for admin
     	if (Auth::check()){
	    	$programs=Program::paginate(10);
	    	return view('admin.pages.list-programs-admin', compact('programs'));
	    }
	    else
	    	return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

       /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-program');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


    public function doCreate (Request $request){           
            $this->validate($request, [
            'title'    => 'required',
            'description'    => 'required',
            'value'    => 'required|integer|between:1,100',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        		if(Input::hasfile('image')) {
                    /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/program');
                            $img = Image::make($image->getRealPath());
                            $img->heighten(800, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);
                            //save thumbail
                            $img->fit(550,291)->save($destinationPath.'/thumb_'.$input['imagename']);
                  
                }
                else{
                	$input['imagename']='empty';
                }  /*/image*/
                        $program = new Program;
                        $program->title = Input::get('title');
                        $program->description = Input::get('description');
                        $program->value = Input::get('value');
                        $program->image = "assets/images/program/".$input['imagename'];
                        $program->thumb="assets/images/program/thumb_".$input['imagename'];
                        $program->save();
                     return Redirect::back()->with('success_message','New program has been created.');
                
    }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            //delete file
            $fp=Program::where('id',$id)->first();
            File::delete($fp->image);
            File::delete($fp->thumb);
            Program::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/


/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=Program::find($id);
                return view('admin.pages.edit-program',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
        if (Auth::check()){                     
            $this->validate($request, [
             'title'    => 'required',
            'description'    => 'required',
            'value'    => 'required|integer|between:1,100',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $thumb_name="thumb_".$input['imagename'];
                        $destinationPath = public_path('/assets/images/program');
                        $img = Image::make($image->getRealPath());
                        $img->heighten(800, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);
                        $img->fit(550,291)->save($destinationPath.'/thumb_'.$input['imagename']);
                        $path="assets/images/program/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=Program::where('id',$id)->first();
                        File::delete($fp->image);
                        File::delete($fp->thumb);

                    /*/image*/
            }else{
                $image_name = Program::where('id',$request->id)->first()->image;
                $thumb_name = Program::where('id',$request->id)->first()->thumb;

                $path="";//as it contains full path
                }

                $program = new Program;
                $program = array(
                 'title' => Input::get('title'),
                 'description' => Input::get('description'),
                 'highlight' => Input::get('highlight'),
                 'tags' => Input::get('tags'),
                 'image' =>  $path.$image_name,
                 'thumb'=>    $path.$thumb_name,
                );

                Program::where('id',$request->id)->update($program);
                return Redirect::back()->with('success_message','program updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*/edit*/

/*to activate/deactivate program*/
            public function activateDeactivate($id){
                $row=Program::find($id);
                if ($row->published=='1') {
                    $active=0;
                }
                else {
                    $active=1;
                }
                $program = array(
                 'published' =>   $active,
                 );
            Program::where('id',$row->id)->update($program);
              return Redirect::back()->with('success_message','Status of Program (ID- '.$row->id.') has been changed.');

            } 


}
