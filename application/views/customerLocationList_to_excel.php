<div>Customer Location</div>
<table id="tblReport" cellpadding="0" cellspacing="0" style="width:1500px">      
	<thead>
		<tr style="background-color:navy;color:white">
			<th style='width:100px'>Kode</th>
			<th style='width:300px'>Name</th>
			<th style='width:300px'>Phone</th>
			<th style='width:500px'>Address</th>
			<th style='width:200px'>Location</th>
		</tr>
	</thead>
	<tbody>
		<?php
			//var_dump($dataReport);
			foreach ($dataReport as $row){
				echo "<tr>";
				echo "<td>$row->fst_cust_code</td>";
				echo "<td>$row->fst_cust_name</td>";
				echo "<td>$row->fst_cust_phone</td>";
				echo "<td>$row->fst_cust_address</td>";
				echo "<td>$row->fst_cust_location</td>";
				echo "</tr>";
			}


		?>
	</tbody>
</table>