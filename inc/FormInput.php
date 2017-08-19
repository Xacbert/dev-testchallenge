<form method='post' action='index.php' accept-charset="UTF-8" enctype="multipart/form-data">
	<input type='hidden' name='action' value='UPLOAD'>
	<br>
	<div class="row">
  		<div class="col-md-6 col-md-offset-3">

  					<ul class="nav nav-tabs">
					  <li role="presentation" class="active"><a href="index.php">Data</a></li>
					  <li role="presentation"><a href="index.php?action=REPORT">Report</a></li>
					</ul>

					<br>

		  			<div class="panel panel-default">
  						<div class="panel-heading text-center">UPLOAD DATA</div>
						<div class="panel-body">


							 <div class="form-group">
							 	<label for="InputFile">File input</label>
							 	<input type='file' name='file' id='InputFile'>
							 </div>
							<button  class="btn btn-default"  type="submit">Send</button>

						</div>
					</div>



  		</div>
	</div>


</form>