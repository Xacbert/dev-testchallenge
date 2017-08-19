<?php

	$mysqli = new mysqli($DB_host, $DB_user, $DB_pass, $DB_bbdd);


	/**** Mes ****/
	$SqlMes="select SelectedMonth, sum(records) as records
			from  (
					select distinct(date_format(selected_date,'%Y-%m')) as SelectedMonth, count(a.title) as records
					from
						(select adddate('1970-01-01',t4*10000 + t3*1000 + t2*100 + t1*10 + t0) selected_date from
						(select 0 t0 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t0,
						(select 0 t1 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t1,
						(select 0 t2 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t2,
						(select 0 t3 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t3,
						(select 0 t4 union select 1 union select 2 union select 3 union select 4 union select 5 union select 6 union select 7 union select 8 union select 9) t4)
					v, ".$DB_table." a
					where selected_date
							between (select min(init_date) from ".$DB_table.")
							and (select max(expiry_date) from ".$DB_table.")
						and selected_date between a.init_date and a.expiry_date
					group by selected_date
			) t
			group by SelectedMonth";
	$ResMes=$mysqli->query($SqlMes);

	while($row = $ResMes->fetch_array()){
		$CsrMes[] = $row;
	}
	/**** Mes ****/

	/**** Merchant ****/
	$SqlMerchant="select name, count(title) as records
				from ".$DB_table."
				group by name";
	$ResMerchant=$mysqli->query($SqlMerchant);

	while($row = $ResMerchant->fetch_array()){
			$CsrMerchant[] = $row;
	}
	/**** Merchant ****/

	$mysqli->close();


?>


<br>
	<div class="row">
  		<div class="col-md-6 col-md-offset-3">

  					<ul class="nav nav-tabs">
					  <li role="presentation" ><a href="index.php">Data</a></li>
					  <li role="presentation" class="active"><a href="index.php?action=REPORT">Report</a></li>
					</ul>

					<br>

		  			<div class="panel panel-default">
  						<div class="panel-heading text-center">REPORT</div>
						<div class="panel-body">



							<div class="panel panel-default">
  								<div class="panel-heading text-center">Mes</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<td>Mes</td>
											<td>Productos</td>
										</thead>
										<?php
											for ($i=0;$i<sizeof($CsrMes);$i++){
												echo "<tr>";
												echo "<td>".$CsrMes[$i]['SelectedMonth']."</td>";
												echo "<td>".$CsrMes[$i]['records']."</td>";
												echo "</tr>";
											}
										?>
									</table>
								</div>
							</div>



							<div class="panel panel-default">
  								<div class="panel-heading text-center">Merchant</div>
								<div class="panel-body">
									<table class="table">
										<thead>
											<td>Merchant</td>
											<td>Productos</td>
										</thead>
										<?php
											for ($i=0;$i<sizeof($CsrMerchant);$i++){
												echo "<tr>";
												echo "<td>".$CsrMerchant[$i]['name']."</td>";
												echo "<td>".$CsrMerchant[$i]['records']."</td>";
												echo "</tr>";
											}
										?>
									</table>
								</div>
							</div>


						</div>
					</div>



  		</div>
	</div>