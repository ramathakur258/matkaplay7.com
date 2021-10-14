<script>
	var dataTable =	$('#deposite_request-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/deposit_money/list',
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
				{ "data": "mobile_no" }, 
				{ "data":"amount"},
				{ "data":"deposited_amount"},
				// { "data":"deposit_date"},
				{ "data":"description"},
				// { "data":"status"},
			
            	{ "data":function(data){
					
					if(data.status =='PENDING'){
						return '<a href="'+SiteUrl+'deposit_money/add_money/'+data.deposit_request_id+'"><i class="fa fa-plus"></i></a>' 
					}else{
					    return "COMPLETED" 
					}
					}, "orderable": false
					
				},
				
					{ "data":function(data){
					
					
						return '<a href="'+SiteUrl+'deposit_money/edit/'+data.deposit_request_id+'"><i class="fa fa-minus"></i></a>' 

					}, "orderable": false
					
				}
			]  
		});
		
			function ChangeStatus(id,amount,user_id){
			    var amount = amount;
        var i = '#'+id+'change-status'
		var status=$(i).val();
		console.log(status)
		if(status!=null){
			$.ajax({
				url: SiteUrl+"deposite_request/status",
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