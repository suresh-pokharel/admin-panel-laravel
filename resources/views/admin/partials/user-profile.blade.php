	<div class="modal-dialog">
		<div class="modal-content">
				<div class="modal-header">	 
					<button type="button" class="close" data-dismiss="modal">×</button>
					<h4 class="modal-title" id="myModalLabel" style="align:center">
					<ul class="nav navbar-nav">
						{{Auth::user()->fullname}} - {{Auth::user()->role}}
					</ul>
					</h4>
				</div>
				<div class="modal-body">
					<div class="box-body box-profile">
					      <img class="profile-user-img img-responsive img-circle" src="{{url(Auth::user()->image)}}" alt="User profile picture">
					      <h3 class="profile-username text-center">{{Auth::user()->fullname}}</h3>
					      <p class="text-muted text-center"><i class="fa fa-phone margin -r 5"></i>{{Auth::user()->phone}}</p>
					      <p class="text-muted text-center"><i class="fa fa-envelope margin -r 5"></i>{{Auth::user()->email}}</p>

					    <hr>

					    <strong><i class="fa fa-file-text-o margin-r-5"></i> Bio: </strong>
					     <p>{{Auth::user()->bio}}</p>
				    </div>
				</div>
				<div class="modal-footer">
					<a class="pull-left" href="{{ url('admin/user/edit')}}">Edit Profile</a>
	                <!-- <button type="button" class="btn btn-primary pull-left">Edit Profile</button> -->
	                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
              	</div>
		</div>
				
	</div>