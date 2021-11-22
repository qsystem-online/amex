$(function(){
    //init datetime picker
    $(".datepicker").datepicker({
        format: DATEPICKER_FORMAT
    });

    if (typeof $('.money').inputmask =="function"){
        alert("init money");
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