
  


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
            <div class="col-md">
              <h1 class="h5 mb-4 text-black-800">Books Statistic Report</h1>
            </div>
          </div>

          <!-- Menampilkan jumlah Buku yang ada secara keseluruhan -->
          <div class="row justify-content-center my-3">
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Books Count Total</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $test = $this->db->get('booklist');
                          $result = $test->num_rows();
                          echo $result;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-book fa-2x text-gray-300"></i>
                      
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Menampilkan jumlah Kategori yang tersedia -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Total Categories Avaliable</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $test = $this->db->get('category');
                          $result = $test->num_rows();
                          echo $result;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fab fa-cuttlefish fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>


            <!-- Menampilkan jumlah Penerbit yang ada-->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Total Participated Publisher </div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $query = "SELECT DISTINCT penerbit FROM booklist ";
                          $test = $this->db->query($query);
                          $result = $test->num_rows();
                          echo $result;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-street-view fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>



          <div class="row">
            <div class="col-md">
              <h1 class="h5 mb-4 text-grey-900">User Statistic Report</h1>
            </div>
          </div>



        <!-- Menampilkann jumlah user. yang role idnya 2 -->
        <div class="row justify-content-center my-3">
            
          <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-bottom-primary shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-primary text-uppercase mb-1"> Users Total</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                        <?php 
                          $this->db->where('role_id = 2');
                          $test = $this->db->get('users');
                          $result = $test->num_rows();
                          echo $result;
                        ?>
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <!-- Menambilkan user terakhir yang mendaftar -->
            <div class="col-xl-3 col-md-6 mb-4">
              <div class="card border-bottom-success shadow h-100 py-2">
                <div class="card-body">
                  <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                      <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Last Joined User</div>
                      <div class="h5 mb-0 font-weight-bold text-gray-800">
                      <?php 
                        $query = "SELECT * FROM users  WHERE role_id = 2 ORDER BY users.id DESC LIMIT 1";
                        $user = $this->db->query($query)->row_array();
                        ?>
                        <small> <?= $user['username'] ?></small> 
                      </div>
                    </div>
                    <div class="col-auto">
                      <i class="fas fa-user-edit fa-2x text-gray-300"></i>
                    </div>
                  </div>
                </div>
              </div>
            </div>

        </div>

        <div class="row">
          <div class="col-md">
            <h1 class="h5 mb-4 text-grey-900">Last Activities</h1>
          </div>
        </div>


        <!-- Menampilkan Sebagian dari detil buku terakhir yang diinput -->
        <div class="row">
          <div class="col md-6">
             <!-- Dropdown Card Example -->
             <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                  <h6 class="m-0 font-weight-bold text-primary">Last Updated Books</h6>
                  <div class="dropdown no-arrow">
                    <a class="dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                      <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in" aria-labelledby="dropdownMenuLink">
                      <div class="dropdown-header">What to Do:</div>
                      <a class="dropdown-item" href="<?= base_url('data/detail/'), $books['id_book'] ?>"> book's Details</a>
                      <a class="dropdown-item" href="<?= base_url('data/spread/'), $books['id_book'] ?>"> Uploader's Profile</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="<?= base_url('data/') ?>">Go to Booklist</a>
                    </div>
                  </div>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                  
                  <div class="row">
                    <div class="col-sm-4">
                            <img src="<?= base_url('asset/img/books/'). $books['Foto']; ?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-8">
                            <h4 class="card-title"><?= $books['title'] ?></>
                            <h5 class="card-title mb-2"><small>Uploaded By : <?= $books['username'] ?> on <?= date( 'D, d M Y' , $books['date']) ?> </small></h5>
                            <hr>
                            <p class="card-text">Writer : <?= $books['penulis'] ?></p>
                            <p class="card-text">Category : <?= $books['nama_kategori'] ?></p>
                            <p class="card-text">Publishers : <?= $books['penerbit'] ?></p>
                            <hr>
                    </div>

                  </div>

                </div>
              </div>
          </div>

          <!-- Menampilkan 3 user terakhir yang mendaftar-->
          <div class="col-md-6">
              <!-- Basic Card Example -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Last Signed Up Users</h6>
                </div>
                <div class="card-body">
                <?php 
                        $query = "SELECT * FROM users  WHERE role_id = 2 ORDER BY users.id DESC LIMIT 3";
                        $user = $this->db->query($query)->result_array(); ?>
                        <ul class="list-group">
                          <?php $i = 1 ?>                    
                          <?php foreach($user as $u) :?>
                          
                          <li class="list-group-item list-group-item-info"><img class="img-profile rounded-circle" src="<?=base_url('asset/img/profile/') . $u['image'] ?>" style="width : 7%"> <a href="<?= base_url('user/detail/'), $u['id'] ?>"> <?=$i . '.' .' ' . $u['username'] ?></a>, on <?= date( 'D, d M Y' , $u['date_created']) ?></li>
                          
                            <?php $i++ ?>                    
                          <?php endforeach;?> 
                        </ul>
                </div>
              </div>
              <!-- Menampilkan jumlah admin secara keseluruhan -->
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Administator</h6>
                </div>
                <div class="card-body">
                <?php 
                        $query = "SELECT * FROM users  WHERE role_id = 1";
                        $admin = $this->db->query($query)->result_array(); ?>
                        <ul class="list-group">
                          <?php $i = 1 ?>                    
                          <?php foreach($admin as $a) :?>
                          
                          <li class="list-group-item list-group-item-info"> <img class="img-profile rounded-circle" src="<?=base_url('asset/img/profile/') . $a['image'] ?>" style="width : 7%"> <a href="<?= base_url('user/detail/'), $a['id'] ?>"> <?=$i . '.' .' ' . $a['username'] ?></a></li>
                          
                            <?php $i++ ?>                    
                          <?php endforeach;?> 
                        </ul>
                </div>
              </div>

          </div>
        </div>    
        
      
      
      
      </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      