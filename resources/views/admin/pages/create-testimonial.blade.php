
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Add New Testimonial</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/testimonials') }}" class="btn btn-success btn-sm pull-right">See All Testimonials</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            {{Form::open(array('url'=>'admin/testimonials/create','method'=>'post','enctype' => 'multipart/form-data'))}}
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
                      <div class="col-md-6">
                         <div class="form-group">
                            <label for="title">Fullname of Person</label>                  
                            {{ Form::text('fullname', Input::old('fullname'), array('placeholder' => 'Mr.John Charles','class'=>'form-control')) }}
                          </div>

                          <div class="form-group">
                            <label for="title">Designation</label>                  
                            {{ Form::text('designation', Input::old('designation'), array('placeholder' => 'International Director','class'=>'form-control')) }}
                          </div>


                      </div>

                    <div class="col-md-6">
                          
                          <div class="form-group">
                              <label for="text">Organization Where he/she works (optional)</label>
                              {{ Form::text('organization', Input::old('organization'), array('placeholder' => 'Nepal Telecom','class'=>'form-control')) }}
                          </div>

                          <div class="form-group">
                              <label for="exampleInputFile">Upload Image</label>
                              <input type="file" name="image" id="exampleInputFile">
                              <p class="help-block">Image should be in square (160X160)</p>
                          </div>
                         
                   </div>

                   <div class="col-md-12">
                      <div class="form-group">
                          <label for="text">Description</label>
                          <textarea name="description" class="form-control textarea" placeholder="It was my great pleasure to get an opportunity to write about Prabhav. I certainly believe that Prabhav is great supporting platform for upgrowing talent. I strongly recommend my connections to coordinate with Prabhav." style="width: 100%; height: 110px; line-height: 18px; border: 1px solid #dddddd; padding: 10px">{{null !==(Input::old('description'))?Input::old('description'):''}}</textarea>
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