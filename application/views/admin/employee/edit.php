<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Employee</li>
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
                        <label for="name">Name</label>
                         <input type="text" name="name" <?php if(form_error('name')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('name')){ echo set_value('name'); }elseif(!empty($row->name)){ echo $row->name; } ?>"     class="form-control" id="name" placeholder="Enter First Name">
                         <div class="text-danger"> <?php echo form_error('name'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="employee_name">Employee Name</label>
                         <input type="text"  name="user_name"  <?php if(form_error('user_name')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('user_name')){ echo set_value('user_name'); }elseif(!empty($row->user_name)){ echo $row->user_name; } ?>"   class="form-control" id="user_name" placeholder="Employee Name">
                         <div class="text-danger"> <?php echo form_error('user_name'); ?>  </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="password">Password</label>
                          <input type="password" name="password" <?php if(form_error('password')){ echo 'style="border-color:red"'; } ?>  class="form-control" id="password" placeholder="password">
                          <div class="text-danger"> <?php echo form_error('password'); ?>  </div>
                       </div>
                    </div>
                   
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="mobile">Mobile</label>
                          <input type="text" name="mobile"  <?php if(form_error('mobile')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('mobile')){ echo set_value('mobile'); }elseif(!empty($row->mobile)){ echo $row->mobile; } ?>"   class="form-control" id="mobile" placeholder="mobile">
                          <div class="text-danger"> <?php echo form_error('mobile'); ?>  </div>
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