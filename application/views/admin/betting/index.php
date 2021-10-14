<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Betting</li>
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
            
                <input type="text" name="date" class="" id="datepicker1" placeholder="Select Date">  
            
          <!--<a class="btn btn-primary" href="<?php //echo admin_url('market1/edit');?>">Add</a>-->
          </div>
               
              </div>
             <!--   <div class="card-header">
              <h3 class="card-title">Striped Full Width Table</h3>
              </div>-->
              <!-- /.card-header -->
              <div class="card-body table-responsive p-0">
                <table class="table table-striped" id="betting-datatable">
                  <thead>
                    <tr>
                      <th >Market Name</th>
                      <th >Game</th>
                      <th >Date</th>
                      <th>Total betting</th>
                      <!--<th>History</th>-->
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
 


<script>
    
</script>
