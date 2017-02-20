
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Add New Gallery Item</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/gallery') }}" class="btn btn-success btn-sm pull-right">See All Gallery List</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            
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
               



          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#tab_1" data-toggle="tab">New Image</a></li>
              <li><a href="#tab_2" data-toggle="tab">New Video</a></li>
            </ul>
            <div class="tab-content">
              <div class="tab-pane active" id="tab_1">
               {{Form::open(array('url'=>'admin/gallery/create-image','method'=>'post','enctype' => 'multipart/form-data'))}}
                        <div class="form-group">
                                  <label for="title">Caption of Image</label>                  
                                  {{ Form::text('title', Input::old('title'), array('placeholder' => 'Title of Image','class'=>'form-control')) }}
                        </div> 
                        <div class="row">
                          <div class="col-md-6">
                                  <div class="form-group">
                                                <label for="text">Category</label>
                                                <select name="category" class="form-control">
                                                  <option disabled>Select Category</option>
                                                  <option value="Mission" {{ (Input::old("level") == "Mission" ? "selected":"") }}>Mission</option>
                                                  <option value="Celebration" {{ (Input::old("Celebration") == "Celebration" ? "selected":"") }}>Celebration</option>
                                                  <option value="Poltical" {{ (Input::old("Poltical") == "Poltical" ? "selected":"") }}>Poltical</option>
                                                   <option value="Featured" {{ (Input::old("Featured") == "Featured" ? "selected":"") }}>Featured Video</option>
                                                  <option value="Others" {{ (Input::old("Others") == "Others" ? "selected":"") }}>Others</option>
                                                  
                                                </select>
                                  </div>
                          </div>
                          <div class="col-md-6">
                                  <div class="form-group">
                                            <label for="exampleInputFile">Upload Image</label>
                                            <input type="file" name="image" id="exampleInputFile">
                                            <p class="help-block">Less than 2 MB</p>
                                  </div>
                          </div>
                        </div>
                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
              </div>
              <!-- /.tab-pane -->
              <div class="tab-pane" id="tab_2">
              {{Form::open(array('url'=>'admin/gallery/create-video','method'=>'post','enctype' => 'multipart/form-data'))}}
                       <div class="form-group">
                                  <label for="title">Title of Video</label>                  
                                  {{ Form::text('title', Input::old('title'), array('placeholder' => 'Title of video','class'=>'form-control')) }}
                        </div> 
                        <div class="row">
                          <div class="col-md-6">
                                   <div class="form-group">
                                                <label for="text">Category</label>
                                                <select name="category" class="form-control">
                                                  <option disabled>Select Category</option>
                                                  <option value="Mission" {{ (Input::old("level") == "Mission" ? "selected":"") }}>Mission</option>
                                                  <option value="Celebration" {{ (Input::old("Celebration") == "Celebration" ? "selected":"") }}>Celebration</option>
                                                  <option value="Poltical" {{ (Input::old("Poltical") == "Poltical" ? "selected":"") }}>Poltical</option>
                                                   <option value="Featured" {{ (Input::old("Featured") == "Featured" ? "selected":"") }}>Featured Video</option>
                                                  <option value="Others" {{ (Input::old("Others") == "Others" ? "selected":"") }}>Others</option>
                                                  
                                                </select>
                                  </div>
                          </div>
                          <div class="col-md-6">
                                    <div class="form-group">
                                  <label for="title">Youtube Video Id</label>                  
                                  {{ Form::text('url', Input::old('url'), array('placeholder' => '8FMz_KT1mC4','class'=>'form-control')) }}
                        </div> 
                          </div>
                        </div>

                   

                      <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </div>
                    </form>
              </div>

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- nav-tabs-custom -->              

            
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection