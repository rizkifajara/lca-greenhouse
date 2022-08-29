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
        <?php foreach($siakad as $sm) { ?>
            
        

        <form action="<?php echo base_url().'admin/update_submenu';?>"method="post">

        <div class="form-group">
        <input type="hidden" name="id" class ="form-control" value="<?php echo $sm->id?>">
        <input type="text" class="form-control" name="title"value="<?= $sm->title?>">
        </div>
        <div class="form-group">
            <select name="menu_id"id="menu_id" class="form-control" value="<?= $sm->menu_id?>">
              <option value="">Select Menu</option>
              <?php foreach ($menu as $m) :?>
                <option value="<?= $m['id']; ?>"><?= $m['menu'];?> </option>
                <?php endforeach;?>
            </select>
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
             name="url" value="<?= $sm->url?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
             name="icon" value="<?= $sm->icon?>">
        </div>
        <div class="form-group">
            <input type="text" class="form-control"
             name="urutan" value="<?= $sm->urutan?>">
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
