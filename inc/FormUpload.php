<?php

	$cont=0;

	if (isset($_FILES['file'])){

		$handle = fopen($_FILES['file']['tmp_name'], "r");

		if ($handle) {
			$mysqli = new mysqli($DB_host, $DB_user, $DB_pass, $DB_bbdd);

			while (($buffer = fgets($handle, 4096)) !== false) {
				if ($cont>0){
					$data=array();
					$data=explode("\t", $buffer);

					$title		=trim($data[0]);
					$description=trim($data[1]);
					$price		=$data[2];
					$init		=$data[3];
					$expiry		=$data[4];
					$address	=trim($data[5]);
					$name		=trim($data[6]);

					$init	=str_replace('T',' ',$init);
					$expiry	=str_replace('T',' ',$expiry);


					$ins="insert into ".$DB_table." (
								title,
								description,
								price,
								init_date,
								expiry_date,
								address,
								name
							)values(
								'".addslashes($title)."',
								'".addslashes($description)."',
								'".$price."',
								CONVERT_TZ(SUBSTR('".$init."',1,19),'+00:00',SUBSTR('".$init."',20)),
								CONVERT_TZ(SUBSTR('".$expiry."',1,19),'+00:00',SUBSTR('".$expiry."',20)),
								'".addslashes($address)."',
								'".addslashes($name)."'
							)";
					$mysqli->query($ins);

					if ($mysqli->error!=""){
						echo $ins." :: ".$mysqli->error."<br><br>";
					}
				}

				$cont++;
			}
			if (!feof($handle)) {
				echo "Error: unexpected fgets() fail\n";
			}
			fclose($handle);

			$mysqli->close();
		}
	}
?>

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

							<?php echo ($cont-1) ?> records processed
							<br><br>
							<a href='index.php'button  class="btn btn-default"  type="submit">Back</a>

						</div>
					</div>



  		</div>
	</div>