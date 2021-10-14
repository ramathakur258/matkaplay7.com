

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Market Time</li>
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
               <?php foreach($result_data as $m) { ?>
               
                        <form method="post" action="<?php echo base_url('admin/result/edit')?>">
              <div class="result-newbox">
                  <div class="lefttitle">
                     <?php echo $m->market_name;?>(<?php echo $m->time;?>)<input type="hidden" name="market_id" value="<?php echo $m->type; echo"-"; echo $m->market_id; ?>">
                  </div>
                  <!--<div class="rightclose-open">-->
                  <!--    CLOSE-->
                  <!--</div>-->
                  
                  <div class="inputresult">
                     
                      <input type="text" placeholder="Result Digit" name="result_digit" value="<?php if(!empty($m->result_digit)){ if($m->result_digit == 0) {echo "0";}else{echo $m->result_digit; }}?>">
                  </div>
                   <div class="inputresult1">
                      
                       <input type="text" placeholder="Sum" name="result_digit_sum" value="<?php if(!empty($m->sum)){ if($m->sum ==0){ echo "0";}else{ echo $m->sum; } }?>">
                  </div>
                  <button type="submit" class="submitbtnresult">Submit</button>
              </div>
              </form>
                       <?php } ?>
              
              <!--<div class="result-newbox">-->
              <!--    <div class="lefttitle">-->
              <!--         DHANKUBER MORNING OPEN(10:30 AM)-->
              <!--    </div>-->
              <!--    <div class="rightclose-open">-->
              <!--        CLOSE-->
              <!--    </div>-->
                  
              <!--    <div class="inputresult">-->
              <!--        <input type="text" placeholder="Result Digit"/>-->
              <!--    </div>-->
              <!--     <div class="inputresult1">-->
              <!--        <input type="text" placeholder="Sum"/>-->
              <!--    </div>-->
              <!--    <button type="submit" class="submitbtnresult">Submit</button>-->
              <!--</div>-->
              
          </div>
          <div class="col-12">
          <div class="card desktop-result">
          <div class="card-header">
          <div class="text-right">
          <!--<a class="btn btn-primary" href="<?php echo admin_url('result/edit');?>">Add</a>-->
          </div>
               
              </div>
            
              
             <!--   <div class="card-header">
              <h3 class="card-title">Striped Full Width Table</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped" id="result-datatable">
                  <thead>
                    <tr>
                      <!--<th >Name</th>-->
                      <!--<th>Result</th>-->
                      <th>Name</th>
                       <th>Type</th>
                      <th>Result Digit</th>
                      <th>Sum</th>
                      <th>Submit</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                <tbody>
                        <?php foreach($result_data as $m) { ?>
                      <?php   //print_r($result_data); die; ?>
                        <form method="post" action="<?php echo base_url('admin/result/edit')?>">
                       <tr>
                           <td> <?php echo $m->market_name;?>(<?php echo $m->time;?>)<input type="hidden" name="market_id" value="<?php echo $m->type; echo"-"; echo $m->market_id; ?>"></td>
                           <td><?php echo $m->type; ?></td> 
                        <td><input type="text" name="result_digit" value="<?php if(!empty($m->result_digit)){ if($m->result_digit == 0) {echo "0";}else{echo $m->result_digit; }}?>"></td>
                        <td><input type="text" name="result_digit_sum" value="<?php if(!empty($m->sum)){ if($m->sum ==0){ echo "0";}else{ echo $m->sum; } }?>"></td>
                          <td><button type="submit" class="btn btn-primary">submit</button></td>
                       </tr>
                       </form>
                       <?php } ?>
                  </tbody
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>




          </div>
        </div>
    </div>
</section>

