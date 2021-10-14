<script>
	var dataTable =	$('#market-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/market/list',
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
			
				  
				{ "data": "market_name" }, 
				{ "data":"time"},
                // { "data":"win_amount"},
				
				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'market/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a>' 
				// <a href="javascript:void(0)"  onclick=deleteRecord('+"'users/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
				
			}, "orderable": false
		}
             
			]  
		});

</script>