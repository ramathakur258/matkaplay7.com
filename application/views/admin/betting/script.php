<script>
	var dataTable =	$('#betting-datatable').DataTable( {
		
			ajax: {
				
				url:SiteUrl+'/betting/list',
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
			
				  { "data":function(data){
				      if(data.type !==null){
				      return data.name+'('+data.type+')'
				      }else{
				         return data.name 
				      }
				  } },
				  
				{ "data": "market_type_name" }, 
				//	{"data":"date"},
					{ "data":function(data){
					    return moment(data.created_at).format('DD MMMM YYYY h:m:s a')
					   //return data.date("d M Y g:i A",strtotime($r->created_at))?></td>
					} },
				{"data":"final"},
				
					
            
                // { "data":"win_amount"},
				
				// { "data":function(data){
				
				
				// return '<a href="'+SiteUrl+'market1/edit/'+data.id+'"><i class="fa fa-pencil-alt"></i></a>' 
				// <a href="javascript:void(0)"  onclick=deleteRecord('+"'users/delete'"+','+data.id+') > <i class="fas fa-trash"></i></a>'
				
// 			}, "orderable": false
// 		}
             
			]  
		});
		
		
		$(document).ready(function(){
       
            $("#datepicker").datepicker({
              
              dateFormat: 'yy-mm-dd'
             
            });
           
      
            var table = $('#betting-datatable').DataTable();

                $('#datepicker').on( 'change', function () {
                    table
                        .search( this.value )
                        .draw();
                } );
        });

</script>