
@extends('admin.layout')
@section('content')
<script language="javascript" type="text/javascript">
  function edit_image1()
  {
    if (document.getElementById('select1').value == "0") {
      document.preview1.style.visibility = "hidden";
      document.getElementById('random1').style.visibility = "visible";
    } else {
      var selected = document.getElementById('select1').options[document.getElementById('select1').selectedIndex].value;
      document.preview1.style.visibility = "visible";
      document.preview1.src = "{{url('assets/images/admin/users')}}"+'/'+selected;
      //document.getElementById('random1').style.visibility = "hidden";
    }
  }
</script>
<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">

              <!-- show errors/messages here  -->
@if(Session::has('success_message'))
            <div class='alert alert-info' role='alert'>
                  <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
                    {{Session('success_message')}}
                  <span class='sr-only'>Error:</span>
            </div>
 @endif
@if (count($errors) > 0)
  <div class="alert alert-danger">
    <strong>Oops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif

<!-- /errors -->
               







@if(Session::has('signup_success_message'))
    <div class='alert alert-info' role='alert'>
          <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
            {{Session('signup_success_message')}}
            <span>Click <a href="{{ url('/admin/login') }}">here</a> to login</span>
          <span class='sr-only'>Error:</span>
      </div>
@endif

 <div class="col-md-8" style="padding-right:20px; border-right: 1px solid #ccc;">
    <h4><strong>Edit Your Information</strong></h4><hr>

     {{Form::model($row,array('url'=>['admin/user/edit',$row->id],'enctype' => 'multipart/form-data'))}} 
     <label for="text">Fullname</label> 
      <div class="form-group has-feedback">
       {{ Form::text('fullname', Input::old('fullname'), array('placeholder' => 'Full name','class'=>'form-control')) }}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        @if(""!=($errors->first('fullname')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('fullname')}}</span>
        @endif
    
      <div class="form-group has-feedback">
      <label for="text">Email</label> 
        {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email','class'=>'form-control','disabled')) }}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
       @if(""!=($errors->first('email')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('email')}}</span>
        @endif
    
     <!--  <label for="text">Password</label> 
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       @if(""!=($errors->first('password')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('password')}}</span>
        @endif -->
      <div class="form-group has-feedback">
      <label for="text">Phone</label> 
        {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'Phone Number','class'=>'form-control')) }}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
       @if(""!=($errors->first('phone')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('phone')}}</span>
        @endif



    <div class="row">
          <div class="col-md-6">
              <div class="form-group">
                      <label>Select new avatar</label>
                      <!--  {{Form::select('image', array('male1' => 'Male-1','male2' => 'Male-2','female1' => 'Female-1','female2' => 'Female-2','male3' => 'Male-3'), 'm1',['class' => 'form-control'])}}  -->

                        <select name='image' id='select1' class="form-control" onchange='edit_image1()';>
                          <option value='male1.png' {{ (Input::old("image") == "male1.png" ? "selected":"") }}> Male-1</option> 
                          <option value='female1.png' {{ (Input::old("image") == "female1.png" ? "selected":"") }}>Female-1</option>
                          <option value='male2.png' {{ (Input::old("image") == "male2.png" ? "selected":"") }}>Male-2</option> 
                          <option value='female2.png' {{ (Input::old("image") == "female2.png" ? "selected":"") }}>Female-2</option> 
                          <option value='male3.png' {{ (Input::old("image") == "male3.png" ? "selected":"") }}>Male-3</option> 

                        </select>
                </div>
          </div>
      
          <div class="col-xs-6"><br>
                        <div class="form-group">
                            <img name="preview1" width="80px" style="border:2px solid black; float: right;" border="2px" src="{{url('')}}/{{null !==(Input::old('image'))?Input::old('image'):$row->image}}">   
                         </div>  
          </div>
          <div class="row">
            
          </div>     
    </div>
  <div class="form-group has-feedback">
      <div class="form-group">
               <button type="submit" class="btn btn-primary btn-flat">Save Changes</button>
      </div>
    </div>
                
</div>



    <div class="col-md-4"><!-- for next form to change password -->
    <h4><strong>Change Password</strong></h4><hr>
    {{Form::open(array('url'=>'UserController@changePassword','method'=>'post'))}}
      <div class="form-group">
         <label for="text">Old Password</label> 
          <input type="password" class="form-control" placeholder="Password" name="password_old">
          <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       <div class="form-group">
         <label for="text">New Password</label> 
          <input type="password" class="form-control" placeholder="New Password" name="password">
         
      </div>
      <div class="form-group">
         <label for="text">Confirm Password</label> 
          <input type="password" class="form-control" placeholder="Retype New Password" name="password_confirm">
          
      </div>
      <div class="form-group">
          <button type="submit" title="You can't change password at this moment, please contact to the developer" class="btn btn-primary btn-block btn-flat" disabled>Save Changes</button>
      </div>
 {{Form::close()}}
      
    </div>
<hr>
      <div class="form-group">

        <!-- /.col -->
        
        <!-- /.col -->
      </div>
   {{Form::close()}}

 









            
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->
      </div>
</section>
 </div>

  @endsection