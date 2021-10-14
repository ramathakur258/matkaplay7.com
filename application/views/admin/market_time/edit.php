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
                            <option value="<?php echo $m->id; ?>" <?php if(!empty($row)){ if ($row->market_id == $m->id ) { echo 'selected'; }} ?> ><?php echo $m->name;?></option>
                           <?php } ?>
                          </select>
                       
                         <div class="text-danger"> <?php echo form_error('market_id'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                          <label for="open_time">Open time</label>
                          <input type="text" name="open_time"  <?php if(form_error('open_time')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('open_time')){ echo set_value('open_time'); }elseif(!empty($row->open_time)){ echo $row->open_time; } ?>"   class="form-control timepicker" id="open_time" placeholder="open_time">
                          <div class="text-danger"> <?php echo form_error('open_time'); ?>  </div>
                       </div>
                    </div>
                   
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="close_time">Close time</label>
                          <input type="text" name="close_time"  <?php if(form_error('close_time')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('close_time')){ echo set_value('close_time'); }elseif(!empty($row->close_time)){ echo $row->close_time; } ?>"   class="form-control timepicker" id="close_time" placeholder="close_time">
                          <div class="text-danger"> <?php echo form_error('close_time'); ?>  </div>
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