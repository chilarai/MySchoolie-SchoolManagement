<div class="widget-box">
            <div class="widget-title"> <span class="icon"> <i class="icon-th"></i> </span>
            <h5>App Abouts</h5>
             </div>
          <div class="widget-content ">
            <table class="table table-bordered table-striped with-check">
              
              <tbody>
                <tr>
                  
                  <td>Version</td>
                  <td><?php echo $response['details']['api_version'];?></td>
                  </tr>
                <tr>
                  
                  <td>App Name</td>
                  <td><?php echo $response['details']['app_name'];?></td>
                </tr>
                <tr>
                 
                  <td>Website</td>
                  <td><?php echo $response['details']['website'];?></td>
                </tr>
                <tr>
                 
                  <td>Contact</td>
                  <td><?php echo $response['details']['contact'];?></td>
                </tr>
                <tr>
                  
                  <td>Abouts</td>
                  <td><?php echo $response['details']['about_app'];?></td>
                </tr>
                <tr>
                 
                  <td>Logo</td>
                  <td><?php echo $this->Html->image($response['details']['logo'],['height'=>'20']);?></td>
                </tr>
              </tbody>
            </table>
          </div>

        </div>
