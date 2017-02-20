
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Documents' List</strong></h4>
      
    </div>
    <div class="col-md-4">
        <a href="{{ URL::to('admin/documents/create') }}" class="btn btn-success btn-sm pull-right">Add New Document</a>
        
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
                  <th>Title of document</th>
                  <th>Description</th>
                  <th>Category</th>
                  <th>Image</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($documents as $document)
                <tr>
                  <td>{{$document->id}}</td>
                  <td>{{$document->title}}</td>
                  <td>{{$document->description}}</td>
                  <td>{{$document->category}}</td>
                  <td>
                    @if($document->file_type=='jpg'||$document->file_type=='jpeg'||$document->file_type=='PNG')
                      <a href="{{asset($document->image)}}" src="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset($document->image)}}" width="60"></a>
                    @elseif($document->file_type=='pdf')
                       <a href="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset('assets/images/icons/pdf.png')}}" height="60"></a>
                    @elseif($document->file_type=='doc'||$document->file_type=='docx')
                       <a href="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset('assets/images/icons/word.png')}}" height="60"></a>
                    @else
                       <a href="{{asset($document->image)}}" target="_blank"><img title="{{asset($document->image)}}" src="{{asset('assets/images/icons/file.png')}}" height="60"></a>
                    @endif
                  </td>

                  <td> 
                  <a href="{{ URL::to('admin/documents/edit',['id'=>$document->id])}}"><button type="button" class="btn btn-box-tool text-green" title="Edit" >
                  <i class="fa fa-edit"></i></button></a>

                   <form method="POST" onclick="return confirm('Are you sure to delete this item?')" action="">
                  <a href="{{ URL::to('admin/documents/delete',['id'=>$document->id])}}"><button type="button"  class="btn btn-box-tool text-red" title="Delete"><i class="fa fa-trash"></i></button></a>
                  </form>
                </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
              {{ $documents->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection