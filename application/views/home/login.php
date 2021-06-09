<div class="container">
    <div class="row justify-content-center homepage mt-5">
        <div class="col col-md-6 pb-5 bt-3 text-center mt-5 " id="home">
            <h2>login</h2>
            <div class="row   justify-content-center ">
                <div class="col-md-8 mt-3">
                    <div class="p-2">
                        <?= $this->session->flashdata('message'); ?>
                        <form action="<?= base_url('home/index') ?>" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email'); ?>">
                                <?= form_error('email', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control form-control-user" id="password" name="password" placeholder="Password">
                                <?= form_error('password', '<small class="text-danger pl-3">', '</small>'); ?>
                            </div>
                            <button type="submit" class="btn btn-primary btn-user btn-block">
                                Login
                            </button>
                        </form>
                        <hr>
                        <div class="text-center">
                            <a class="small" href="<?= base_url(); ?>home/register">Create an Account!</a>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>