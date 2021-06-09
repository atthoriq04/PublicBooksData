

        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800"><?= $title ?></h1>


          <hr>

        <div class="row">
            <div class="col-md-10">
                
                <h5 class="btn btn-outline-primary">Update About this Site</h5>
                <div class="card card-body">
                    <form action="" method="POST">
                        <input type="hidden" name="id" class="id" value="<?= $about['id'] ?>">
                        <div class="form-group row">
                            <label for="about" class="col-sm-2 col-form-label">Message</label>
                            <div class="col-sm-10">
                            <textarea class="form-control" id="about" name="about" rows="3"><?= $about['Pesan'] ?></textarea>
                            <?= form_error('about', '<small class="text-danger pl-3">', '</small>' );?>
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


          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      