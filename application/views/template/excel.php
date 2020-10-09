<html>
<head>
    <!-- jQuery 3 -->
	<script src="<?=base_url()?>bower_components/jquery/dist/jquery.min.js"></script>
    <style>
        table{
            border:1px solid #000;				
        }
        th,td{
            border:1px solid #000;
        }			
        .text-right{
            align:'right';
        }
    </style>
</head>
<body id="bodyReport" style="display:none">
    <?php
        echo $page_content;
    ?>
    <script>
        $(function(){
            //var iframe = $('#rpt_iframe'); // or some other selector to get the iframe
			var data_type = 'data:application/vnd.ms-excel';
			//var data_type = 'data:application/pdf';
			var table_div = document.getElementById('bodyReport');

			var table_html = table_div.outerHTML.replace(/ /g, '%20');
			table_html = table_html.replace(/#/g,'%23');

            var a = document.createElement('a');
            a.href = data_type + ', ' + table_html;
			//a.download = 'exported_table_' + Math.floor((Math.random() * 9999999) + 1000000) + '.xls';
			a.download = "<?=$file_name?>" + ".xls";
			a.click();    
            window.close();                    			
			//return;
        })
    </script>
</body>
</html>