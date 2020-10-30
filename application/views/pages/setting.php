<section class="content-header">
	<h1><?=lang("Configuration")?><small><?=lang("form")?></small></h1>
	<ol class="breadcrumb">
		<li><a href="#"><i class="fa fa-dashboard"></i> <?= lang("Home") ?></a></li>
		<li><a href="#"><?= lang("Config") ?></a></li>
		<li class="active title"><?=$title?></li>
	</ol>
</section>

<section class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="box box-info">
				<div class="box-header with-border">
				<h3 class="box-title title"><?=$title?></h3>				
			</div>
			<!-- end box header -->
			
			<!-- form start -->
            <form id="frmUser" class="form-horizontal"  method="POST" >
				<div class="box-body">
					<input type="hidden" name = "<?=$this->security->get_csrf_token_name()?>" value="<?=$this->security->get_csrf_hash()?>">
                    <div class='form-group'>
                        <label class="col-sm-3"><?=lang("Min Order Per transaction")?></label>
						<div class="col-sm-9">
							<input type="text" class="setting-value form-control money text-right" id="fdb_min_order" placeholder="<?=lang("Min Order")?>" name="min_order" value="<?=getDbConfig('min_order')?>">
						</div>
                    </div>					
				</div>
				<!-- end box-body -->
				<div class="box-footer">
					
				</div>
				<!-- end box-footer -->			
			</form>
		</div>
	</div>
</section>
<script type="text/javascript" info="event">
    $(".setting-value").change(function(e){
        e.preventDefault();
        blockUIOnAjaxRequest();
        $.ajax({
            url:"<?=site_url()?>setting/ajxChangeValue",
            data:{
                name:$(this).attr("name"),
                value:$(this).val()
            },
            method:"GET"        
        }).done(function(resp){
            if (resp.messages != ""){
                alert(resp.messages);
            }
            
        });
    });
</script>