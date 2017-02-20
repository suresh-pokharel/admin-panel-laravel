
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Add New Slider</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/sliders') }}" class="btn btn-success btn-sm pull-right">See All Sliders</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            {{Form::open(array('url'=>'admin/sliders/create','method'=>'post','enctype' => 'multipart/form-data'))}}
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
                            <label for="title">Description - 1</label>                  
                            {{ Form::text('desc_1', Input::old('desc_1'), array('placeholder' => 'DONATE','class'=>'form-control')) }}
                          </div>

                          <div class="form-group">
                            <label for="title">Description - 2</label>                  
                            {{ Form::text('desc_2', Input::old('desc_2'), array('placeholder' => 'BE A PART OF THEIR SMILE','class'=>'form-control')) }}
                             <p class="help-block">put {{'<br>'}} to break the line</p>
                          </div>
                          <div class="form-group">
                            <label for="title">Description - 3 (optional)</label>                  
                            {{ Form::text('desc_3', Input::old('desc_3'), array('placeholder' => 'The best time to plan a tree was 20 years ago the next best time is today.','class'=>'form-control')) }}
                             

                          </div>

                      </div>

                    <div class="col-md-6">
                          <div class="form-group">
                              <label for="exampleInputFile">Upload Image</label>
                              <input type="file" name="image" id="exampleInputFile">
                              <p class="help-block">Image should be in proper size (860X460)</p>
                          </div>
                          <div class="form-group">
                            <label for="title">Referral Link (optional)</label>                  
                            {{ Form::text('refferal_link', Input::old('refferal_link'), array('placeholder' => '/donate','class'=>'form-control')) }}
                            <p class="help-block">Enter full url including https:// to refer</p>
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