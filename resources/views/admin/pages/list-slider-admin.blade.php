
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Sliders' List</strong></h4>
      
    </div>
    <div class="col-md-4">
      <a href="{{ URL::to('admin/sliders/create') }}" class="btn btn-success btn-sm pull-right">Add New Slider</a>
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
                  <th>Description-1</th>
                  <th>Description-2</th>
                  <th>Description-3</th>
                  <th>Image</th>
                  <th>Refferal Link</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($sliders as $slider)
                <tr>
                  <td>{{$slider->id}}</td>
                  <td>{{$slider->desc_1}}</td>
                  <td>{{$slider->desc_2}}</td>
                  <td>{{$slider->desc_3}}</td>
                  <td><img src="{{asset($slider->thumbnail)}}" height="60"></td>
                  <td>{{$slider->refferal_link}}</td>
                  <td> 

                  <a href="{{ URL::to('admin/sliders/edit',['id'=>$slider->id])}}"><button type="button" class="btn btn-box-tool text-green" title="Edit" >
                  <i class="fa fa-edit"></i></button></a>

                  <form method="POST" onclick="return confirm('Are you sure to delete this item?')" action="">
                  <a href="{{ URL::to('admin/sliders/delete',['id'=>$slider->id])}}"><button type="button"  class="btn btn-box-tool text-red" title="Delete"><i class="fa fa-trash"></i></button></a>
                  </form>


                   <a href="{{ URL::to('admin/sliders/status',['id'=>$slider->id])}}">
                   @if($slider->isActive=='1')
                   <button type="button" class="btn btn-box-tool text-blue" title="Click to Deactivate"><i class="fa fa-check"></i></button>
                   @else
                   <button type="button" class="btn btn-box-tool text-black" title="Click to Activate"><i class="fa fa-times"></i></button>
                   @endif
                   </a>
                </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
              {{ $sliders->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection