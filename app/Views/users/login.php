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
    
    <?php if($session->getTempdata('error')): ?>
        <div class="container px-5">
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                <?= $session->getTempdata('error') ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
             </div>
        </div>
    <?php endif; ?>
    
    
    <div class="container d-flex justify-content-center align-center">
    <div class="row">
        <h3> Login</h3>
        <form method="POST" action="<?= base_url('/user/login') ?>" >
            <div class="form-group mb-2">
                <label>Email</label>
                <input type="text" class="form-control" name="email"  />
            </div>
            <div class="form-group mb-2">
                <label>Password</label>
               <input type="password" class="form-control" name="password"/>
            </div>
            <div class="form-group mb-2">
                <button type="submit" class="btn btn-success">Login</button>
            </div>

         </form>
    </div>

   </div>
</div>



<?= $this->endSection(); ?>