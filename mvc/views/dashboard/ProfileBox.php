      <?php if(customCompute($user)) { ?>
        <section class="panel bg-light-success p-6">
          <div class="profile-db-head bg-maroon-light">
            <a href="<?=base_url('dashboard/index')?>">
              
              <?=profileimage($user->photo)?>
            </a>

            <h1><?=$user->name?></h1>
            <p><?=$membertype->regtype?></p>
          </div>
          <table class="table table-hover">
              <tbody>
                  <tr>
                    <td>
                      <i class="fa fa-user text-maroon-light" ></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_username')?></td>
                    <td><?=$user->username?></td>
                  </tr>

                  <tr>
                      <td>
                        <i class="fa fa-envelope text-maroon-light"></i>
                      </td>
                      <td><?=$this->lang->line('dashboard_email')?></td>
                    <td><?=$user->email?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class="fa fa-phone text-maroon-light"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_phone')?></td>
                    <td><?=$user->phone?></td>
                  </tr>
                  <tr>
                    <td>
                      <i class=" fa fa-globe text-maroon-light"></i>
                    </td>
                    <td><?=$this->lang->line('dashboard_address')?></td>
                    <td><?=$user->address?></td>
                  </tr>
                  <?php if ($usertype!='Admin') { ?>
                  <tr>
                    <td>
                      <i class="fa fa-file text-maroon-light"></i>
                    </td>
                    <td>Documents</td>
                    <?php if($docs->userID ==NULL){?>
                       <td><a href="<?= base_url('user/docupload/').$user->userID ?>"><button class="btn btn-danger btn-sm mrg">Upload Now</button></a></td>
                    <?php } else{ ?>
                      <td><button class="btn btn-success btn-sm mrg">Uploaded</button></td>
                    <?php }?>
                  </tr>
                    
                  <tr>
                    <td>
                      <i class=" fa fa-check text-maroon-light"></i>
                    </td>
                  
                    <td>Status (Current)</td>
                    <td><?php 
                  
                   $status= get_status_type();
                    echo $status[$user->status]; 
                  ?><hr>
                  <?php 
                  foreach($reason as $r)
                  {
                    $valuit=  $r->meta_value;
                  $myarray = unserialize($valuit);
                  if($myarray['reason']!=''){
                    echo $status[$myarray['status']];
                  echo ': ';
                  echo $myarray['reason'];
                  echo '<hr>';
                  }
                  }
                    
                 ?>
                    </td>
                  </tr>
                  <?php } ?>
              </tbody>
          </table>
          
        </section>
      <?php } ?>
