<div class="content-wrapper">

    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                <br>

    <div class="row">
        <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
                <form action="<?= base_url('changepass');?>" method="post">
                <div class="form-group">
                    <label for="current_password">Current Password</label>
                    <input type="password" class="form-control" id="current_password"
                    name="current_password">
                    <?= form_error('current_password', '<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                    <label for="new_password1">New Password</label>
                    <input type="password" class="form-control" id="new_password1"
                    name="new_password1">
                    <?= form_error('new_password1', '<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                    <label for="new_password2">Repeat Password</label>
                    <input type="password" class="form-control" id="new_password2"
                    name="new_password2">
                    <?= form_error('new_password2', '<small class="text-danger pl-3">','</small>');?>
                </div>

                <div class="form-group">
                    <button type="submit" class="btn btn-primary"> Change
                    </button>
                </div>
            
                </form>
                </div>





        </div>
        </div>
        </div>

            </div>
        </div>