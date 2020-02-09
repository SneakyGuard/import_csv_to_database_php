
	

<body class="main-body">
<br><br><br><br>
<div class="uploadmain-div container">
	<!-- <div class="form-group" style="width:20%;float:left;">
	   <a class="anchor_class" href="http://www.onlinestudys.com">Onlinestudys.com</a>
	 </div>
	 <div class="form-group" style="width:70%;float:right;">
	   <a class="anchor_class" href="http://www.onlinestudys.com">Upload File In Codeigniter With ProgressBar </a>
	</div> -->
	
	<form id="imageupload" action="<?php echo base_url('pdf/save_big');?>" method="post">

		    <div class="row">
			  <div class="col-sm-9">			
				  <div class="form-group">
				   <div id="progressbr-container">
						<div  id="progress-bar-status-show">	</div>				
					</div>
				  </div>
			  </div>
			
			   <div class="col-sm-9">  	
				  	<div class="form-group">
				    	<label for="image">Upload Image</label>
				    	<input name="files_big" id="image_up_id" type="file" class="demoInputBox form-control" />
			  		</div>
			  	</div>
			</div>  		

		  	<div class="row">
			   <div class="col-sm-9">
			  		<div class="form-group">
			   			<input type="submit"  value="Upload Image" class="btn btn-success" />
			  		</div>
			  	</div>
			  	<div class="col-sm-9">
				  	<div class="form-group">
					   	<div id="toshow" style="visibility:hidden;"></div>
					</div>
				</div>	
			</div>
			<div class="row">
			  	<div class="col-sm-9">			  
		  			<div class="form-group">
		   				<div id="imageDiv" style="display:none;color:red;"><strong>Your Uploaded Image :-</strong>  </div>
		   			</div>
		   		</div>
		   		<div class="col-sm-9">	
				   	<div class="form-group">
						<div id="loader" style="display:none;">
						<img  src="<?php echo base_url('assets/images/LoaderIcon.gif');?>" />
						</div>
					</div>	
				</div>
			</div>		
	</form>
</div>	

<script>

