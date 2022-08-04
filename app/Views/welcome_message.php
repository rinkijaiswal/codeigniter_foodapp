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
        <h3>Welcome</h3>
    </div>

   </div>
</div>



<?= $this->endSection(); ?>