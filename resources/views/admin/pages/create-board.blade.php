
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Add New Board Member</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/boards') }}" class="btn btn-success btn-sm pull-right">See All Board Members</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            {{Form::open(array('url'=>'admin/boards/create','method'=>'post','enctype' => 'multipart/form-data'))}}
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
       
          <hr>
        
        
              <!-- /errors -->
               

                
                <div class="row">
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="title">Fullname of Person</label>                  
                            {{ Form::text('fullname', Input::old('fullname'), array('placeholder' => 'Mr.John Charles','class'=>'form-control')) }}
                          </div>
                      </div>
                          
                      <div class="col-md-4">
                          <div class="form-group">
                            <label for="title">Designation</label>                  
                            {{ Form::text('designation', Input::old('designation'), array('placeholder' => 'Chairman','class'=>'form-control')) }}
                          </div>
                      </div>

                       <div class="col-md-4">
                         <div class="form-group">
                            <label for="title">Phone (optional)</label>                  
                            {{ Form::text('phone', Input::old('phone'), array('placeholder' => '98XXXXXXXX / 014XXXXXX','class'=>'form-control')) }}
                          </div>
                      </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                      
                          <div class="form-group">
                            <label for="title">Address</label>                  
                            {{ Form::text('address', Input::old('address'), array('placeholder' => 'Satdobato, Lalitpur','class'=>'form-control')) }}
                          </div>
                      <div class="row">
                          <div class="col-md-6">
                            <div class="form-group">
                              <label for="exampleInputFile">Upload Image</label>
                              <input type="file" name="image" id="exampleInputFile">
                              <p class="help-block">Image should be in square (160X160)</p>
                            </div>
                                <div class="form-group checkbox">
                                        <label>
                                          <input type="checkbox"> Upload image later
                                        </label>
                                </div>
                          </div>
                          <div class="col-md-6">
                            <div class="form-group">
                            <label for="title">Value</label>                  
                            {{ Form::text('value', Input::old('value'), array('placeholder' => 'Number between 1-100','class'=>'form-control')) }}
                            <p class="help-block">Record with highest value appears first</p>
                            </div>
                            </div>
                      </div>
                          
                         
                   </div>

                   <div class="col-md-6">
                      <div class="form-group">
                          <label for="text">Bio (optional)</label>
                          <textarea name="bio" class="form-control textarea" placeholder="Mr. John Holy has different versions of her bio all over the internet. As you can imagine, some are more formal than others. But when it comes to her Twitter bio, she has carefully phrased her bio information in a way that helps her connect with her audience -- specifically, through the use of humor. " style="width: 100%; height: 110px; line-height: 18px; border: 1px solid #dddddd; padding: 10px">{{null !==(Input::old('bio'))?Input::old('bio'):''}}</textarea>
                       </div>
                   </div>

                </div>

              

              <div class="box-footer">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </form>
            
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection