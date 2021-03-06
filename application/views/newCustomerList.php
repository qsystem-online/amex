<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!-- <link rel="stylesheet" href="<?=base_url()?>bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css"> -->
<link rel="stylesheet" href="<?=base_url()?>bower_components/datatables.net/datatables.min.css">
<style>
#map {
	height: 300px;
}
</style>


<section class="content-header">
	<h1><?=$page_name?><small>List</small></h1>
	<ol class="breadcrumb">
		<?php 
			foreach($breadcrumbs as $breadcrumb){
				if ($breadcrumb["link"] == NULL){
					echo "<li class='active'>".$breadcrumb["title"]."</li>";
				}else{
					echo "<li><a href='".$breadcrumb["link"]."'>".$breadcrumb["icon"].$breadcrumb["title"]."</a></li>";
				}
				
			} 
		?>
	</ol>
</section>

<section class="content">
	<div class="row">
		<div class="col-md-12">
			<div class="box box-info">
				<div class="box-header with-border">
					<h3 class="box-title"><?=$list_name?></h3>
					<div class="box-tools">						
					</div>
				</div> <!-- /.box-header -->	
			
				<div class="box-body">
					<div align="right" style="margin-bottom:10px">
						<select id="filterAllStatus">
							<option value="0">Need Approval</option>
							<option value="1">ALL Status</option>
						</select>
					</div> 

					<div align="right">
						<span>Search on:</span>
						<span>
							<select id="selectSearch" name="selectSearch" style="width: 148px;background-color:#e6e6ff;padding:8px;margin-left:6px;margin-bottom:6px">                            
								<?php
									foreach($arrSearch as $key => $value){ ?>
										<option value=<?=$key?>><?=$value?></option>
									<?php
									}
								?>
							</select>
						</span>
					</div>
					<table id="tblList" class="table table-bordered table-hover table-striped"></table>
				</div><!-- /.box-body -->
				
				<div class="box-footer">
				</div><!-- /.box-footer -->					
			</div>
		</div>
	</div>
</section>


<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
	<div class="modal-dialog" >
		<!-- Modal content-->
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body" style="height:100px">
				<textarea id="fst_approval_notes" style="width:100%;height:100%"></textarea>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-primary" id="btnSubmitApprove">Approve</button>
				<button type="button" class="btn btn-primary" id="btnSubmitReject">Reject</button>
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div id="myMapModal" class="modal fade" role="dialog">
	<div class="modal-dialog" >
		<!-- Modal content-->
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Modal Header</h4>
			</div>
			<div class="modal-body" style="height:300px">
				<div id="map"></div>
			</div>
			<div class="modal-footer">				
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>


<!-- Modal Detail Info -->
<div id="myModalDetail" class="modal fade" role="dialog">
	<div class="modal-dialog" >
		<!-- Modal content-->
		<div class="modal-content" >
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal">&times;</button>
				<h4 class="modal-title">Detail Info</h4>
			</div>

			<div class="modal-body" style="height:220px">
				
				<div class="form-group">															
					<label for="fst_cust_name" class="col-md-2 control-label"><?=lang("Name")?></label>	
					<div class="col-md-10">	
						<label class="control-label">:</label>			
						<label id="fst_cust_name" style="font-weight:unset">Name</label>									
					</div>
				</div>

				<div class="form-group">															
					<label for="fst_contact" class="col-md-2 control-label"><?=lang("Contact")?></label>	
					<div class="col-md-10">				
						<label class="control-label">:</label>			
						<label id="fst_contact" style="font-weight:unset">Contact</label>									
					</div>
				</div>

				<div class="form-group">															
					<label for="fst_cust_phone" class="col-md-2 control-label"><?=lang("Phone")?></label>	
					<div class="col-md-10">				
						<label class="control-label">:</label>
						<label id="fst_cust_phone" style="font-weight:unset">Phone</label>
					</div>
				</div>

				<div class="form-group">															
					<label for="fst_kelurahan" class="col-md-2 control-label"><?=lang("Kelurahan")?></label>	
					<div class="col-md-10">				
						<label class="control-label">:</label>
						<label id="fst_kelurahan" style="font-weight:unset">Kelurahan</label>
					</div>
				</div>
				
				<div class="form-group">															
					<label for="fst_kecamatan" class="col-md-2 control-label"><?=lang("Kecamatan")?></label>	
					<div class="col-md-10">				
						<label class="control-label">:</label>
						<label id="fst_kecamatan" style="font-weight:unset">Kecamatan</label>
					</div>
				</div>

				<div class="form-group">															
					<label for="fst_cust_address" class="col-md-2 control-label"><?=lang("Address")?></label>	
					<div class="col-md-10">				
						<label class="control-label">:</label>
						<label id="fst_cust_address" style="font-weight:unset"></label>
					</div>
				</div>

				<div class="form-group">															
					<label for="fbl_is_pasar" class="col-md-2 control-label"><?=lang("Pasar")?></label>	
					<div class="col-md-10">				
						<label class="control-label">:</label>
						<label id="fbl_is_pasar" style="font-weight:unset"></label>
					</div>
				</div>

				<div class="form-group">															
					<label for="fst_company_code" class="col-md-2 control-label"><?=lang("Company")?></label>	
					<div class="col-md-10">				
						<label class="control-label">:</label>
						<label id="fst_company_code" style="font-weight:unset"></label>
					</div>
				</div>




			</div>

			<div class="modal-footer">				
				<button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>



