

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
            <div class="col-md">
              <?= $this->session->flashdata('message') ?>
            </div>
          </div>

          <hr>

          <div class="row justify-content-center">
                <div class="col-md-8">
                <table class="table table-hover">
                    <thead class="thead-dark">
                    <tr>
                    <th scope="col">Role Name</th>
                    <th scope="col">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php  foreach($role as $r) :?>
                    <tr>
                    <th><?= $r['role_name'] ?></th>
                    <td>
                    <a href="<?= base_url('admin/role_acc/'). $r['id_role'] ;?>" class="badge badge-pill badge-warning">Acess Settings</a>
                    </td>
                    </tr>
                    <?php endforeach;?>
                    </tbody>
                </table>
                </div>
          </div>
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      