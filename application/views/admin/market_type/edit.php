<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Market Type</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <!-- left column -->
          <div class="col-md-12">
          <div class="card card-primary">
            <!--  <div class="card-header">
                <h3 class="card-title">Quick Example</h3>
              </div>-->
              <!-- /.card-header -->
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="market_type_name">Name</label>
                        <select name="market_type_name" id="market_type_name"  class="form-control" >
                            <option value="SINGLE" <?php if(!empty($row)){ if ($row->market_type_name == 'SINGLE') { echo 'selected'; }} ?> >Single</option>
                            <option value="JODI" <?php if(!empty($row)){ if ($row->market_type_name == 'JODI') { echo 'selected'; }} ?> >jodi</option>
                            <option value="SINGLE PATTI" <?php if(!empty($row)){if ($row->market_type_name == 'SINGLE PATTI') { echo 'selected'; }} ?> >Single Patti</option>
                            <option value="DOUBLE PATTI" <?php if(!empty($row)){if ($row->market_type_name == 'DOUBLE PATTI') { echo 'selected'; }} ?> >Double Patti</option>
                            <option value="TRIPLE PATTI" <?php if(!empty($row)){if ($row->market_type_name == 'TRIPLE PATTI') { echo 'selected'; }} ?> >Triple Patti</option>
                          </select>
                         <!-- <input type="text" name="market_type_name" <?php if(form_error('market_type_name')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('market_type_name')){ echo set_value('market_type_name'); }elseif(!empty($row->market_type_name)){ echo $row->market_type_name; } ?>"     class="form-control" id="market_type_name" placeholder="Market Type"> -->
                         <div class="text-danger"> <?php echo form_error('market_type_name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="min_bid_amount">Minimum Bid amount</label>
                         <input type="text"  name="min_bid_amount"  <?php if(form_error('min_bid_amount')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('min_bid_amount')){ echo set_value('min_bid_amount'); }elseif(!empty($row->min_bid_amount)){ echo $row->min_bid_amount; } ?>"   class="form-control" id="min_bid_amount" placeholder="Minimum bid amount">
                         <div class="text-danger"> <?php echo form_error('min_bid_amount'); ?>  </div>
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="win_amount">Winning Amount</label>
                          <input type="text" name="win_amount"  <?php if(form_error('win_amount')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('win_amount')){ echo set_value('win_amount'); }elseif(!empty($row->win_amount)){ echo $row->win_amount; } ?>"   class="form-control" id="win_amount" placeholder="win_amount">
                          <div class="text-danger"> <?php echo form_error('win_amount'); ?>  </div>
                       </div>
                    </div>

                </div>
                 
                 
                 
             

                <div class="">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>






          </div>
        </div>
      </div>
    </section>