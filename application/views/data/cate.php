

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
            <div class="col-md">
              <?= $this->session->flashdata('message') ?>
                <?php if(validation_errors()) : ?>
                  <div class="alert alert-danger" role="alert">
                    <?= validation_errors() ?>
                  </div>
                <?php endif; ?>
            </div>
          </div>


          <hr>

        <section>
        <div class="row justify-content-center">
            <div class="col-md-8">
              <h3 class="text-center"> Category Table </h3>
            </div>
        </div>
        <div class="row justify-content-center mt-5">
            <div class="col-md-8">
            <table class="table table-hover">
                    <thead class="thead-dark">
                        <tr>
                        <th scope="col">#</th>
                        <th scope="col">Category</th>
                        <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1 ;?>
                        <?php foreach ($cat as $cate) : ?>
                            <tr>
                            <th scope="row"><?= $i ?></th>
                            <td><?= $cate['nama_kategori'] ?></td>
                            <td>
                            <a href="<?= base_url('data/deletecat/'). $cate['id_cat'] ?>" class="badge badge-danger" onclick="return confirm('yakin?');">Delete</a>
                            <a href="<?= base_url('data/edit/') ?>" class="badge badge-success" data-toggle="modal" data-target="#edit<?= $cate['id_cat'] ?>" >edit</a>
                            </td>
                            </tr>
                            <div class="modal fade" id="edit<?= $cate['id_cat'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?= $cate['id_cat'] ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit<?= $cate['id_cat'] ?>">Add New menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart('data/category'); ?>
                                    <?php 
                                        $id =  $cate['id_cat'];
                                        $this->db->where('id_cat' , $id); 
                                        $cats = $this->db->get('category')->row_array(); 

                                    ?>
                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-2 col-form-label">Category Id</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="id" name="id" value="<?= $cats['id_cat'] ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="name" class="col-sm-2 col-form-label">Category name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="name" name="name" value="<?= $cats['nama_kategori'] ?>">
                                                            </div>
                                                        </div>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                        <button type="submit" class="btn btn-primary">edit</button>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                            </div>
                            <?php $i++ ;?> 
                        <?php endforeach;?>
                    </tbody>
                </table>
            </div>
        </div>
        </section>
        <hr>
        <section class="pt-5">
            <div class="row justify-content-center">
                <div class="col-md-8">
                <h3 class="text-center"> Add Category </h3>
                </div>
            </div>
            <div class="row justify-content-center mt-5">
            <div class="col-md-8">
                <form action="" method="POST">
                    <div class="input-group">
                        <input type="text" class="form-control" name="name" id="name"placeholder="Add Category Name" autocomplete="off">
                        <div class="input-group-append">
                            <button type="submit" name="cari" id="sub" class="btn btn-outline-success">Add</button>
                        </div>
                    </div>          
                </form>
            </div>
        </div>
        </section>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  