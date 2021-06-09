
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>
          
        <div class="row mt-2 justify-content-center" >
            <div class="col col-lg-8">
                <?= $this->session->flashdata('message') ?>

                <h5 class="mb-3">Role : <?= $role['role_name']?></h5>
            </div>
        </div>


          <div class="row justify-content-center">
              <div class="col col-lg-8">

              <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">menu</th>
                    <th scope="col">Access</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ;?>
                    <?php foreach ($menu as $r) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $r['menu']?></td>
                            <td>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" <?= check_access($role['id_role'], $r['id']); ?> data-role="<?= $role['id_role'];  ?>" data-menu="<?= $r['id'] ?>">
                            </div>
                            </td>
                        </tr>
                        <?php $i++ ;?>    
                    <?php endforeach; ?>
                </tbody>
                </table>

              </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->