<section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
          
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Reduce Money</li>
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
              <!-- form start -->
              <form method="post">
                <div class="card-body">
                <div class="row">
                <div class="col-md-6">
                       <div class="form-group">
                        <label for="amount">Amount</label>
                         <input type="text" name="amount" <?php if(form_error('amount')){ echo 'style="border-color:red"'; } ?> value=""     class="form-control" id="amount" placeholder="Enter amount">
                         <div class="text-danger"> <?php echo form_error('amount'); ?>  </div>
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