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
                        <label for="name">Market Name</label>
                         <input type="text"  name="name"  <?php if(form_error('name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('name')){ echo set_value('name'); }elseif(!empty($row->name)){ echo $row->name; } ?>"   class="form-control" id="name" placeholder="Market Name">
                         <div class="text-danger"> <?php echo form_error('name'); ?>  </div>
                      </div>
                    </div>
                   
                    <div class="col-md-6">
                     
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
   