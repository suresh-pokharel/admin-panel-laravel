

<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			 
			<div class="modal modal fade" id="modal-container-27601" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				
				
<div class="modal-dialog">
					<div class="modal-content"></div></div>












				
			</div>
			
		</div>
	</div>
</div>


<script>

			$("a[data-target=#modal-container-27601]").click(function(ev) {
		    ev.preventDefault();
		    var target = $(this).attr("href");


		    $("#modal-container-27601").load(target, function() { 
		         $("#modal-container-27601").modal("show"); 
		    });

		    $("#modal-container-27601").on('hidden', function() {
		    $(this).removeData(); }) 
		});
			
</script>
