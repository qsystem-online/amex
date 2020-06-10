<!DOCTYPE html>
<html>
	<head>		
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>Return Order</title>
		<!-- Tell the browser to be responsive to screen width -->
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<!-- Bootstrap 3.3.7 -->
		<link rel="stylesheet" href="<?=base_url()?>bower_components/bootstrap/dist/css/bootstrap.min.css">
		<!-- Font Awesome -->
		<link rel="stylesheet" href="<?=base_url()?>bower_components/font-awesome/css/font-awesome.min.css">
		<!-- bootstrap wysihtml5 - text editor -->
		<link rel="stylesheet" href="<?=base_url()?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		
		<!-- jQuery 3 -->
		<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>				
		<!-- CONFIG JS -->
		<script src="<?=base_url()?>assets/system/js/config.js"></script>
		<!-- APP JS -->
		<script src="<?=base_url()?>assets/system/js/app.js"></script>
		<style>
			.block{
				display:inline-block;
			}

		</style>
	</head>
	<body>
		<div class="container-fluid" style="max-width:1024px"> 			
			<div class="row">
				<div class="col-xs-12 text-center">
					<h3><b>BUKTI TANDA TERIMA BARANG RETUR</b></h3>
				</div>
			</div>
			<div class="row" style="margin-top:20px">
				<div class="col-xs-12 text-right">
					<label class="block text-left" style="width:100px;">No. Booking</label>
					<label class="block" style="width:10px;">:</label>                    
					<span class="block" style="width:200px;"><?=$header["fst_return_id"]?></span>
				</div>	
			</div>
			<div class="row" style="margin-top:20px">
				<div class="col-xs-12">
					<label class="block" style="width:100px;">Pelanggan</label>
					<label class="block" style="width:10px;">:</label>                    
					<span><?=$header["fst_cust_name"]?></span>
				</div>
							
			</div>
			<div class="row">
				<div class="col-xs-12">
					<label class="block" style="width:100px;">Sales</label>
					<label class="block" style="width:10px;">:</label>                    
					<span><?=$header["fst_sales_name"]?></span>
				</div>				
			</div>
			<div class="row" style="margin-top:20px">
				<div class="col-xs-12" >
					<label class="block text-left" style="width:100px;">Tanggal</label>
					<label class="block" style="width:10px;">:</label>                    
					<span class="block" style="width:200px;"><?= date("d-M-Y",strtotime($header["fdt_return_datetime"]))?></span>
				</div>				
			</div>
			
			<div class="row" style="margin-top:20px">
				<div class="col-xs-12">
					<table class="table table-bordered table-condensed" style="width:100%">
						<thead>
							<tr>
								<th class="text-center active">QTY</th>
								<th class="text-center active">SATUAN</th>
								<th class="text-center active">NAMA / SPESIFIKASI BARANG</th>
								<th class="text-center active">KETERANGAN</th>
							</tr>
						</thead>
						<tbody>
							<?php
								foreach($details as $detail){
									echo "<tr>
										<td class='text-center'>$detail->fin_qty</td>
										<td class='text-center'>$detail->fst_satuan</td>
										<td class=''>$detail->fst_item_name</td>
										<td class=''>$detail->fst_item_notes</td>										
									</tr>";
								}
							?>							
						</tbody>
						<tfoot>
							<tr>
								<td colspan=4><?=$header["fst_notes"]?></td>
							</tr>
						</tfoot>
					</table>
					
				</div>				
			</div>
		</div>
		<!-- Bootstrap 3.3.7 -->
		<script src="<?=base_url()?>bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="<?=base_url()?>plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>		
		<script src="<?=base_url()?>dist/js/app.js"></script>	
	</body>
</html>