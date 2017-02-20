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
use App\Board;

class BoardController extends Controller
{
     public function show(){
        $boards=Board::orderby('value','dsc')->paginate(10);
        return view('front.pages.board-members', compact('boards'));
    } 


    public function show_filter($skey){
        $boards=Board::where('fullname', 'like', $skey.'%')->paginate(10);
        return view('front.pages.board-members', compact('boards'));
    } 


    public function showBoardList (){//admin view
    	if (Auth::check()){
    		$boards=Board::orderby('value','asc')->get();
    		return view('admin.pages.list-board-admin', compact('boards'));
    	}
	    else
	    	return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 

    /*show create form*/
    public function showCreate (){
        if (Auth::check()){ 
                return view('admin.pages.create-board');
            } 
        else
        return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }
    /*create new urgent notice */
    public function doCreate (Request $request){           
            $this->validate($request, [
            'fullname'    => 'required',
            'designation'    => 'required',
            'value'    => 'required|integer|between:1,100',
            'address'    => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

        ]);

        
                    /*process image*/
                        
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $destinationPath = public_path('/assets/images/board');
                        $img = Image::make($image->getRealPath());
                        $img->fit(360,311)->save($destinationPath.'/'.$input['imagename']);
                    /*/image*/
                        $board = new board;
                        $board->fullname = Input::get('fullname');
                        $board->designation = Input::get('designation');
                        $board->address = Input::get('address');
                        $board->bio = Input::get('bio');
                        $board->value = Input::get('value');
                        $board->phone = Input::get('phone');
                        $board->image = "assets/images/board/".$input['imagename'];
                        $board->save();
                     return Redirect::back()->with('success_message','Record of new board member has been added.');
                
  	  }

/*delete*/
    public function delete($id){
        if (Auth::check()){ 
            //delete previous file
           $fp=Board::where('id',$id)->first();
            File::delete($fp->image);
            Board::where('id',$id)->delete();
            return Redirect::back()->with('success_message','Successfully Deleted.');
        }
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
/*/delete*/

/*show edit form*/
    public function showEdit($id){
        if (Auth::check()){ 
                $row=Board::find($id);
                return view('admin.pages.edit-board',compact('row'));

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
            'value'    => 'required|integer|between:1,100',
            'address'    => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

          
             if(Input::hasfile('image')) { //if new image is not added
                /*process image*/
                        $image = $request->file('image');
                        $input['imagename'] = time().'.'.$image->getClientOriginalExtension();
                        $image_name=$input['imagename'];
                        $destinationPath = public_path('/assets/images/board');
                        $img = Image::make($image->getRealPath());
                        $img->fit(360,311)->save($destinationPath.'/'.$input['imagename']);
                        $path="assets/images/board/";//we only have name of image, so attach path
                        //delete previous file
                        $fp=Board::where('id',$id)->first();
                        File::delete($fp->image);
                    /*/image*/
            }else{
                $image_name = Board::where('id',$request->id)->first()->image;
                $path="";//as it contains full path
                }

                $Board = new Board;
                $Board = array(
                 'fullname' => Input::get('fullname'),
                 'designation' => Input::get('designation'),
                 'address' => Input::get('address'),
                 'bio' => Input::get('bio'),
                 'value' => Input::get('value'),
                 'phone' => Input::get('phone'),
                 'image' =>  $path.$image_name,
                );

                Board::where('id',$request->id)->update($Board);
                return Redirect::back()->with('success_message','Board member\'s record updated successfully');
                } 
        else return redirect('admin/login')->with('flash_msg', 'You have to login first');
    }


/*/edit*/

}



	    