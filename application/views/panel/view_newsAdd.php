<div class="row"><div class="col-md-12">
        
      
    <?php if(isset($message)) { echo "<h3 style='color:green;'>".$message."</h3>"; } ?>
 
        
	<?php echo form_open('PA/newsAdd'); ?>
       
               	<div class="form-group">
                    <input type="text" class="form-control" name="title" placeholder="Podaj tytuł" required>
		</div>
                <div class="form-group">
			 <textarea rows="3" cols="10" name="content" class="form-control" placeholder="Tresc" required ></textarea>
		</div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-warning pull-right">Submit</button>
                </div>
        <?php echo form_close(); ?>
        
</div></div>
