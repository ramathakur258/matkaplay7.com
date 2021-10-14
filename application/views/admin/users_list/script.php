<script>
	var dataTable =	$('#users_list-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/users_list/list',
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
				{ "data":"total_deposit"},
                { "data":"total_withdraw"},
		
				// { "data":function(data){
				
				
				// return '<a href="'+SiteUrl+'users_list/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a>' 
			
		  //  	  }, "orderable": false
	   //  	    },
	
			]  
		});


	

</script>