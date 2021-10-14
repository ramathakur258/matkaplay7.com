<script>
	var dataTable =	$('#market_type-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/market_type/list',
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
			
				  
				{ "data": "market_type_name" }, 
				// { "data":"min_bid_amount"},
                // { "data":"win_amount"},
				{ "data": function (data) {
					return data.min_bid_amount + " KA " + data.win_amount;
				}},
				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'market_type/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a>' 
				// <a href="javascript:void(0)"  onclick=deleteRecord('+"'users/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
				
			}, "orderable": false
		}
             
			]  
		});

</script>