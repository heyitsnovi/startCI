 

 
 


 <div class="col-md-6 grid-margin stretch-card">
  <div class="card">
    <div class="card-body">
      <h4 class="card-title">Create New User</h4>
      <p class="card-description">
        New user details
      </p>
      <div id="error-messages">
      <?php
            if(strlen($message)  > 0){
                  echo '<div class="alert alert-danger alert-dismissible"><a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>'.$message.'</div>';
            }
       ?></div>
<?php echo form_open(uri_string());?>

 

        <div class="form-group">
          <label for="first_name">First Name</label>
          <?php echo form_input($first_name,'',['class'=>'form-control']);?>
        </div>

         <div class="form-group">
          <label for="last_name">Last Name</label>
          <?php echo form_input($last_name,'',['class'=>'form-control']);?>
        </div>

         <div class="form-group">
          <label for="company">Company</label>
          <?php echo form_input($company,'',['class'=>'form-control']);?>
        </div>
 

         <div class="form-group">
          <label for="phone">Phone</label>
          <?php echo form_input($phone,'',['class'=>'form-control']);?>
        </div>

         <div class="form-group">
          <label for="password">Password</label>
          <?php echo form_input($password,'',['class'=>'form-control']);?>
        </div>


         <div class="form-group">
          <label for="password_confirm">Password</label>
          <?php echo form_input($password_confirm,'',['class'=>'form-control']);?>
        </div>
  
   <div class="form-group">
          <label for="password_confirm">User Group</label>
          <br>
      <?php if ($this->ion_auth->is_admin()): ?>

          <?php foreach ($groups as $group):?>
              <label class="checkbox">
              <?php
                  $gID=$group['id'];
                  $checked = null;
                  $item = null;
                  foreach($currentGroups as $grp) {
                      if ($gID == $grp->id) {
                          $checked= ' checked="checked"';
                      break;
                      }
                  }
              ?>
              <input type="checkbox" name="groups[]" value="<?php echo $group['id'];?>"<?php echo $checked;?>>
              <?php echo htmlspecialchars($group['name'],ENT_QUOTES,'UTF-8');?>
              </label>
          <?php endforeach?>

      <?php endif ?>
    </div>

      <?php echo form_hidden('id', $user->id);?>
      <?php echo form_hidden($csrf); ?>
      <br>
        <button type="submit" class="btn btn-success mr-2" name="new_user_btn">Submit</button>
        <a href="<?php echo base_url('admin/users/'); ?>" class="btn btn-danger mr-2">Cancel</a> 

<?php echo form_close();?>
    </div>
  </div>
</div>