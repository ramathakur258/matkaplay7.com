<script>
	var dataTable =	$('#market-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/market1/list',
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
			
				
				// { "data": "name"},
				{ "data":function(data){
						return data.name+" ("+data.open_time+" - "+data.close_time+")"
				// 			return data.name+" ("+data.result_data")"
					}, "orderable": false
				},

                // { "data":"win_amount"},
				
				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'market1/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a>' 
				// <a href="javascript:void(0)"  onclick=deleteRecord('+"'users/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
				
			}, "orderable": false
		}
             
			]  
		});

</script>