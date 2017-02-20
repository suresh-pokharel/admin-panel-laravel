
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Edit Scholar</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/scholars') }}" class="btn btn-success btn-sm pull-right">See All Scholars</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
             {{Form::model($row,array('url'=>['admin/scholars/edit',$row->id],'enctype' => 'multipart/form-data'))}} 
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
                            <label for="title">Fullname of Scholar</label>                  
                            {{ Form::text('fullname', Input::old('fullname'), array('placeholder' => 'Mrs. Shreya Karki','class'=>'form-control')) }}
                          </div>

                          <div class="form-group">
                            <label for="title">Designation</label>                  
                            {{ Form::text('designation', Input::old('designation'), array('placeholder' => 'Marketing Officer','class'=>'form-control')) }}
                          </div>

                          <div class="form-group">
                              <label for="text">Organization Where he/she works (optional)</label>
                              {{ Form::text('organization', Input::old('organization'), array('placeholder' => 'Sipradi Traders','class'=>'form-control')) }}
                        </div>
                      </div>

                    <div class="col-md-6">
                        
                        <div class="col-md-4">
                          <div class="form-group">
                                <img src="{{asset($row->image)}}" height="80" style="border: 2px solid; float: right;">
                          </div>
                        </div>

                        <div class="col-md-8">
                          <div class="form-group">
                              <label for="exampleInputFile">Upload Image</label>
                              <input type="file" name="image" id="exampleInputFile">
                              <p class="help-block">less than 2MB</p>
                          </div>
                       
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