
@extends('admin.layout')
@section('content')

<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   <section class="content-header">
  <div class="row">
     <div class="col-md-8">
        <h4><strong>Admin Accounts</strong></h4>
      
    </div>
    <div class="col-md-4">
        
        <!--  <a href="{{ URL::to('admin/unapproved_accounts/create') }}" class="btn btn-success btn-sm pull-right">Add New unapproved_account</a> -->
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
                  <th>User's Fullname</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Role</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($unapproved_accounts as $unapproved_account)
                <tr>
                  <td>{{$unapproved_account->fullname}}</td>
                  <td>{{$unapproved_account->email}}</td>
                  <td>{{$unapproved_account->phone}}</td>
                  <td>{{$unapproved_account->role}}</td>
                  <td> 
                  


                   <a href="{{ URL::to('admin/approve',['id'=>$unapproved_account->id])}}">
                   @if($unapproved_account->verified=='1')
                   <button type="button" class="btn btn-box-tool text-blue" title="Click to unapprove"><i class="fa fa-check"></i></button>
                   @else
                   <button type="button" class="btn btn-box-tool text-black" title="Click to Approve"><i class="fa fa-times"></i></button>
                   @endif
                   </a>

                </td>
                </tr>
                @endforeach
                </tbody>
               
              </table>
              {{ $unapproved_accounts->links() }}
            </div>
            <!-- /.box-body -->
          </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @endsection