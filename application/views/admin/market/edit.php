<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Market</li>
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
                        <label for="market_name">Market Name</label>
                         <input type="text"  name="market_name"  <?php if(form_error('market_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('market_name')){ echo set_value('market_name'); }elseif(!empty($row->market_name)){ echo $row->market_name; } ?>"   class="form-control" id="market_name" placeholder="Market Name">
                         <div class="text-danger"> <?php echo form_error('market_name'); ?>  </div>
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="time">Time</label>
                          <input type="text" name="time"  <?php if(form_error('time')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('time')){ echo set_value('time'); }elseif(!empty($row->time)){ echo $row->time; } ?>"   class="form-control timepicker" id="time" placeholder="time">
                          <div class="text-danger"> <?php echo form_error('time'); ?>  </div>
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
   