<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Add Money</li>
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
                        <label for="amount">Amount</label>
                         <input type="text" name="amount" <?php if(form_error('amount')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('amount')){ echo set_value('amount'); }elseif(!empty($row->amount)){ echo $row->amount; } ?>"     class="form-control" id="amount" placeholder="Enter amount">
                         <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
                      </div>
                </div>
                <div class="col-md-6">
                       <div class="form-group">
                         <label for="bonus">Bonus</label>
                          <input type="text" name="bonus_amount" value="" class="form-control" placeholder="Enter bonus amount">

                      </div>
                </div>
                
                </div>
                 
                <label class="radio-inline"><input type="radio" name="optradio" value="add" checked>ADD</label>
                <!--<label class="radio-inline"><input type="radio" name="optradio">Option 2</label>-->
                <label class="radio-inline"><input type="radio" value="substract" name="optradio">SUBSTRACT</label>
                
                
                
                <div class="">
                  <button type="submit" class="btn btn-primary">Submit</button>
                </div>
              </form>
            </div>






          </div>
        </div>
      </div>
    </section>