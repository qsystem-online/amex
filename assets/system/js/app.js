$(function(){
    //init datetime picker
    if (typeof $(".datepicker").datepicker === "function") { 
        $(".datepicker").datepicker({
            format: DATEPICKER_FORMAT
        });
    }

    if (typeof $(".select2").select2 === "function") { 
        $(".select2").select2();
    };

    if (typeof $('.icheck').iCheck === "function") {
        $('.icheck').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass   : 'iradio_minimal-blue'
        })
    }
    if (typeof $('.money').inputmask =="function"){
		$(".money").inputmask({
			alias: 'numeric',
			autoGroup: true,
			groupSeparator: ",",
			radixPoint: ".",
			allowMinus: true,
			autoUnmask: true,
			digits: 2
		});
    }
    
    
    

});

//Format data dari ajax ke format datepicker, setting di config.js
function dateFormat(strDate){
    var result = moment(strDate,'YYYY-MM-DD').format(DATEPICKER_FORMAT_MOMENT);
    return result;
}

function blockUIOnAjaxRequest(message){
		
    if (typeof message == "undefined"){
        message = "<h5><img src='" + SITE_URL + "assets/system/images/loading.gif'> Please wait ... !</h5>";
    }

    $(document).ajaxStart(function() {
        $.blockUI({ message:message});
    });

    $(document).ajaxStop(function() {
        $.unblockUI();
        $(document).unbind('ajaxStart');
    });
}