<?php $session = \Config\Services::session(); ?>

<?php $this->extend('layouts/base') ?>
<?= $this->section('content'); ?>

<div class="container-fluid mt-5">
    
    <?php if($session->getTempdata('success')): ?>
        <div class="container px-5">
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <?= $session->getTempdata('success') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    
<div class="container d-flex justify-content-center align-center">
    <div class="row">
        <h3> Signup</h3>
        <form method="POST" enctype="multipart/form-data" action="<?= base_url('/user/signup') ?>" >
            <div class="from-group mb-2">
                <label>Name</label>
                <input type="text" class="form-control" name="name" value="<?= set_value('name') ?>" />
                <span class="text-danger">
                    <?php
                    if(isset($validation)){
                            if($validation->hasError('name')){
                                echo $validation->getError('name');
                            }
                        } 
                    ?>
                </span>
            </div>

            <div class="from-group mb-2">
                <label>Email</label>
                <input type="text" class="form-control" name="email" value="<?= set_value('email') ?>" />
                <span class="text-danger">
                    <?php
                    if(isset($validation)){
                            if($validation->hasError('email')){
                                echo $validation->getError('email');
                            }
                        } 
                    ?>
                </span>
            </div>
            <div class="from-group mb-2">
                <label>Password</label>
               <input type="password" class="form-control" name="password" value="<?= set_value('password') ?>" />
               <span class="text-danger">
                    <?php
                    if(isset($validation)){
                            if($validation->hasError('password')){
                                echo $validation->getError('password');
                            }
                        } 
                    ?>
                </span>
               
            </div>
            <div class="from-group mb-2">
                <label>Profile pic</label>
               <input type="file" class="form-control" name="profile"/>
               <span class="text-danger">
                    <?php
                    if(isset($validation)){
                            if($validation->hasError('profile')){
                                echo $validation->getError('profile');
                            }
                        } 
                    ?>
                </span>
            </div>
            <div class="from-group mb-2">
                <button type ="submit" class="btn btn-success">Signup</button>
            </div>

         </form>
    </div>
</div>
    <div class="container mt-4 py-3 px-3" style="background-color:#eeeeee;" align="center">
        <p>Already have an account?</p>
        <a class="btn btn-outline-danger" href="<?= base_url('/user/login') ?>">Login</a>
    </div>
</div>




<?= $this->endSection(); ?>