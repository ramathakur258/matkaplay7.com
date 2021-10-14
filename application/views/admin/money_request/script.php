<script>
	var dataTable =	$('#money_request-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/money_request/list',
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
				{ "data": "mobile" }, 
				{ "data":"bank_name"},
				{ "data":"account_number"},
				{ "data":"account_holder_name"},
				{ "data":"ifsc_code"},
				{ "data":"amount"},
                
				   {
					render: function (data, type, row, meta){
						var $select = $("<select class='form-control'size='1' id='"+row.id+"change-status' name='row-1-division'  onchange='ChangeStatus("+row.id+","+row.amount+","+row.user_id+")' ><option disabled value='PENDING'>PENDING</option><option value='COMPLETED'>COMPLETED</option></select>");
						$select.find('option[value="'+row.status+'"]').attr('selected', 'selected');
						return $select[0].outerHTML
                    }
                    },
             
			]  
		});
		
			function ChangeStatus(id,amount,user_id){
			    var amount = amount;
        var i = '#'+id+'change-status'
		var status=$(i).val();
		console.log(status)
		if(status!=null){
			$.ajax({
				url: SiteUrl+"money_request/status",
				method:'POST',
				dataType:"json",
				data:{"id":id,"status":status,"amount":amount,"user_id":user_id},
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