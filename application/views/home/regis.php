


    <div class="container">
        <div class="row justify-content-center homepage mt-5" >
            <div class="col col-md-6 pb-5 bt-3 mt-5 text-center " id="home">
                <h2>Register</h2>
                <div class="row  justify-content-center ">    
                    <div class="col-md-10 mt-3">  
                        <div class="p-2">    
                            <form action="<?= base_url('home/register') ?>" method="POST">                    
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="username" name="username" placeholder="Enter Username" value="<?= set_value('username');?>">
                                        <?= form_error('username', '<small class="text-danger pl-3">', '</small>' );?>
                                    </div>
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user" id="email" name="email" placeholder="Enter Email Address..." value="<?= set_value('email');?>">
                                        <?= form_error('email', '<small class="text-danger pl-3">', '</small>' );?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="Password1" name="Password1" placeholder="Create Password">
                                        <?= form_error('Password1', '<small class="text-danger pl-3">', '</small>' );?>
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" id="password2" name="password2" placeholder="Repeat password">
                                        <?= form_error('password2', '<small class="text-danger pl-3">', '</small>' );?>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-user btn-block">
                                    Login
                                    </button>
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="<?= base_url();?>home/">Have an Account Already? Login Now!</a>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
</div>