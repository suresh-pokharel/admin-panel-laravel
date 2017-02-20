
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>program List</strong></h4>
      
    </div>
    <div class="col-md-4">
        
         <a href="{{ URL::to('admin/programs/create') }}" class="btn btn-success btn-sm pull-right">Add New Program</a>
    </div>
  </div>
</section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
           
            <!-- /.box-header -->
            <div class="box-body">
        @if(Session::has('success_message'))
            <div class='alert alert-info' role='alert'>
                  <span class='glyphicon glyphicon-info-sign' aria-hidden='true'></span>
                    {{Session('success_message')}}
                  <span class='sr-only'>Error:</span>
            </div>
        @endif
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Post ID</th>
                  <th>Title</th>
                  <th>Description</th>
                  <th>Image</th>
                  <th title="Higher the value appears first">Value</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($programs as $program)
                <tr>
                  <td>{{$program->id}}</td>
                  <td>{{$program->title}}</td>
                  <td>{!!substr($program->description,0,500).".." !!}</td>
                 <td><img src="{{asset($program->thumb)}}" height="60"></td>
                  <td>{{$program->value}}</td>
                  <td> 
                  
                    <a href="{{ URL::to('admin/programs/edit',['id'=>$program->id])}}"><button type="button" class="btn btn-box-tool text-green" title="Edit" >
                    <i class="fa fa-edit"></i></button></a>

                  <form method="POST" onclick="return confirm('Are you sure to delete this item?')" action="">
                    <a href="{{ URL::to('admin/programs/delete',['id'=>$program->id])}}"><button type="button"  class="btn btn-box-tool text-red" title="Delete"><i class="fa fa-trash"></i></button></a>
                  </form>

                   <a href="{{ URL::to('admin/programs/status',['id'=>$program->id])}}">
                   @if($program->published=='1')
                   <button type="button" class="btn btn-box-tool text-blue" title="Click to Unpublish"><i class="fa fa-check"></i></button>
                   @else
                   <button type="button" class="btn btn-box-tool text-black" title="Click to Publish"><i class="fa fa-times"></i></button>
                   @endif
                   </a>

                </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
              {{ $programs->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection