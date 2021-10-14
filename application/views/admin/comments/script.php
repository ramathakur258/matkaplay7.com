<script>
	var dataTable =	$('#comments-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/comments/list',
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
			
				  
				{ "data": "user_id" }, 
				{ "data":"msg"},
			 //   { "data" :"created_at"},
					{ "data":function(data){
					    return moment(data.created_at).format('DD MMMM YYYY h:MM a')
					   //return data.date("d M Y g:i A",strtotime($r->created_at))?></td>
					} },
				
				// { "data": function(data){
				// 	    return moment(data.created_at).format('DD MMMM YYYY')
				// } },	
				
			
				// { "data":"status"},
				// { "data":function(data){
				
				
				// return '<a href="'+SiteUrl+'notice_board/edit/'+data.fourm_id+'"><i class="fa fa-pencil-alt"></i></a>' 
				// // <a href="javascript:void(0)"  onclick=deleteRecord('+"'users/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
		  //  	  }, "orderable": false
	   //  	    },
				// { "data":function(data){
						
				// 		return '<a href="'+SiteUrl+'users/add_money/'+data.id+'"><i class="fa fa-plus"></i></a>' 
						
				// 	}, "orderable": false
				// }
             
			]  
		});
</script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>