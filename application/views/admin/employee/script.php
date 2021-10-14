<script>
	var dataTable =	$('#employee-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/employee/list',
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
				{ "data":"user_name"},
                { "data":"mobile"},
				// { "data":"status"},

                {
					render: function (data, type, row, meta){
						var $select = $("<select class='form-control'size='1' id='"+row.id+"change-status' name='row-1-division'  onchange='ChangeStatus("+row.id+")' ><option value='ACTIVE'>ACTIVE</option><option value='BLOCK'>BLOCK</option></select>");
						$select.find('option[value="'+row.status+'"]').attr('selected', 'selected');
						return $select[0].outerHTML
                    }
                    },



				{ "data":function(data){
				
				
				return '<a href="'+SiteUrl+'employee/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a>' 
				// <a href="javascript:void(0)"  onclick=deleteRecord('+"'users/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
		    	  }, "orderable": false
	     	    },
				// { "data":function(data){
						
				// 		return '<a href="'+SiteUrl+'users/add_money/'+data.id+'"><i class="fa fa-plus"></i></a>' 
						
				// 	}, "orderable": false
				// }
             
			]  
		});


		function ChangeStatus(id){
        var i = '#'+id+'change-status'
		var status=$(i).val();
		console.log(status)
		if(status!=null){
			$.ajax({
				url: SiteUrl+"employee/status",
				method:'POST',
				dataType:"json",
				data:{"id":id,"status":status},
				success: function(result){
					
					if(result.status=="success"){
						location.reload();
					}else{
						
						$.notify(result.message, "error");
					}                            
				}
			});
		}else{
			$.notify("Please Select Status", "error");
		}
   
}

</script>