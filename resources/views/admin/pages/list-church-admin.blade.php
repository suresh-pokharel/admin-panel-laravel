
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Churches' List</strong></h4>
    </div>
    <div class="col-md-4">
        
         <a href="{{ URL::to('admin/churches/create') }}" class="btn btn-success btn-sm pull-right">Add New Church</a>
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
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Phone</th>
                  <th>Website</th>
                  <th>email</th>
                  <th>Pastor</th>
                  <th>Mobile</th>
                  <th>Valid Till</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($churches as $church)
                <tr>
                  <td>{{$church->id}}</td>
                  <td>{{$church->name}}</td>
                  <td>{{$church->address}}</td>
                  <td>{{$church->phone}}</td>
                   <td>{{$church->website}}</td>
                  <td>{{$church->email}}</td>
                  <td>{{$church->pastors_name}}</td>
                  <td>{{$church->pastors_phone}}</td>
                  <td>{{$church->valid_till}}</td>
                  <td> 
                  <a href="{{ URL::to('admin/churches/edit',['id'=>$church->id])}}"><button type="button" class="btn btn-box-tool text-green" title="Edit" >
                  <i class="fa fa-edit"></i></button></a>

                  <form method="POST" onclick="return confirm('Are you sure to delete this item?')" action="">
                  <a href="{{ URL::to('admin/churches/delete',['id'=>$church->id])}}"><button type="button"  class="btn btn-box-tool text-red" title="Delete"><i class="fa fa-trash"></i></button></a>
                  </form>
                </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
                 {{ $churches->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection