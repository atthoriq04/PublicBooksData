

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

          <div class="row">
            <div class="col-md-12">
              <div class="card">
                <h5> Thanks to the Framework and more. </h5>
              <div class="card-body">
                <ul>
                  <?php foreach($thanks as $t) : ?>
                  <li><?= $t['content'] ?></li>
                  <?php endforeach ?>
                </ul>
              </div>
            </div>
            </div>
        </div>



          
        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      