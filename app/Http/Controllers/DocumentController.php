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
use App\Document;

class documentController extends Controller{
    public function index(){
            $documents=Document::orderBy('title','asc')->paginate(20);
            return view('front.pages.documents', compact('documents'));
    } 

     public function showdocumentList (){//admin view
    	if (Auth::check()){ 
    		$documents=Document::paginate(10);
    		return view('admin.pages.list-document-admin', compact('documents'));
    	}
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 


    /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-document');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate (Request $request){           
            $this->validate($request, [
            'title'    => 'required',
            'description'    => 'required',
            //'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        
                    /*process image*/
                        
                         $image = $request->file('image');
                         $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/documents');
                          Input::file('image')->move($destinationPath, $input['imagename']);

                            // $img = Image::make($image->getRealPath());
                            // $img->heighten(120, function ($constraint) {
                            //      $constraint->upsize();
                            //         })->save($destinationPath.'/'.$input['imagename']);
                    /*/image*/
                        $document = new document;
                        $document->title = Input::get('title');
                        $document->description = Input::get('description');
                        $document->category = Input::get('category');
                        $document->image = "assets/documents/".$input['imagename'];
                        $document->file_type=$image->getClientOriginalExtension();
                        $document->save();
                     return Redirect::back()->with('success_message','New document has been added.');
                
    }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            //delete file
            $fp=document::where('id',$id)->first();
            File::delete($fp->image);
            document::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=document::find($id);
                return view('admin.pages.edit-document',compact('row'));

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
            
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $file_type=$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $destinationPath = public_path('/assets/documents');
                        Input::file('image')->move($destinationPath, $input['imagename']);
                        $path="assets/documents/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=document::where('id',$id)->first();
                        File::delete($fp->image);
                    /*/image*/
            }else{
                $image_name = document::where('id',$request->id)->first()->image;
                $path="";//as it contains full path
                $file_type= document::where('id',$request->id)->first()->file_type;
                }

                $document = new document;
                $document = array(
                 'title' => Input::get('title'),
                 'description' => Input::get('description'),
                 'category' => Input::get('category'),
                 'image' =>  $path.$image_name,
                 'file_type' =>  $file_type,

                );

                        document::where('id',$request->id)->update($document);
                        return Redirect::back()->with('success_message','Record of document added.');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/

}

