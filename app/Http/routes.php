<?php

/*
|--------------------------------------------------------------------------
| Application Routes 
|--------------------------------------------------------------------------
|f
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

//app()->setLocale('ne');


// Route::get('laravel-version', function()
// {
// $laravel = app();
// echo "Your Laravel version is ".$laravel::VERSION;
// });

Route::group(['middleware' => ['web']], function () {
    Route::any( '(.*)','InfoController@organization_info');

    Route::get('/', function () {
    return view('front.pages.index');
    });

    Route::get('blogs', 'BlogController@index');
    Route::get('blog/{id}', array('uses'=>'BlogController@single'));

    Route::get('churches', 'ChurchController@show');
    Route::get('churches/{skey}','ChurchController@show_filter');

    Route::get('boards', 'BoardController@show');
    Route::get('boards/{skey}','BoardController@show_filter');

    Route::get('misc/{skey}','MiscController@index');

    Route::get('gallery', 'GalleryController@index');

    Route::get('/courses','CourseController@index');
    Route::get('/courses/{level}','CourseController@show_filter');


    Route::get('/message', function () {
        return view('front.pages.messages');
    });

    Route::get('/donate', function () {
        return view('pages.donate-us');
    });

    Route::get('program/{id}', array('uses'=>'ProgramController@single'));

    Route::get('/mission', function () {
        return view('pages.our-mission');
    });

    Route::get('/about', function () {
        return view('pages.about-us');
    });


    Route::get('contact', function () {
        return view('front.pages.contact-us');
    });

    Route::get('documents', 'DocumentController@index');

    Route::get('/events', function () {
        return view('front.pages.events');
    });

    Route::post('subscribe', array('uses'=>'SubscribeController@doSubscribe'));





//for admin panel

/*Login routes*/
Route::get('admin/login', 'UserController@showLogin');
Route::get('admin', 'UserController@showLogin');
Route::get('login', 'UserController@showLogin');
Route::post('admin/login', 'UserController@doLogin');
/*end login routes*/

/*logout route*/
Route::get('admin/logout', array('uses' => 'UserController@doLogout'));
/*end logout routes*/

/*View list routes*/
Route::get('admin/dashboard', array('uses' => 'BlogController@showBlogList'));//UserController@showDashboard
Route::get('admin/blogs', array('uses' => 'BlogController@showBlogList'));
Route::get('admin/programs', array('uses' => 'ProgramController@showProgramList'));
Route::get('admin/menu', array('uses' => 'MenuController@showMenu'));
Route::get('admin/gallery', array('uses' => 'GalleryController@showGalleryList'));
Route::get('admin/boards', array('uses' => 'BoardController@showBoardList'));
Route::get('admin/sliders', array('uses' => 'SliderController@showSliderList'));
Route::get('admin/churches', array('uses' => 'ChurchController@showChurchList'));
Route::get('admin/courses', array('uses' => 'CourseController@showCourseList'));
Route::get('admin/events', array('uses' => 'EventController@showEventList'));
Route::get('admin/scholars', array('uses' => 'ScholarController@showScholarList'));
Route::get('admin/documents', array('uses' => 'DocumentController@showDocumentList'));
Route::get('admin/miscs', array('uses' => 'MiscController@showMiscList'));

Route::get('admin/urgents', 'UrgentController@showUrgentList')->middleware('auth');
//$router->group(['middleware' => 'auth'], function() {
    // lots of routes that require auth middleware
Route::get('admin/testimonials', array('uses' => 'TestimonialController@showTestimonialList'));
//});

/*end view list routes*/

/*registration routes*/
Route::get('admin/register', array('uses'=>'UserController@showRegister'));
Route::post('admin/register', array('uses'=>'UserController@doRegister'));
/*end registration*/


/*create forms*/
Route::get('admin/urgents/create', array('uses'=>'UrgentController@showCreate'));
Route::post('admin/urgents/create', array('uses'=>'UrgentController@doCreate'));

Route::get('admin/churches/create', array('uses'=>'ChurchController@showCreate'));
Route::post('admin/churches/create', array('uses'=>'ChurchController@doCreate'));

Route::get('admin/courses/create', array('uses'=>'CourseController@showCreate'));
Route::post('admin/courses/create', array('uses'=>'CourseController@doCreate'));

Route::get('admin/scholars/create', array('uses'=>'ScholarController@showCreate'));
Route::post('admin/scholars/create', array('uses'=>'ScholarController@doCreate'));

Route::get('admin/documents/create', array('uses'=>'DocumentController@showCreate'));
Route::post('admin/documents/create', array('uses'=>'DocumentController@doCreate'));

Route::get('admin/testimonials/create', array('uses'=>'TestimonialController@showCreate'));
Route::post('admin/testimonials/create', array('uses'=>'TestimonialController@doCreate'));

Route::get('admin/sliders/create', array('uses'=>'SliderController@showCreate'));
Route::post('admin/sliders/create', array('uses'=>'SliderController@doCreate'));

Route::get('admin/boards/create', array('uses'=>'BoardController@showCreate'));
Route::post('admin/boards/create', array('uses'=>'BoardController@doCreate'));

Route::get('admin/events/create', array('uses'=>'EventController@showCreate'));
Route::post('admin/events/create', array('uses'=>'EventController@doCreate'));

Route::get('admin/blogs/create', array('uses'=>'BlogController@showCreate'));
Route::post('admin/blogs/create', array('uses'=>'BlogController@doCreate'));

Route::get('admin/programs/create', array('uses'=>'ProgramController@showCreate'));
Route::post('admin/programs/create', array('uses'=>'ProgramController@doCreate'));

