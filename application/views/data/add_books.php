

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>

          <div class="row">
            <div class="col-md">
              <?= $this->session->flashdata('message') ?>
            </div>
          </div>
          <div class="row">
            <div class="col-md-10">
                <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapseExample" aria-expanded="false" aria-controls="collapseExample">
                    ATTENTION! 
                </button>
                <div class="collapse" id="collapseExample">
                <div class="card card-body">
                    If There isn't category that you want, Or you've find Mispelling in Category Name, Go to Category Management
                </div>
                </div>
            </div>
          </div>

          <hr>

        <div class="row justify-content-center">
            <div class="col-md-8">
                    <?= form_open_multipart('data/add'); ?>
                        <div class="form-group row">
                            <label for="title" class="col-sm-2 col-form-label">Book Title</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="title" name="title" placeholder="Book Title">
                            <?= form_error('title', '<small class="text-danger pl-3">', '</small>' );?>
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
                            <?= form_error('category', '<small class="text-danger pl-3">', '</small>' );?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="writer" class="col-sm-2 col-form-label">writer</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="writer" name="writer" placeholder="writer">
                            <?= form_error('writer', '<small class="text-danger pl-3">', '</small>' );?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="publisher" class="col-sm-2 col-form-label">publisher</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="publisher" name="publisher" placeholder="publisher">
                            <?= form_error('publisher', '<small class="text-danger pl-3">', '</small>' );?>                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="year" class="col-sm-2 col-form-label"> Release year</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="year" name="year" placeholder="Release year">
                            <?= form_error('year', '<small class="text-danger pl-3">', '</small>' );?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="ISBN" class="col-sm-2 col-form-label">ISBN number</label>
                            <div class="col-sm-10">
                            <input type="text" class="form-control" id="ISBN" name="ISBN" placeholder="ISBN number">
                            <?= form_error('ISBN', '<small class="text-danger pl-3">', '</small>' );?>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-sm-12">
                            <input type="file" class="custom-file-input" id="image" name="image">
                                <label class="custom-file-label" for="image">Choose image, can be skipped....</label>
                                <?= form_error('image', '<small class="text-danger pl-3">', '</small>' );?>
                            </div>
                        </div>
                        <div class="form-group row float-right mt-5">
                            <div class="col-sm-12">
                                <button type="submit" class="btn btn-primary"> Input </button>
                            </div>
                        </div>    
                    </form>
            </div>
        </div>

          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      