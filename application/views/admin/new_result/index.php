

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
          <div class="card">
          <div class="card-header">
          <div class="text-right">
          <!--<a class="btn btn-primary" href="<?php echo admin_url('new_result/edit');?>">Add</a>-->
          </div>
               
              </div>
             <!--   <div class="card-header">
              <h3 class="card-title">Striped Full Width Table</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped" id="new_result-datatable">
                  <thead>
                    <tr>
                      <!--<th >Name</th>-->
                      <!--<th>Result</th>-->
                      <th>Name</th>
                       <th>Type</th>
                      <th>Result Digit</th>
                      <th>Sum</th>
                      <th>submit</th>
                    
                    </tr>
                  </thead>
                  <tbody>
                        <?php foreach($result_data as $m) { ?>
                        <form method="post" action="<?php echo base_url('admin/new_result/edit')?>">
                       <tr>
                           <td> <?php echo $m->market_name;?>(<?php echo $m->time;?>)<input type="hidden" name="market_id" value="<?php echo $m->type; echo"-"; echo $m->market_id; ?>"></td>
                           <td><?php echo $m->type; ?></td> 
                        <td><input type="text" name="result_digit" value="<?php if(!empty($m->result_digit)){echo $m->result_digit; }?>"></td>
                        <td><input type="text" name="result_digit_sum" value="<?php if(!empty($m->sum)){echo $m->sum; }?>"></td>
                          <td><button type="submit" class="btn btn-primary">submit</button></td>
                       </tr>
                       </form>
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

