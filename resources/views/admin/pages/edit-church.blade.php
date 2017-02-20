
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Edit Church</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/churches') }}" class="btn btn-success btn-sm pull-right">See All Churches</a>
    </div>
  </div>

</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
      
             {{Form::model($row,array('url'=>['admin/churches/edit',$row->id],'enctype' => 'multipart/form-data'))}} 
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
    <strong>Whoops!</strong> There were some problems with your input.<br><br>
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
@endif
        
        
          <hr>
        
        
              <!-- /errors -->
                <div class="form-group">
                  <label for="title">Name of Church</label>                  
                  {{ Form::text('name', Input::old('name'), array('placeholder' => 'Name of Church','class'=>'form-control')) }}
                </div>

                <div class="form-group">
                  <label for="text">Address</label>
                  {{ Form::text('address', Input::old('address'), array('placeholder' => 'Full Address of Church','class'=>'form-control')) }}
                </div>
                <div class="row">
                      <div class="col-md-6" >
                           <div class="form-group">
                              <label for="text">Church's Phone Number (optional)</label>
                              {{ Form::text('phone', Input::old('phone'), array('placeholder' => 'Phone Number','class'=>'form-control')) }}
                        </div>
                      </div>
                        <div class="col-md-6">
                           <div class="form-group">
                              <label for="text">Church's Website (optional)</label>
                              {{ Form::text('website', Input::old('website'), array('placeholder' => 'www.oursite.com','class'=>'form-control')) }}
                        </div>
                      </div>
                </div>

                <div class="row">
                    <div class="col-md-6" >
                        <div class="form-group">
                              <label for="text">Email (optional)</label>
                              {{ Form::text('email', Input::old('email'), array('placeholder' => 'Church Email','class'=>'form-control')) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                      <div class="form-group">  
                         <label for="text">Registered Date</label>
                          <div class="input-group date form_datetime" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input1">
                          <!-- dd MM yyyy - HH:ii p -->
                              <!-- <input class="form-control" size="16" type="text" value="" readonly> -->
                              {{ Form::text('registered_on', Input::old('regisered_on'), array('placeholder' => 'YYYY-MM-DD','class'=>'form-control','size'=>'16')) }}
                              <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                          <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                          </div>
                          <input type="hidden" id="dtp_input1" value="" />
                      </div>
                    </div>
                    </div>

                <div class="row">
                      <div class="col-md-6" >
                           <div class="form-group">
                              <label for="text">Pastor's Name</label>
                              {{ Form::text('pastors_name', Input::old('phone'), array('placeholder' => 'Name of Pastor','class'=>'form-control')) }}
                        </div>
                      </div>
                        <div class="col-md-6">
                          <div class="form-group">
                                <label for="text">Pastor's Phone/ Mobile Number (optional)</label>
                                {{ Form::text('pastors_phone', Input::old('pastors_phone'), array('placeholder' => '98XXXXXXXX / 01XXXXXXX','class'=>'form-control')) }}
                          </div>
                      </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                        <div class="form-group">
                          <label for="text">Description (optional)</label>
                          <textarea name="description" class="form-control textarea" placeholder="Place some text here" style="width: 100%; height: 80px; line-height: 18px; border: 1px solid #dddddd; padding: 10px">{{null !==(Input::old('description'))?Input::old('description'):$row->description}}</textarea>
                       </div>
                  </div>
                  
                  <div class="col-md-6">
                    <div class="form-group">  
                     <label for="text">Valid till (optional)</label>
                      <div class="input-group date form_datetime" data-date="" data-date-format="yyyy-mm-dd HH:ii:ss" data-link-field="dtp_input2">
                      <!-- dd MM yyyy - HH:ii p -->
                          <!-- <input class="form-control" size="16" type="text" value="" readonly> -->
                          {{ Form::text('valid_till', Input::old('valid_till'), array('placeholder' => 'YYYY-MM-DD','class'=>'form-control','size'=>'16')) }}
                          <span class="input-group-addon"><span class="glyphicon glyphicon-remove"></span></span>
                      <span class="input-group-addon"><span class="glyphicon glyphicon-th"></span></span>
                      </div>
                      <input type="hidden" id="dtp_input2" value="" /><br/>
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