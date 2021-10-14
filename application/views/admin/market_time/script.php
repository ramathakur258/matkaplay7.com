<script>
	var dataTable =	$('#market_time-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/market_time/list',
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
				{ "data": "open_time" }, 
				{ "data": "close_time" }, 
			
				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'market_time/edit/'+data.time_id+'"><i class="fa fa-pencil-alt"></i></a>' 
				// <a href="javascript:void(0)"  onclick=deleteRecord('+"'users/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
				
			}, "orderable": false
		}
             
			]  
		});

</script>