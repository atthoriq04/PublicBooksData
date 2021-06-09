
  


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
            <div class="col-md-8">
              <?= $this->session->flashdata('message') ?>
            </div>
          </div>


          <div class="row">
              <div class="col-md-8">
                  <form action="<?= base_url('user/change'); ?>" method="POST">
                  <div class="form-group">
                    <label for="currentpassword">Current Password</label>
                    <input type="password" class="form-control" id="currentpassword" name="currentpassword">
                    <?= form_error('currentpassword', '<small class="text-danger pl-3">', '</small>' );?>
                </div>
                  <div class="form-group">
                    <label for="password1">New Password</label>
                    <input type="password" class="form-control" id="password1" name="password1">
                    <?= form_error('password1', '<small class="text-danger pl-3">', '</small>' );?>
                </div>
                  <div class="form-group">
                    <label for="password2">Reinput New Password</label>
                    <input type="password" class="form-control" id="password2" name="password2">
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Change Password </button>
                </div>
                  </form>
              </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      