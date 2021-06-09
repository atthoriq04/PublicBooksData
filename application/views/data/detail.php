

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

        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3" style="max-width: 800px;">
                    <div class="row no-gutters">
                        <div class="col-md-4">
                        <img src="<?= base_url('asset/img/books/').$books['Foto'] ?>" class="card-img-top" alt="...">
                        </div>
                        <div class="col-md-8">
                        <div class="card-body">
                            <h4 class="card-title"><?= $books['title'] ?></h4>
                            <h5 class="card-title mb-2"><small>Uploaded By : <a href="<?= base_url('data/spread/'), $books['id'] ?>"> <?= $books['username'] ?> </a></small></h5>
                            <hr>
                            <p class="card-text">Writer : <?= $books['penulis'] ?></p>
                            <p class="card-text">category : <?= $books['nama_kategori'] ?></p>
                            <p class="card-text">Publishers : <?= $books['penerbit'] ?></p>
                            <p class="card-text">Release Year : <?= $books['tahunterbit'] ?></p>
                            <p class="card-text">ISBN Number : <?= $books['ISBN'] ?></p>
                            <hr>
                            <a href="<?= base_url('data/')?>" class="btn btn-primary ">Back</a>
                            <?php if ($books['username'] == $user['username']) : ?>
                            <a href="<?= base_url('data/delete/'). $id ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Delete</a>
                            <a href="<?= base_url('data/edit/'). $id ?>" class="btn btn-success" data-toggle="modal" data-target="#edit" >edit</a>
                            <?php elseif($user['role_id'] == 1) : ?>
                            <a href="<?= base_url('data/delete/'). $id ?>" class="btn btn-danger" onclick="return confirm('yakin?');">Delete</a>
                            <a href="<?= base_url('data/edit/'). $id ?>" class="btn btn-success" data-toggle="modal" data-target="#edit" >edit</a>
                            <?php endif;?>
                            <p class="card-text float-right"><small class="text-muted">Last updated <?= date('D, d-M-Y', $books['date']) ?></small></p>
                        </div>
                        </div>
                    </div> 
                </div>
            </div>
        </div>
        
        
          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="edit">Add New menu</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?= form_open_multipart('data/detail/'. $id); ?>
      <div class="modal-body">
                        <div class="form-group row">
                            <label for="id" class="col-sm-2 col-form-label">Book id</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="id" name="id" value="<?= $id ?>" readonly>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Book Title</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" value="<?= $books['title'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="category" class="col-sm-2 col-form-label">Book category</label>
                            <div class="col-sm-10">
                            <select class="form-control" id="category" name="category">
                            <?php foreach($category as $cat) : ?>
                                <option value="<?= $cat['id_cat'] ?>"><?= $cat['nama_kategori']?></option>
                            <?php endforeach;?>
                            </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="writer" class="col-sm-2 col-form-label">writer</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="writer" name="writer" value="<?= $books['penulis'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="publisher" class="col-sm-2 col-form-label">publisher</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="publisher" name="publisher"  value="<?= $books['penerbit'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label"> Release year</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="year" name="year" value="<?= $books['tahunterbit'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ISBN" class="col-sm-2 col-form-label">ISBN number</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="ISBN" name="ISBN" value="<?= $books['ISBN'] ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="file" class="custom-file-input" id="image" name="image" value="<?= $books['Foto'] ?>">
                                <label class="custom-file-label" for="image">Choose image, can be skipped....</label>
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