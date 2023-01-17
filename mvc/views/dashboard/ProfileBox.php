      <?php if(customCompute($user)) { ?>
        <section class="panel bg-light-success p-6">
          <div class="profile-db-head bg-maroon-light">
            <a href="<?=base_url('profile/index')?>">
              <?=img(imagelink($user->photo));?>
            </a>

            <h1><?=$user->name?></h1>
            <p><?=$usertype?></p>

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
                  <tr>
                    <td>
                      <i class=" fa fa-check text-maroon-light"></i>
                    </td>
                    <td>Status (Current)</td>
                    <td><?php $status= get_status_type();
                    echo $status[$user->active]; 
                  ?><hr>
                  <?php 
                  foreach($reason as $r)
                  {
                    $valuit=  $r->meta_value;
                  $myarray = unserialize($valuit);
                  echo $status[$myarray['status']];
                  echo ': ';
                  echo $myarray['reason'];
                  echo '<hr>';
                  }
                  
                 ?>
                    </td>
                  </tr>
              </tbody>
          </table>
        </section>
      <?php } ?>