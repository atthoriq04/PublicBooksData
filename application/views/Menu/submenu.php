
  


        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


          <div class="row mt-2" >
            <div class="col col-md-10">
                <?php if(validation_errors()) : ?>
                <div class="alert alert-danger" role="alert">
                <?= validation_errors() ?>
                </div>
                <?php endif; ?>
                <?= $this->session->flashdata('message') ?>
            </div>
        </div>

          <div class="row">
              <div class="col col-md-12">

              <a href="#" class="btn btn-primary mb-3" data-toggle="modal" data-target="#submenu">Add New Submenu</a>
              <div class="table-responsive">
              <table class="table table-hover ">
                <thead class="thead-dark">
                    <tr>
                    <th scope="col">#</th>
                    <th scope="col">Menu</th>
                    <th scope="col">title</th>
                    <th scope="col">url</th>
                    <th scope="col">icon</th>
                    <th scope="col">action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $i = 1 ;?>
                    <?php foreach ($submenu as $s) : ?>
                        <tr>
                            <th scope="row"><?= $i; ?></th>
                            <td><?= $s['menu']?></td>
                            <td><?= $s['title']?></td>
                            <td><?= $s['url']?></td>
                            <td><i class="<?= $s['icon']?>"></i></td>
                            <td>
                                <a href="#" class="badge badge-pill badge-success mb-3" data-toggle="modal" data-target="#edit<?= $s['id'] ?>">Edit</a>
                                <a href="<?= base_url('menu/subdelete/').$s['id'] ;?>" class="badge badge-pill badge-danger"  onclick="return confirm('yakin?');">Delete</a>

                            </td>
                        </tr>
                        <div class="modal fade" id="edit<?= $s['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="edit<?= $s['id'] ?>" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="edit<?= $s['id'] ?>">Add Sub menu</h5>
                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                              </button>
                            </div>
                            <form action="<?= base_url('menu/submenu'); ?>" method="POST">
                            <div class="modal-body">
                              <div class="form-group">
                                  <input type="text" class="form-control" id="id" name="id" value="<?= $s['id'] ?>">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" id="title" name="title" value="<?= $s['title'] ?>">
                              </div>
                              <div class="form-group">
                                  <select class="custom-select form-control" id="menugroup" name="menuid">
                                      <option selected>Menu Group</option>
                                      <?php foreach ($menu as $sm) : ?>
                                          <option value="<?= $sm['id']?>"><?= $sm['menu']?></option>
                                      <?endforeach;?>
                                  </select>
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" id="url" name="url" value="<?= $s['url'] ?>">
                              </div>
                              <div class="form-group">
                                  <input type="text" class="form-control" id="icon" name="icon" value="<?= $s['icon'] ?>">
                              </div>
                              <div class="form-group">
                                  <select class="custom-select form-control" id="isactive" name="is_active">
                                      <option selected>Is Active?</option>
                                          <option value="0"> Tidak Aktif</option>
                                          <option value="1"> Aktif</option>
                                  </select>
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

                            
                        <?php $i++ ;?>    
                    <?php endforeach; ?>
                </tbody>
                </table>
                </div>

              </div>
          </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  <div class="modal fade" id="submenu" tabindex="-1" role="dialog" aria-labelledby="submenu" aria-hidden="true">
    <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="submenu">Add Sub menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('menu/submenu'); ?>" method="POST">
      <div class="modal-body">
        <div class="form-group">
            <input type="text" class="form-control" id="title" name="title" placeholder="New SubmenuMenu title">
        </div>
        <div class="form-group">
            <select class="custom-select form-control" id="menugroup" name="menuid">
                <option selected>Menu Group</option>
                <?php foreach ($menu as $sm) : ?>
                    <option value="<?= $sm['id']?>"><?= $sm['menu']?></option>
                <?endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="url" name="url" placeholder="New Submenu URL">
        </div>
        <div class="form-group">
            <input type="text" class="form-control" id="icon" name="icon" placeholder="New SubmenuMenu icon">
        </div>
        <div class="form-group">
            <select class="custom-select form-control" id="isactive" name="is_active">
                <option selected>Is Active?</option>
                    <option value="0"> Tidak Aktif</option>
                    <option value="1"> Aktif</option>
            </select>
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

      