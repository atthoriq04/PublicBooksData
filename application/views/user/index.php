

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
                <div class="card mb-3">
                    <img src="<?=base_url('asset/img/profile/') . $user['image'] ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $user['username'] ?></h5>
                        <p><?= $user['email'] ?>.</p>
                        <p class="card-text font-weight-bold">Role : <?= $role['role_name']?> </p>
                        <p class="card-text"><small class="text-muted">Member Since : <?= date('d F Y', $user['date_created']  ) ?></small></p>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
          <div class="col">
            <h1 class="h4 text-gray-800 mt-2">Activities</h1>
            <hr>
          </div>
        </div>

        <div class="row mt-2">
            <div class="col-md-8">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Books Uploaded</h6>
                </div>
                <div class="card-body">
                        <ul class="list-group">
                          <?php $i = 1 ?>                    
                          <?php foreach($books as $u) :?>
                          
                          <li class="list-group-item list-group-item-info"> <a href="<?= base_url('data/detail/'), $u['id_book'] ?>"> <?=$i . '.' .' ' . $u['title'] . ' (' . $u['nama_kategori'] . ')' ?></a></li>
                          
                            <?php $i++ ?>                    
                          <?php endforeach;?> 
                        </ul>
                </div>
              </div>
            </div>
            <div class="col-md-4">
                <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">total books Uploaded</h6>
                </div>
                <div class="card-body">
                        <ul class="list-group">
                         <?=  $rows
                          ?>
                        </ul>
                </div>
              </div>
            </div>
        </div>


          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      