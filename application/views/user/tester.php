<div class="content-wrapper">

<section class="content-header">
<div class="container-fluid">
<div class="row mb-2">
<div class="col-sm-6">
<h1><?= $title; ?></h1>
<br>
            <!-- <div class="row">
                <div class="col-lg-8">
                <?= $this->session->flashdata('message'); ?>
      
            -->
</div>
<div class="col-sm-6">
</div>
</div>
</div>
</section>

<section class="content">
<div class="row">
<div class="col-md-6">
<div class="card card-primary">
<div class="card-header">
<h3 class="card-title">General</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div class="form-group">
<label for="inputName">Project Name</label>
<input type="text" id="inputName" class="form-control">
</div>
<div class="form-group">
<label for="inputDescription">Project Description</label>
<textarea id="inputDescription" class="form-control" rows="4"></textarea>
</div>
<div class="form-group">
<label for="inputStatus">Status</label>
<select id="inputStatus" class="form-control custom-select">
<option selected disabled>Select one</option>
<option>On Hold</option>
<option>Canceled</option>
<option>Success</option>
</select>
</div>
<div class="form-group">
<label for="inputClientCompany">Client Company</label>
<input type="text" id="inputClientCompany" class="form-control">
</div>
<div class="form-group">
<label for="inputProjectLeader">Project Leader</label>
<input type="text" id="inputProjectLeader" class="form-control">
</div>
</div>

</div>

</div>
<div class="col-md-6">
<div class="card card-secondary">
<div class="card-header">
<h3 class="card-title">Budget</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div class="form-group">
<label for="inputEstimatedBudget">Estimated budget</label>
<input type="number" id="inputEstimatedBudget" class="form-control">
</div>
<div class="form-group">
<label for="inputSpentBudget">Total amount spent</label>
<input type="number" id="inputSpentBudget" class="form-control">
</div>
<div class="form-group">
<label for="inputEstimatedDuration">Estimated project duration</label>
<input type="number" id="inputEstimatedDuration" class="form-control">
</div>
</div>

</div>
<div class="col-md-14">
<div class="card card-secondary">
<div class="card-header">
<h3 class="card-title">Budget</h3>
<div class="card-tools">
<button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
<i class="fas fa-minus"></i>
</button>
</div>
</div>
<div class="card-body">
<div class="form-group">
<label for="inputEstimatedBudget">Estimated budget</label>
<input type="number" id="inputEstimatedBudget" class="form-control">
</div>
<div class="form-group">
<label for="inputSpentBudget">Total amount spent</label>
<input type="number" id="inputSpentBudget" class="form-control">
</div>
<div class="form-group">
<label for="inputEstimatedDuration">Estimated project duration</label>
<input type="number" id="inputEstimatedDuration" class="form-control">
</div>
</div>
</div>
</div>


</section>

</div>
