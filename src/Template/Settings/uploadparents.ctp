<div class="widget-box">

	<div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
	  <h5>Upload</h5>
    <?php if(!empty($response['message'])){echo "<center>".$response['message']."</center>";}?>
	</div>
	<div class="widget-content nopadding">
	  <?php echo $this->Form->create('upload',['type'=>'file','method'=>'POST','class'=>'form-horizontal']);?>
	    <div class="control-group">
          <label class="control-label">File upload</label>
          <div class="controls">
            <input type="file"  name="filename"/>
          </div>
        </div>

	    <div class="form-actions">
	      <input type="submit" class="btn btn-success" name="save" value="Submit"/>
	    </div>
	  </form>
	</div>



</div>
