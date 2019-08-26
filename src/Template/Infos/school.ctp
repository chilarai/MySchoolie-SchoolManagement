<div class="widget-box">
 	<div class="widget-content ">
	<div class="widget-title">
	  <h5>School Info</h5>
	</div>
  <form enctype="multipart/form-data" method="post">
            <table class="table table-bordered table-striped with-check">
              <tbody>
              <tr>
                  <td>Photo</td>
                  <td><?php echo $this->Html->image(BASE_URL.'webroot/uploads/images/'.$response['details']['other_details']['logo'],['height'=>'100']);?>
                    <input type = "file" name = "upload_file">
                  </td>
                </tr>

                <tr>
                  <td>School Name</td>
                  <td><input type="text" name ="schoolname" class = "form-control" value= "<?php echo $response['details']['school_name'];?>"></td>
                </tr>
                <tr>
                  <td>School Time</td>
                  <td><input type="text" name ="schooltime" class = "form-control" value= "<?php echo $response['details']['other_details']['school_timing'];?>">
                  </td>
                  </tr>
                <tr>
                  <td>Address</td>
                  <td><input type="text" name ="schooladdress" class = "form-control" value= "<?php echo $response['details']['other_details']['address'];?>">
                  </td>
                </tr>
                <tr>
                  <td>Phone No</td>
                  <td><input type="text" name ="schoolphone" class = "form-control" value= "<?php echo $response['details']['other_details']['phone'];?>">
                  </td>
                </tr>
                <tr>
                  <td>E-mail Id</td>
                  <td><input type="text" name ="schoolemail" class = "form-control" value= "<?php echo $response['details']['other_details']['email'];?>">
                  </td>
                </tr>
                <tr>
                  <td>Website</td>
                  <td><input type="text" name ="schoolwebsite" class = "form-control" value= "<?php echo $response['details']['other_details']['website'];?>">
                  </td>
                </tr>
                <tr>
                  <td>Alt Phone</td>
                  <td><input type="text" name ="schoolaltphone" class = "form-control" value= "<?php echo $response['details']['other_details']['alt_phone'];?>">
                  </td>
                </tr>
             
              </tbody>
            </table>
            <input type="hidden" name ="schoollat" class = "form-control" value= "<?php echo $response['details']['other_details']['lat'];?>">
            <input type="hidden" name ="schoollon" class = "form-control" value= "<?php echo $response['details']['other_details']['lon'];?>">
            <input type="hidden" name ="schoollogo" class = "form-control" value= "<?php echo $response['details']['other_details']['logo'];?>">
            <input type="submit" name="update" value="Update">
  </form>          
</div>

<!-- <div class="widget-content ">
<object type="text/html" data="https://maps.google.co.uk/maps?f=q&amp;source=s_q&amp;hl=en&amp;geocode=&amp;q=BH20+5QT&amp;aq=&amp;sll=50.638194,-2.206535&amp;sspn=0.048883,0.100851&amp;t=m&amp;ie=UTF8&amp;hq=&amp;hnear=East+Lulworth+BH20+5QT,+United+Kingdom&amp;ll=50.638085,-2.181816&amp;spn=0.021774,0.049009&amp;z=14&amp;iwloc=A&amp;output=embed" style="width:1000px; height:400px;">
</object></div> -->



<div class="widget-content ">
<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3509.205942704165!2d76.9404517149689!3d28.413042082504827!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d3d8aa1f13123%3A0x22af0d92a23cfb69!2sSanskar+Jyoti+School!5e0!3m2!1sen!2sin!4v1503326867757" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
<div>