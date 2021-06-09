
  


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


          <div class="row mt-2 justify-content-center" >
            <div class="col col-lg-8">
                <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
                </div>
                <?php endif; ?>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>

          <div class="row justify-content-center">
              <div class="col col-lg-8">

              <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#menumodal">Add New Menu</a>

              <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ;?>
                    <?php foreach ($menu as $m) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $m['menu']?></td>
                            <td>
                              <a href="<?= base_url('menu/edit/') ?>" class="badge badge-success" data-toggle="modal" data-target="#edit<?= $m['id'] ?>" >edit</a>
                              <a href="<?= base_url('menu/delete/').$m['id'] ;?>" class="badge badge-pill badge-danger"  onclick="return confirm('yakin?');">Delete</a>  
                            </td>
                        </tr>
                            <div class="modal fade" id="edit<?= $m['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?= $m['id'] ?>" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="edit<?= $m['id'] ?>">Add New menu</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <?= form_open_multipart('menu/'); ?>
                                    <?php 
                                        $id =  $m['id'];
                                        $this->db->where('id_cat' , $id); 
                                        $cats = $this->db->get('category')->row_array(); 

                                    ?>
                                    <div class="modal-body">
                                                        <div class="form-group row">
                                                            <label for="id" class="col-sm-2 col-form-label">Menu Id</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="id" name="id" value="<?= $m['id'] ?>" readonly>
                                                            </div>
                                                        </div>
                                                        <div class="form-group row">
                                                            <label for="Name" class="col-sm-2 col-form-label">Menu Name</label>
                                                            <div class="col-sm-10">
                                                            <input type="text" class="form-control" id="Name" name="name" value="<?= $m['menu'] ?>">
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
                    <?php endforeach; ?>
                </tbody>
                </table>

              </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<div class="modal fade" id="menumodal" tabindex="-1" role="dialog" aria-labelledby="menumodal" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="menumodal">Add New menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu'); ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <label for="Name">New Menu Name</label>
            <input type="text" class="form-control" id="Name" name="name" placeholder="New Menu Name">
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
        </div>
    </div>
    </form>
  </div>
</div>