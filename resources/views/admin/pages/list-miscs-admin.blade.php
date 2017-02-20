
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Content List</strong></h4>
      
    </div>
    <div class="col-md-4">
        
         <a href="{{ URL::to('admin/miscs/create') }}" class="btn btn-success btn-sm pull-right">Add New Content</a>
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
                  <th>Created</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
              @foreach($miscs as $misc)
                <tr>
                  <td>{{$misc->id}}</td>
                  <td><?php 
            if($misc->title=="our_vision")
              echo"Our Vision";
            elseif ($misc->title=="our_mission")
              echo "Our Mission";
            elseif ($misc->title=="our_history")
              echo "Our History";
            elseif ($misc->title=="our_objectives")
              echo "Our Objectives";
            elseif ($misc->title=="christian_history")
              echo "Christian History in Nepal";
            elseif ($misc->title=="message-from-chairman")
              echo "Message From Chairperson";
            elseif ($misc->title=="message-from-president")
              echo "Message From President";
            elseif ($misc->title=="message-from-secretary")
              echo "Message From General Secretary";
             ?></td>
                  <td>{!! substr($misc->description,0,200).".." !!}</td>
                  <td>{{$misc->created_at}}</td>
                  <td> 
                  
                    <a href="{{ URL::to('admin/miscs/edit',['id'=>$misc->id])}}"><button type="button" class="btn btn-box-tool text-green" title="Edit" >
                    <i class="fa fa-edit"></i></button></a>

                  <form method="POST" onclick="return confirm('Are you sure to delete this item?')" action="">
                    <a href="{{ URL::to('admin/miscs/delete',['id'=>$misc->id])}}"><button type="button"  class="btn btn-box-tool text-red" title="Delete"><i class="fa fa-trash"></i></button></a>
                  </form>
                </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
              {{ $miscs->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection