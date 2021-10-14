<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Market Edit</li>
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
                        <label for="market_id">Name</label>
                        <select name="market_id" id="market_id"  class="form-control" >
                            <option selected="true" disabled="disabled">Select market</option>
                        <?php foreach($market_data as $m) { ?>
                            <option value="<?php echo $m->type; echo"-"; echo $m->market_id; ?>" <?php if(!empty($row)){ if ($row->market_id == $m->market_id && $row->type == $m->type ) { echo 'selected'; }} ?> ><?php echo $m->market_name;?>(<?php echo $m->time;?>)</option>
                           <?php } ?>
                          </select>
                       
                         <div class="text-danger"> <?php echo form_error('market_id'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="result_digit">Result Digit</label>
                          <input type="text" name="result_digit"  <?php if(form_error('result_digit')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('result_digit')){ echo set_value('result_digit'); }?>"   class="form-control" id="result_digit" placeholder="Result digit">
                          <div class="text-danger"> <?php echo form_error('result_digit'); ?>  </div>
                       </div>
                    </div>
                   
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="result_digit_sum">Result Digit Sum</label>
                          <input type="text" name="result_digit_sum"  <?php if(form_error('result_digit_sum')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('result_digit_sum')){ echo set_value('result_digit_sum'); }?>"   class="form-control" id="result_digit_sum" placeholder="Result digit sum">
                          <div class="text-danger"> <?php echo form_error('result_digit_sum'); ?>  </div>
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