Route::get('admin/miscs/create', array('uses'=>'MiscController@showCreate'));
Route::post('admin/miscs/create', array('uses'=>'MiscController@doCreate'));

Route::get('admin/gallery/create', array('uses'=>'GalleryController@showCreate'));
Route::post('admin/gallery/create-image', array('uses'=>'GalleryController@doCreate_image'));
Route::post('admin/gallery/create-video', array('uses'=>'GalleryController@doCreate_video'));

/*end create forms*/

/*delete routes*/
    Route::get('admin/urgents/delete/{id}', array('uses'=>'UrgentController@delete'));
    Route::get('admin/testimonials/delete/{id}', array('uses'=>'TestimonialController@delete'));
    Route::get('admin/sliders/delete/{id}', array('uses'=>'SliderController@delete'));
    Route::get('admin/scholars/delete/{id}', array('uses'=>'ScholarController@delete'));
    Route::get('admin/documents/delete/{id}', array('uses'=>'DocumentController@delete'));
    Route::get('admin/gallery/delete/{id}', array('uses'=>'GalleryController@delete'));
    Route::get('admin/events/delete/{id}', array('uses'=>'EventController@delete'));
    Route::get('admin/courses/delete/{id}', array('uses'=>'CourseController@delete'));
    Route::get('admin/churches/delete/{id}', array('uses'=>'ChurchController@delete'));
    Route::get('admin/boards/delete/{id}', array('uses'=>'BoardController@delete'));
    Route::get('admin/blogs/delete/{id}', array('uses'=>'BlogController@delete'));
    Route::get('admin/programs/delete/{id}', array('uses'=>'ProgramController@delete'));
    Route::get('admin/miscs/delete/{id}', array('uses'=>'MiscController@delete'));

/*/deleete routes*/

/*edit routes*/
Route::get('admin/urgents/edit/{id}', array('uses'=>'UrgentController@showEdit'));
Route::post('admin/urgents/edit/{id}', array('uses'=>'UrgentController@doEdit'));
Route::get('admin/testimonials/edit/{id}', array('uses'=>'TestimonialController@showEdit'));
Route::post('admin/testimonials/edit/{id}', array('uses'=>'TestimonialController@doEdit'));
Route::get('admin/sliders/edit/{id}', array('uses'=>'SliderController@showEdit'));
Route::post('admin/sliders/edit/{id}', array('uses'=>'SliderController@doEdit'));
Route::get('admin/sliders/status/{id}', array('uses'=>'SliderController@activateDeactivate'));

Route::get('admin/scholars/edit/{id}', array('uses'=>'ScholarController@showEdit'));
Route::post('admin/scholars/edit/{id}', array('uses'=>'ScholarController@doEdit'));
Route::get('admin/documents/edit/{id}', array('uses'=>'DocumentController@showEdit'));
Route::post('admin/documents/edit/{id}', array('uses'=>'DocumentController@doEdit'));
Route::get('admin/gallery/edit/{id}', array('uses'=>'GalleryController@showEdit'));
Route::post('admin/gallery/edit/{id}', array('uses'=>'GalleryController@doEdit'));
Route::get('admin/events/edit/{id}', array('uses'=>'EventController@showEdit'));
Route::post('admin/events/edit/{id}', array('uses'=>'EventController@doEdit'));
Route::get('admin/courses/edit/{id}', array('uses'=>'CourseController@showEdit'));
Route::post('admin/courses/edit/{id}', array('uses'=>'CourseController@doEdit'));
Route::get('admin/churches/edit/{id}', array('uses'=>'ChurchController@showEdit'));
Route::post('admin/churches/edit/{id}', array('uses'=>'ChurchController@doEdit'));
Route::get('admin/boards/edit/{id}', array('uses'=>'BoardController@showEdit'));
Route::post('admin/boards/edit/{id}', array('uses'=>'BoardController@doEdit'));
Route::get('admin/blogs/edit/{id}', array('uses'=>'BlogController@showEdit'));
Route::post('admin/blogs/edit/{id}', array('uses'=>'BlogController@doEdit'));
Route::get('admin/blogs/status/{id}', array('uses'=>'BlogController@activateDeactivate'));
Route::get('admin/programs/edit/{id}', array('uses'=>'ProgramController@showEdit'));
Route::post('admin/programs/edit/{id}', array('uses'=>'ProgramController@doEdit'));
Route::get('admin/programs/status/{id}', array('uses'=>'ProgramController@activateDeactivate'));
Route::get('admin/user/edit', array('uses'=>'UserController@ShowEdit'));
Route::post('admin/user/edit/{id}', array('uses'=>'UserController@doEdit'));
Route::get('admin/miscs/edit/{id}', array('uses'=>'MiscController@showEdit'));
Route::post('admin/miscs/edit/{id}', array('uses'=>'MiscController@doEdit'));

/*/edit routes*/


/*for image*/
Route::get('resizeImage', 'ScholarController@resizeImage');
Route::post('resizeImagePost',['as'=>'resizeImagePost','uses'=>'ScholarController@resizeImagePost']);
/*/for image*/



/*modals*/

Route::get('terms', function () {
    return view('front.partials.terms-and-conditions');
});

Route::get('admin/profile', function () {
    return view('admin.partials.user-profile');
})->middleware('auth');
/*/modals*/


/*admin approval*/
Route::get('admin/approve', array('uses'=>'UserController@showUnderApprovalList'))->middleware('auth');
Route::get('admin/approve/{id}', array('uses'=>'UserController@approveUnapprove'));


/*/admin approval*/


});//from top