<script type="text/javascript">
	var selectedRecordId;
	var selectedRecord;
	var marker;
	var map;

	$(function(){	     
		$("#filterAllStatus").change(function(e){
			t = $("#tblList").DataTable();
			t.draw();

		});

		$('#tblList').on('preXhr.dt', function ( e, settings, data ) {
		 	//add aditional data post on ajax call
			 //data.sessionId = "TEST SESSION ID";
			 data.optionSearch = $('#selectSearch').val();
			 data.optionIsAllStatus = $('#filterAllStatus').val();
		}).DataTable({
			columns:[
                <?php
                    foreach($columns as $col){?>
                        {"title" : "<?=$col['title']?>","width": "<?=$col['width']?>","data":"<?=$col['data']?>"
                            <?php if(isset($col['render'])){?>
                                ,"render":<?php echo $col['render'] ?>
                            <?php } ?>
                            <?php if(isset($col['sortable'])){
                                if ($col['sortable']){ ?>
                                    ,"sortable": true
                                <?php }else
                                {?>
                                    ,"sortable": false
                                <?php }
                                
                            } ?>
                            <?php if(isset($col['className'])){?>
                                ,"className":"<?=$col['className']?>"
                            <?php } ?>
                        },
                    <?php }
                ?>
			],
			dataSrc:"data",
			processing: true,
			serverSide: true,
			ajax: "<?=$fetch_list_data_ajax_url?>"
		}).on('draw',function(){
		});

		
		

		$('#tblList').on('click','.btn-approve',function(e){
			t = $("#tblList").DataTable();
			var trRow = $(this).parents('tr');			
			selectedRecord = trRow;

			row = t.row(selectedRecord).data();
			selectedRecordId = row.fin_id;
			$("#myModal").modal("show");
		});

		
		$('#tblList').on('click','.btn-map',function(e){	
			t = $("#tblList").DataTable();
			var trRow = $(this).parents('tr');			
			selectedRecord = trRow;
			row = t.row(selectedRecord).data();
			selectedRecordId = row.fin_id;

			arrLocation = row.fst_cust_location.split(',');
			markerLocation = {lat: parseFloat(arrLocation[0]), lng: parseFloat(arrLocation[1])};
			addMarker(markerLocation);
			$("#myMapModal").modal("show");
		});

		$('#tblList').on('click','.btn-detail',function(e){	
			t = $("#tblList").DataTable();
			var trRow = $(this).parents('tr');			
			selectedRecord = trRow;
			row = t.row(selectedRecord).data();
			
			$("#fst_cust_name").text(row.fst_cust_name);
			$("#fst_contact").text(row.fst_contact);
			$("#fst_cust_phone").text(row.fst_cust_phone);
			$("#fst_kecamatan").text(row.fst_kecamatan);
			$("#fst_kelurahan").text(row.fst_kelurahan);
			$("#fst_cust_address").text(row.fst_cust_address);
			$("#fbl_is_pasar").text(row.fbl_is_pasar);
			$("#fst_company_code").text(row.fst_company_code);

			$("#myModalDetail").modal("show");
			
			/*
					: "1"
					fin_id: "455"
					fst_active: "A"
					fst_appid: "JB1"
					fst_approval_notes: null
					fst_company_code: ",_GP,_SS,_FN"
					: "Devi Bastian"
					: "perum puri permata ↵blok F no 11 tangerang"
					fst_cust_location: "-6.1835987,106.6775603"
					
					: "0811953296"
					: "cipondoh makmur"
					: "cipondoh"
					fst_request_id: null
					fst_sales_code: "_GPJB1,_SSSJB1,_FNJB1"
					fst_sales_name: "JB1
					↵SJB1
					↵JB1
					↵"
					fst_status: "NEED APPROVAL"
				*/
			
			console.log(row);
		});


		

		$("#btnSubmitApprove").click(function(e){
			e.preventDefault();
			submitApproval(selectedRecordId,true);
		});
		$("#btnSubmitReject").click(function(e){
			e.preventDefault();
			submitApproval(selectedRecordId,false);
		});

	});

	function submitApproval(id,isApproved){
		data = {
			<?=$this->security->get_csrf_token_name()?> : "<?=$this->security->get_csrf_hash()?>",
			fin_id: id,
			isApproved : isApproved,
			fst_approval_notes : $("#fst_approval_notes").val()
		};

		$.ajax({
			url:"<?= site_url()?>new_customer/do_approval",
			data:data,
			method:"POST"
		}).done(function(resp){
			console.log(resp);
			if (resp.status == "SUCCESS"){
				t = $("#tblList").DataTable();
				t.row(selectedRecord).remove().draw();
				$("#myModal").modal("hide");
			}
		});
	}

	function initMap() {		
        var myLatLng = {lat: -6.1842827, lng: 106.6746338};
        map = new google.maps.Map(document.getElementById('map'), {
            zoom: 10,
            center: myLatLng
        });
		marker = new google.maps.Marker({
			position: myLatLng,
			map: map,
			label: 'A',
			title: 'customer'
		});

	}

	function addMarker(location){
		//myLatLng = {lat: parseFloat(v.fst_lat), lng: parseFloat(v.fst_log)};
		try{
			//marker.setMap(null);
		}catch(err){

		}
		marker.setPosition(location);
		
		map.setCenter(location);    
	}




</script>
<!-- DataTables -->
<script src="<?=base_url()?>bower_components/datatables.net/datatables.min.js"></script>
<!--
<script src="<?=base_url()?>bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>bower_components/datatables.net/js/datetime.js"></script>
<script src="<?=base_url()?>bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
-->
<script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCN8-AYGQU5NGopLLCQaqXmvwty4jHEpC0&callback=initMap"></script>