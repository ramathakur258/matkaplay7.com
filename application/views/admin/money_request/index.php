<style>
    select.form-control[multiple], select.form-control[size] {
    height: auto;
    width: 135px;
}
</style>

<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Money Request</li>
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
          <!--<a class="btn btn-primary" href="<?php echo admin_url('money_request/edit');?>">Add</a>-->
          </div>
               
              </div>
             <!--   <div class="card-header">
              <h3 class="card-title">Striped Full Width Table</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped" id="money_request-datatable">
                  <thead>
                    <tr>
                      <th>Request User</th>
                      <th>Request user mobile</th>
                      <th>Bank Name</th>
                      <th>Account Number</th>
                      <th>Account holder Name</th>
                      <th>IFSC code</th>
                      <th>Amount</th>
                
                    
                      <th>Status</th>
                    </tr>
                  </thead>
                  <tbody>
                  
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>




          </div>
        </div>
    </div>
</section>

