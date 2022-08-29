<div class="content-wrapper">

<section class="content-header">
    <div class="container-fluid">
        <div class="row">
        <div class="col-sm-6">
            <h1>Form Edit Data</h1>
        </div>

        </div>
    </div>
</section>
<div class="card">
<div class="card-body">
        <?php foreach($siakad as $m) { ?>
            
        

        <form action="<?php echo base_url().'admin/update_menu';?>"method="post">

        <div class="form-group">
        <input type="hidden" name="id" class ="form-control" value="<?php echo $m->id?>">
        <input type="text" class="form-control" name="menu" value="<?php echo $m->menu?>">
        </div>
        <input type="button" class ="btn btn-primary" value="Back" onclick ="history.back()">
        <button type="submit" class="btn btn-primary">Save Changes</button>
      

       
    
    
    </form>
    <?php } ?>
 
    
    </section>
    
</div>
</div>
</div>
</div>
