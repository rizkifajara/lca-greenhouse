<div class="content-wrapper">

    <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6">
                    <h1><?= $title; ?></h1>
                <br>

    <div class="row">
        <div class="col-lg-8">

        <?= form_open_multipart('editprofile'); ?>
        <div class= "form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class= "col-sm-10">
                <input type="text" class="form-control" id="email" name="email" 
                value="<?= $user['email'];?>"readonly>
            </div>
        </div>
        <div class= "form-group row">
            <label for="name" class="col-sm-2 col-form-label">Full Name</label>
            <div class= "col-sm-10">
                <input type="text" class="form-control" id="name" name="name"
                value="<?= $user['name'];?>">
                <?= form_error('name', '<small class="text-danger pl-3">', '</small>');?>

            </div>
        </div>

        <div class= "form-group row">
            <label for="lokasi" class="col-sm-2 col-form-label">Lokasi</label>
            <div class= "col-sm-10">
                <input type="text" class="form-control" id="lokasi" name="lokasi"
                value="<?= $user['lokasi'];?>">
                <?= form_error('lokasi', '<small class="text-danger pl-3">', '</small>');?>

            </div>
        </div>

        <div class= "form-group row">
            <label for="nama_gh" class="col-sm-2 col-form-label">Nama Greenhouse</label>
            <div class= "col-sm-10">
                <input type="text" class="form-control" id="nama_gh" name="nama_gh"
                value="<?= $user['nama_gh'];?>">
                <?= form_error('nama_gh', '<small class="text-danger pl-3">', '</small>');?>

            </div>
        </div>
        <div class= "form-group row">
            <div class="col-sm-2"><b> Picture</b> </div>
            <div class="col-sm-10">
                <div class="row">
                    <div class="col-sm-3">
                        <img src="<?= base_url('assets/dist/img/') . $user ['image']?>" class="img-thumbnail">
                    </div>
                    <div class="col-sm-9">
                        <div class="custom-file">
                            <input type="file" class="custom-file-input"
                            id="image" name="image">
                            <label class="custom-file-label"
                            for="image"> Choose file </label>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group row justify-content-end">
        <div class="col-sm-10">
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
    </div>
        </form>
        </div>
</div>
</div>
</section>
</div>
</div>
</div>
