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
use App\Gallery;

class GalleryController extends Controller
{
    
    public function index (){
        $galleries=Gallery::paginate(20);
       $cats = Gallery::
           groupBy('category')
            ->get();
        return view('front.pages.gallery', compact('galleries','cats'));
    } 

     public function showGalleryList (){//for admin
        if (Auth::check()){
            $gallery=Gallery::paginate(10);
            return view('admin.pages.list-gallery-admin', compact('gallery'));
        }
        else
            return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

       /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-gallery');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate_image (Request $request){           
            $this->validate($request, [
            'title'    => 'required',
            'category'    => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        
                    /*process image*/
                        
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/gallery');
                            $img = Image::make($image->getRealPath());
                            $img->heighten(400, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);
                    /*/image*/
                        $gallery = new Gallery;
                        $gallery->title = Input::get('title');
                        $gallery->category = Input::get('category');
                        $gallery->iv = "Image";
                        $gallery->image = "assets/images/gallery/".$input['imagename'];
                        $gallery->save();
                     return Redirect::back()->with('success_message','New Image has been created.');
                
    }
        
    public function doCreate_video (Request $request){           
            $this->validate($request, [
            'title'    => 'required',
            'category'    => 'required',
           // 'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'url'=>'required',

        ]);

        
                    /*process image*/
                        
                       /* $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/gallery');
                            $img = Image::make($image->getRealPath());
                            $img->heighten(400, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);*/
                    /*/image*/
                        $gallery = new Gallery;
                        $gallery->title = Input::get('title');
                        $gallery->category = Input::get('category');
                        $gallery->iv = "Video";
                       // $gallery->image = "assets/images/gallery/".$input['imagename'];
                        
                        $gallery->url=Input::get('url');
                        $gallery->image = "https://img.youtube.com/vi/".$gallery->url."/1.jpg";

                        $gallery->save();
                     return redirect('admin/gallery/create')->with('success_message','New video has been added.');
                
    }
/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            //delete previous file
            $fp=Gallery::where('id',$id)->first();
            File::delete($fp->image);
            Gallery::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

}
