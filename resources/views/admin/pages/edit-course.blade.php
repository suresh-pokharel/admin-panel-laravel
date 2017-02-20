
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Edit Course</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/courses') }}" class="btn btn-success btn-sm pull-right">See All Courses</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
            {{Form::model($row,array('url'=>['admin/courses/edit',$row->id],'enctype' => 'multipart/form-data'))}} 
              <div class="box-body">
              <!-- show errors/messages here  -->
        @if(Session::has('success_message'))
            <div class='alert alert-info' role='alert'>
                  <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
                    {{Session('success_message')}}
                  <span class='sr-only'>Error:</span>
            </div>
        @endif
        @if(""!=($errors->first('title')))
          <span class="help-block" style="background-color: red; color:white" >{{$errors->first('title')}}</span>
        @endif
        @if(""!=($errors->first('level')))
          <span class="help-block" style="background-color: red; color:white" >{{$errors->first('level')}}</span>
        @endif
         @if(""!=($errors->first('college')))
          <span class="help-block" style="background-color: red; color:white" >{{$errors->first('college')}}</span>
        @endif
        @if(""!=($errors->first('seats')))
          <span class="help-block" style="background-color: red; color:white" >{{$errors->first('seats')}}</span>
        @endif
         @if(""!=($errors->first('description')))
          <span class="help-block" style="background-color: red; color:white" >{{$errors->first('description')}}</span>
        @endif
          <hr>
        
              <!-- /errors -->
               

                
                <div class="row">
                      <div class="col-md-4">
                         <div class="form-group">
                            <label for="title">Title of the Course</label>                  
                            {{ Form::text('title', Input::old('title'), array('placeholder' => 'Bachelor in Business Administration','class'=>'form-control')) }}
                          </div>
                      </div>

                <div class="col-md-4" >
                  <div class="form-group">
                      <label for="text">Level</label>
                      <select name="level" class="form-control">
                        <option disabled>Select Level</option>
                        <option value="Intermediate" {{ (Input::old("level") == "Intermediate" ? "selected":"") }}>Intermediate</option>
                        <option value="Bachelor" {{ (Input::old("level") == "Bachelor" ? "selected":"") }}>Bachelor</option>
                        <option value="Masters" {{ (Input::old("level") == "Masters" ? "selected":"") }}>Masters</option>
                        <option value="Others" {{ (Input::old("level") == "Others" ? "selected":"") }}>Others</option>
                      </select>
                  </div>
                </div>

                      <div class="col-md-4">
                           <div class="form-group">
                              <label for="text">Seats Available (optional)</label>
                              {{ Form::text('seats', Input::old('seats'), array('placeholder' => 'Number of seats available like: 5','class'=>'form-control')) }}
                        </div>
                      </div>
                </div>

                <div class="row">
                   <div class="col-md-6" >
                        <div class="form-group">
                          <label for="text">College</label>
                              {{ Form::text('college', Input::old('college'), array('placeholder' => 'Caspian College','class'=>'form-control')) }}
                        </div>

                        <div class="form-group">
                          <label for="text">Address of College (optional)</label>
                              {{ Form::text('college_address', Input::old('college_address'), array('placeholder' => 'Lagankhel, Lalitpur','class'=>'form-control')) }}
                        </div>
                  </div>
                  <div class="col-md-6">
                        <div class="form-group">
                          <label for="text">Description (optional)</label>
                          <textarea name="description" class="form-control textarea" placeholder="BBA is a bachelor's degree in commerce and business administration.Students who have successfully completed higher secondary or equivalent are English to apply." style="width: 100%; height: 110px; line-height: 18px; border: 1px solid #dddddd; padding: 10px">{{null !==(Input::old('description'))?Input::old('description'):$row->description}}</textarea>
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