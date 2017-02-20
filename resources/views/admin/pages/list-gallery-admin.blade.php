
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Gallery List</strong></h4>
      
    </div>
    <div class="col-md-4">
        
         <a href="{{ URL::to('admin/gallery/create') }}" class="btn btn-success btn-sm pull-right">Add New Image/Video</a>
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
                  <th>Title</th>
                  <th>Image/Thumbnail</th>
                  <th>Type</th>
                  <th>URL</th>
                  <th>Category</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($gallery as $gal)
                <tr>
                  <td>{{$gal->id}}</td>
                  <td>{{$gal->title}}</td>
                  <td><img src="{{$gal->iv=='Image'?asset($gal->image):"https://img.youtube.com/vi/".$gal->url."/1.jpg"}}" height="60"></td>
                  
                  <td>{{$gal->iv}}</td>
                  <td>{{$gal->url}}</td>
                  <td>{{$gal->category}}</td>
                  <td> 
                  
                  <!--   <a href="{{ URL::to('admin/gallery/edit',['id'=>$gal->id])}}"><button type="button" class="btn btn-box-tool text-green" title="Edit" >
                    <i class="fa fa-edit"></i></button></a> -->

                  <form method="POST" onclick="return confirm('Are you sure to delete this item?')" action="">
                     <a href="{{ URL::to('admin/gallery/delete',['id'=>$gal->id])}}"><button type="button"  class="btn btn-box-tool text-red" title="Delete"><i class="fa fa-trash"></i></button></a>
                  </form>
                </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
              {{ $gallery->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection