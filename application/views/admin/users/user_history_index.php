<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users history</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <?php 
				if(!empty($this->session->flashdata('alert'))){ ?>
				<span id="flash-messages" width="20px"><?php	print_r($this->session->flashdata('alert'));  ?> </span> <?php } ?>

<section class="content">
    <div class="container-fluid">
        <div class="row">
          <div class="col-12">
          <div class="card">
          <div class="card-header">
          <div class="text-right">
          </div>
               
              </div>
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped" id="user_history-datatable">
                  <thead>
                    <tr>
                      <th>Game Id</th>
                      <th>Market Name</th>
                      <!--<th>User Name</th>-->
                      <th>Game Name</th>
                      <th>Bid Number</th>
                      <th>Bid Amount</th>
                      <th>Game Status</th>
                      <th>Won Amount</th>
                      <th>Date</th>
                    </tr>
                  </thead>
                  <tbody>
                      <?php foreach($records as $record){ 
                      
                      //print_r($records); die;?>
                      
                    <tr>
                          <td><?php echo $record->all_game_id;?></td>
             <td><?php echo $record->market_name;?><?php if(!empty($record->type)){ echo "(".$record->type. ")";} ?></td>
                       
                        <td><?php echo $record->game_name;?></td>
                        <td><?php echo $record->bid_number;?></td>
                        <td><?php echo $record->bid_amount;?></td>
                        <td><?php echo $record->game_status;  
                         if($record->game_status){
                         echo "<br>";   echo date("g:i:A",strtotime($record->updated_at));
                         }
                         ?></td>
                        <td><?php echo $record->won_amount; 
                        if($record->won_amount){
                         echo "<br>";   echo date("g:i:A",strtotime($record->updated_at)); 
                        }
                        ?></td>
                        <td><?php echo date("d M Y",strtotime($record->created_at));?>
                        
                        <?php echo "<br>"; echo date("g:i:A",strtotime($record->created_at)); ?>
                        
                        </td>
                    </tr>
                    <?php } ?>
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div>
        </div>
    </div>
</section>

