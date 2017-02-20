<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Http\Request;
use Image;
use File;
use Auth;
use App\Http\Requests;
use App\Slider;

class SliderController extends Controller{

    public function showSliderList (){
    	if (Auth::check()){ 
    		$sliders=Slider::paginate(10);
    		return view('admin.pages.list-slider-admin', compact('sliders'));
    	}
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


            /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-slider');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

    /*create new urgent notice */
    public function doCreate (Request $request){           
            $this->validate($request, [
            'desc_1'    => 'required',
            'desc_2'    => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

                    /*process image*/
                        
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $thumbnail="thumbnail_".$input['imagename'];

                        $destinationPath = public_path('/assets/images/sliders');
                            $img = Image::make($image->getRealPath());
                            $img->fit(860,460)->save($destinationPath.'/'.$input['imagename']);
                            $img->resize(null,160, function ($constraint) {
                                        $constraint->aspectRatio();
                                })->save($destinationPath.'/'.$thumbnail);
                    /*/image*/
                        $slider = new slider;
                        $slider->desc_1 = Input::get('desc_1');
                        $slider->desc_2 = Input::get('desc_2');
                        $slider->desc_3 = Input::get('desc_3');
                        $slider->refferal_link = Input::get('refferal_link');
                        $slider->image = "assets/images/sliders/".$input['imagename'];
                        $slider->thumbnail = "assets/images/sliders/".$thumbnail;
                        $slider->save();
                     return Redirect::back()->with('success_message','Record of new slider has been added.');
                
  	  }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            $fp=Slider::where('id',$id)->first();
            File::delete($fp->image);
            File::delete($fp->thumbnail);
            Slider::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=Slider::find($id);
                return view('admin.pages.edit-slider',compact('row'));

            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }

/*do edit*/
public function doEdit (Request $request,$id){
        if (Auth::check()){                     
            $this->validate($request, [
            'desc_1'    => 'required',
            'desc_2'    => 'required',
            'image'     => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $thumbnail="thumbnail_".$image_name;
                        $destinationPath = public_path('/assets/images/sliders');
                        $img = Image::make($image->getRealPath());
                        $img->fit(860,460)->save($destinationPath.'/'.$input['imagename']);
                        $img->resize(null,160, function ($constraint) {
                                        $constraint->aspectRatio();
                                })->save($destinationPath.'/'.$thumbnail);
                        $path="assets/images/sliders/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=Slider::where('id',$id)->first();
                        File::delete($fp->image);
                        File::delete($fp->thumbnail);
                    /*/image*/
            }else{
                $image_name = Slider::where('id',$request->id)->first()->image;
                $thumbnail = Slider::where('id',$request->id)->first()->thumbnail;
                $path="";//as it contains full path
                }

                $slider = new Slider;
                $slider = array(
                 'desc_1' =>   Input::get('desc_1'),
                 'desc_2' => Input::get('desc_2'),
                 'desc_3' => Input::get('desc_3'),
                 'image' =>  $path.$image_name,
                 'thumbnail' =>  $path.$thumbnail,
                 'refferal_link'=>Input::get('refferal_link'),

                );

                        Slider::where('id',$request->id)->update($slider);
                        return Redirect::back()->with('success_message','Record of new slider has been added.');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/

/*to activate/deactivate slider*/
            public function activateDeactivate($id){
                $row=Slider::find($id);
                if ($row->isActive=='1') {
                    $isActive=0;
                }
                else {
                    $isActive=1;
                }
                $slider = array(
                 'isActive' =>   $isActive,
                 );
            Slider::where('id',$row->id)->update($slider);
              return Redirect::back()->with('success_message','Status of Slider Changed.');

            } 
 
}
