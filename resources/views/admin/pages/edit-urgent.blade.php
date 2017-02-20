 
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
<section class="content-header">
<div class="row">
     <div class="col-md-8">
        <h4><strong>Edit Notice</strong></h4>
      
    </div>
    <div class="col-md-4">
         <a href="{{ URL::to('admin/urgents') }}" class="btn btn-success btn-sm pull-right">See All Urgent Notices</a>
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
        @if(""!=($errors->first('title')))
          <span class="help-block" style="background-color: red; color:white" >{{$errors->first('title')}}</span>
        @endif
        @if(""!=($errors->first('referral_link')))
          <span class="help-block" style="background-color: red; color:white" >{{$errors->first('referral_link')}}</span>
        @endif
              <!-- /errors -->
                <div class="form-group">
              
 {{Form::model($row,array('url'=>['admin/urgents/edit',$row->id],'enctype' => 'multipart/form-data'))}} 
              <div class="box-body">

              <!-- /errors -->
                <div class="form-group">
                  <label for="title">Title</label>
                  <p class="help-block">Example: Admission Open, Vacancy Opened.</p>
                  
                  {{ Form::text('title', Input::old('title'), array('placeholder' => 'Enter Title','class'=>'form-control')) }}
                </div>
                <div class="form-group">
                  
                  <label for="text">Referral Link (Optional)</label>
                  <p class="help-block">Leave Empty if no button is to be placed</p>
                  

                  {{ Form::text('referral_link', Input::old('referral_link'), array('placeholder' => 'Refferal Link','class'=>'form-control')) }}
                </div>
              
              </div>
              <!-- /.box-body -->

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
