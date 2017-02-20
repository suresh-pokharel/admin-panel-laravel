

<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Serve Now Nepal | Registration Page</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
@include('admin.partials.top-include-resources')
<!-- This is for image preview of avatar -->
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

</head>
<body class="hold-transition register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="{{url('')}}"><b>Serve Now Nepal</b></a>
  </div>

  <div class="register-box-body">
    <p class="login-box-msg">Register a new account</p>
@if(Session::has('signup_success_message'))
    <div class='alert alert-info' role='alert'>
          <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
            {{Session('signup_success_message')}}
            <span>Click <a href="{{ url('/admin/login') }}">here</a> to login</span>
          <span class='sr-only'>Error:</span>
      </div>
@endif



    {{Form::open(array('url'=>'admin/register','method'=>'post'))}}
      <div class="form-group has-feedback">
       {{ Form::text('fullname', Input::old('fullname'), array('placeholder' => 'Full name','class'=>'form-control')) }}
        <span class="glyphicon glyphicon-user form-control-feedback"></span>
      </div>
        @if(""!=($errors->first('fullname')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('fullname')}}</span>
        @endif
    
      <div class="form-group has-feedback">

        {{ Form::text('email', Input::old('email'), array('placeholder' => 'Email','class'=>'form-control')) }}
        <span class="glyphicon glyphicon-envelope form-control-feedback"></span>
      </div>
       @if(""!=($errors->first('email')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('email')}}</span>
        @endif
      <div class="form-group has-feedback">
        <input type="password" class="form-control" placeholder="Password" name="password">
        <span class="glyphicon glyphicon-lock form-control-feedback"></span>
      </div>
       @if(""!=($errors->first('password')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('password')}}</span>
        @endif
      <div class="form-group has-feedback">
        {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'Phone Number','class'=>'form-control')) }}
        <span class="glyphicon glyphicon-phone form-control-feedback"></span>
      </div>
       @if(""!=($errors->first('phone')))
        <span class="help-block" style="background-color: red; color:white" >{{$errors->first('phone')}}</span>
        @endif


     <!-- radio -->
                <div class="form-group">
                  <div class="radio">
                  <label>Admin Type:</label>
                    <label>
     				{{ Form::radio('role', 'General','true',['class' => 'field']) }}
                      
                      General
                    </label>
                    <label>
					{{ Form::radio('role', 'Master') }}
                      
                      Master
                    </label>
                  </div>
                 
                 
                </div>
    <div class="row">
        	<div class="col-xs-6">
           		<div class="form-group">
                			<label>Select Avatar</label>
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
                            <img name="preview1" width="80px" style="border:2px solid black; float: right;" border="2px" src="{{url('assets/images/admin/users/')}}/{{ (null!==(Input::old("image"))?Input::old("image"):"male1.png") }}">   
                         </div>  
          </div>



                
		            <!-- <div class="col-xs-6"><br>
			            <div class="form-group">
			            	<img name="preview1" width="60px" style="border:2px solid black; float: right;" border="2px" src="../resources/uploads/0">
                    
			            </div>
		            </div> -->
		        </div>
                

<hr>
      <div class="form-group">
          <div class="checkbox icheck">
            <label>
              <input type="checkbox">  I agree to the  <a id="modal-27601" data-target="#modal-container-27601" data-toggle="modal" href="{{ url('/terms') }}">terms & conditions</a>
            </label>
          </div>
        </div>
        <!-- /.col -->
        <div class="form-group">
          <button type="submit" class="btn btn-primary btn-block btn-flat">Register</button>
        </div>
        <!-- /.col -->
      </div>
   {{Form::close()}}

    <div class="social-auth-links text-center">
      <p>- OR -</p>
      <a href="#" class="btn btn-block btn-social btn-facebook btn-flat disabled"><i class="fa fa-facebook"></i> Sign up using
        Facebook</a>
      <!-- <a href="#" class="btn btn-block btn-social btn-google btn-flat"><i class="fa fa-google-plus"></i> Sign up using
        Google+</a> -->
    </div>

    <center>
    	
    <a href="{{url('admin/login')}}">I already have an account</a>

    </center>
  </div>
  <!-- /.form-box -->
</div>
<!-- /.register-box -->

@include('admin.partials.bottom-include-resources')
</body>
</html>
