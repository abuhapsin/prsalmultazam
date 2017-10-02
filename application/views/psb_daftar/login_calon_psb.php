<fieldset>
  	<div class="container">
    	<form action="<?php echo base_url('psb_daftar/proses_login'); ?>" method="post" class="form-horizontal">  
    		<div class="form-group">
    			<div class="form-group">
					<label class="col-sm-2" style="width: 100%;">USERNAME</label>
					<div class="col-xs-3" style="width: 20%;"><input type="text" class="form-control" name='username' maxlength="20" size='20' required='true'></div>
				</div>
				<div class="form-group">
                    <label class="col-sm-2" style="width: 100%;">PASSWORD</label>
                    <div class="col-xs-3" style="width: 20%;"><input type="text" name="password" class="form-control" size="10" required='true'/></div>
                </div>
				
            	<button type="submit" name="submit" id="submit" class="btn btn-primary">Login</button>
            	<button type="reset" name="reset" class="btn btn-danger">Reset</button>
           </div>
    	</form>
    </div>
</fieldset>