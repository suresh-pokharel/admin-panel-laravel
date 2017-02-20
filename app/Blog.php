<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    

    public function getTitleAttribute($value){

    	$locale = app()->getLocale();
    	switch ($locale) {
    		case 'en':
    			return $value;
    			break;
    		case 'ne':
    			return $this->attributes['title_ne'];
    			break;
    	}
    }
}




