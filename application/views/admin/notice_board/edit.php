
<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Users</li>
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
                        <label for="name">Title</label>
                         <input type="text" name="title" <?php if(form_error('title')){ echo 'style="border-color:red"'; } ?> value="<?php if(set_value('title')){ echo set_value('title'); }elseif(!empty($row->title)){ echo $row->title; } ?>" class="form-control" placeholder="Enter Title">
                         <div class="text-danger"> <?php echo form_error('title'); ?>  </div>
                      </div>
                    </div>

                    <div class="col-md-6">
                       <div class="form-group">
                        <label for="user_name">Discription</label>
                         <input type="text"  name="description"  <?php if(form_error('description')){ echo 'style="border-color:red"'; } ?>  value="<?php if(set_value('description')){ echo set_value('description'); }elseif(!empty($row->description)){ echo $row->description; } ?>"   class="form-control"  placeholder="Discription">
                         <div class="text-danger"> <?php echo form_error('description'); ?>  </div>
                      </div>
                    </div>
                    <div class="col-md-6">
                       <div class="form-group">
                          <label for="date">Date</label>
                          <input type="text" name="date"  <?php if(form_error('date')){ echo 'style="border-color:red"'; } ?> id="todatepicker" value="<?php if(set_value('date')){ echo set_value('date'); }elseif(!empty($row->date)){ echo $row->date; } ?>"   class="form-control"  placeholder="Date">
                          <div class="text-danger"> <?php echo form_error('date'); ?>  </div>
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