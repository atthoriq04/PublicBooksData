

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
            <div class="col-md-10">
              <form action="" method="POST">
                  <div class="input-group">
                      <input type="text" class="form-control" name="search" id="cari"placeholder="Search Anything..." autofocus autocomplete="off">
                      <div class="input-group-append">
                          <button type="submit" name="cari" id="sub" class="btn btn-outline-primary">Search</button>
                      </div>
                  </div>          
              </form>
            </div>
          </div>

          <?php if($cari): ?>
            <hr>
            <a href="<?= base_url('data/refresh') ?>" class="badge badge-primary">Show All Books</a>
          <?php endif ?>
          <hr>
          
        <div class="row justify-content-center">
            <div class="col-md-10">
            <div class="table-responsive">
              <?php if(empty($books) ) : ?>                        
              <td>No Data</td>
              <?php else : ?>

              
                <table class="table table-hover ">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Release Year</th>
                        <th scope="col">Title</th>
                        <th scope="col">Uploaded By</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($books as $book) : ?>
                            <tr>
                            <th scope="row"><?= ++$start ?></th>
                            <td><?= $book['nama_kategori'] ?></td>
                            <td><?= $book['tahunterbit'] ?></td>
                            <td><?= $book['title'] ?></td>
                            <td><?= $book['username'] ?></td>
                            <td>
                                <a href="<?= base_url('data/detail/').$book['id_book'] ?>" class="badge badge-secondary">Detail</a>
                            </td>
                            </tr>
                        <?php endforeach;?>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
            </div>
        </div>
        <div class="row mt-2">
          <div class="col-md-1">

          </div>
          <div class="col-md-8">
            <?= $this->pagination->create_links();?>
          </div>
        </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      