<?php

namespace App\Http\Controllers;
use Auth;
use Illuminate\Http\Request;
use App\Menu;
use App\Http\Requests;

class MenuController extends Controller
{
    
     public function showMenu (){//for admin
     	if (Auth::check()){
	    	$menus=Menu::paginate(20);
	    	return view('admin.pages.menu', compact('menus'));
	    }
	    else
	    	return redirect('admin/login')->with('flash_msg', 'You have to login first');
    } 
}
