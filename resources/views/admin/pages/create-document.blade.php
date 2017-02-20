
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Add New document</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/documents') }}" class="btn btn-success btn-sm pull-right">See All documents</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            {{Form::open(array('url'=>'admin/documents/create','method'=>'post','enctype' => 'multipart/form-data'))}}
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
                            <label for="title">Title of Document</label>                  
                            {{ Form::text('title', Input::old('title'), array('placeholder' => 'Press Release about Christmas Celebration','class'=>'form-control')) }}
                          </div>

                          <div class="form-group">
                            <label for="text">Description</label>
                            <textarea name="description" class="form-control textarea" placeholder="Please download ‘Constitution of Nepal 2071′ unofficial English translation by constituent Assembly Secretariat." style="width: 100%; height: 110px; line-height: 18px; border: 1px solid #dddddd; padding: 10px">{{null !==(Input::old('description'))?Input::old('description'):''}}</textarea>
                         </div>

                      </div>

                <div class="col-md-6">
                          <div class="form-group">
                              <label for="text">Category (optional)</label>
                              <select name="category" class="form-control">
                                <option disabled>Select Category</option>
                                <option value="Press Release" {{ (Input::old("category") == "Press Release" ? "selected":"") }}>Press Release</option>
                                <option value="Rules" {{ (Input::old("category") == "Rules" ? "selected":"") }}>Rules</option>
                                <option value="Documents" {{ (Input::old("category") == "Documents" ? "selected":"") }}>Documents</option>
                                <option value="Others" {{ (Input::old("category") == "Others" ? "selected":"") }}>Others</option>
                              </select>
                          </div>

                          <div class="form-group">
                              <label for="exampleInputFile">Upload File</label>
                              <input type="file" name="image" id="exampleInputFile">
                              <p class="help-block">Upload PDF or DOCX or any type of image</p>
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