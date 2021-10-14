<script>
	var dataTable =	$('#result-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/result/dummy_list',
				type:'POST',
				datatype:'json',
			
				
			},
		
			"pageLength":10,
			"pagingType": "full_numbers",
			"searching": true,
			"info": false,
			"lengthChange": false,
			"processing": true,
			"ordering": true,
			"serverSide": true,
            "columns": [ 
			
				  
				{ "data": "name" }, 
				{ "data": "type" }, 
				{ "data": "result_digit" }, 
			
				{ "data": "sum" }, 
	   //     	{ "data": function (data) {
	        	    
	   //     	    if(data.close_digit_sum == null){
	   //     	        var c_sum = "*";
	   //     	    }else{
	   //     	        var c_sum = data.close_digit_sum;
	   //     	    }
	   //     	     if(data.close_result_digit == null){
	   //     	        var c_digit = "***";
	   //     	    }else{
	   //     	        var c_digit = data.close_result_digit;
	   //     	    }
	   //     	     if(data.open_result_digit == null){
	   //     	        var o_digit = "***";
	   //     	    }else{
	   //     	        var o_digit = data.open_result_digit;
	   //     	    }
	   //     	     if(data.open_digit_sum == null){
	   //     	        var o_sum = "*";
	   //     	    }else{
	   //     	        var o_sum = data.open_digit_sum;
	   //     	    }
	        	    
	        	    
				// 	return o_digit +" "+ o_sum + c_sum +" "+ c_digit ;
				// }},
//{ "data": "close_time" }, 
			
			//	{ "data":function(data){
				
				
// 				return '<a href="'+SiteUrl+'market_time/edit/'+data.time_id+'"><i class="fa fa-pencil-alt"></i></a>' 
			
// 			}, "orderable": false
		//}
             
			]  
		});

</script>