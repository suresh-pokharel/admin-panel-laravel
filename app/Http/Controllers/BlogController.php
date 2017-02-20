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
use App\Blog;

class BlogController extends Controller
{
    
    public function index (){
    	$blogs=Blog::paginate(4);
    	return view('front.pages.list-blogs', compact('blogs'));
    } 

    /*for single blog*/
        public function single($id){
        $blog=Blog::where('id',$id)->first();
            if (!isset($blog)){
                abort(404);
            }
        $blog->views+=1;
        $blog->save();
        return view('front.pages.single-blog', compact('blog'));
    } 

     public function showBlogList (){//for admin
     	if (Auth::check()){
	    	$blogs=Blog::paginate(10);
	    	return view('admin.pages.list-blogs-admin', compact('blogs'));
	    }
	    else
	    	return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

       /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-blog');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate (Request $request){           
            $this->validate($request, [
            'title'    => 'required',
            'description'    => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        
                    /*process image*/
                        
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/blog');
                            $img = Image::make($image->getRealPath());
                            $img->heighten(800, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);
                            //save thumbail
                            $img->fit(550,291)->save($destinationPath.'/thumb_'.$input['imagename']);
                    /*/image*/
                        $blog = new blog;
                        $blog->title = Input::get('title');
                        $blog->description = Input::get('description');
                        $blog->highlight = Input::get('highlight');
                        $blog->tags = Input::get('tags');
                        $blog->image = "assets/images/blog/".$input['imagename'];
                        $blog->thumb="assets/images/blog/thumb_".$input['imagename'];
                        $blog->save();
                     return Redirect::back()->with('success_message','New blog has been created.');
                
    }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            //delete file
            $fp=Blog::where('id',$id)->first();
            File::delete($fp->image);
            File::delete($fp->thumb);
            Blog::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/


/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=blog::find($id);
                return view('admin.pages.edit-blog',compact('row'));

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
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $thumb_name="thumb_".$input['imagename'];
                        $destinationPath = public_path('/assets/images/blog');
                        $img = Image::make($image->getRealPath());
                        $img->heighten(800, function ($constraint) {
                                 $constraint->upsize();
                                    })->save($destinationPath.'/'.$input['imagename']);
                        $img->fit(550,291)->save($destinationPath.'/thumb_'.$input['imagename']);
                        $path="assets/images/blog/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=Blog::where('id',$id)->first();
                        File::delete($fp->image);
                        File::delete($fp->thumb);

                    /*/image*/
            }else{
                $image_name = Blog::where('id',$request->id)->first()->image;
                $thumb_name = Blog::where('id',$request->id)->first()->thumb;

                $path="";//as it contains full path
                }

                $blog = new Blog;
                $blog = array(
                 'title' => Input::get('title'),
                 'description' => Input::get('description'),
                 'highlight' => Input::get('highlight'),
                 'tags' => Input::get('tags'),
                 'image' =>  $path.$image_name,
                 'thumb'=>    $path.$thumb_name,
                );

                Blog::where('id',$request->id)->update($blog);
                return Redirect::back()->with('success_message','Blog updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*/edit*/

/*to activate/deactivate blog*/
            public function activateDeactivate($id){
                $row=Blog::find($id);
                if ($row->published=='1') {
                    $active=0;
                }
                else {
                    $active=1;
                }
                $blog = array(
                 'published' =>   $active,
                 );
            Blog::where('id',$row->id)->update($blog);
              return Redirect::back()->with('success_message','Status of post (ID- '.$row->id.') has been changed.');

            } 


}
