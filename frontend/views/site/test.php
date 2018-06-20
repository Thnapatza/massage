
<div  class="container">
<div class="row">
	<div class="col-md-4"></div>
	<div class="col-md-8">
	
	<div class="row">
		<div class="panel panel-default">
		<div class="panel panel-body">
			<div class="row">
			<?php for ($i=0;$i<14;$i++) :?>
        			<div class="col-md-4">
                        	<div class="panel panel-default">
                          	<div class="panel-heading">Panel Heading</div>
                          	<div class="panel-body">Panel Content</div>
                        </div>
                 </div>
                 <?php endfor;?>
            </div>
       	</div>
		</div>
	</div>
	
	</div>
</div>
	
</div>

<!--                 	<div class="panel panel-default"> -->
             				
                				<h4>ประวัติการเล่น</h4> 
                				
                				
                				
                				<div class="col-md-4">
  
                					</div>
                				
<!--                 			</div> -->
        	</div>
   
        	
                    	<!-- Modal -->
                    <div id="<?= $r->hangout_id ?>" class="modal fade" role="dialog">
                      <div class="modal-dialog">
                    
                        <!-- Modal content-->
                        <div class="modal-content">
                          <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title">ให้คะแนน</h4>
                          </div>
                          <div class="modal-body">
                                	<div class="checkbox">
                                		
              						<label><input type="checkbox" value=""><?= $r->user->username ?></label>
            						</div>
                          </div>
                          <div class="modal-footer">
                          	<button class="btn btn-primary">ยืนยัน</button>
        <!--                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button> -->
                          </div>
                        </div>
                    
                      </div>
                    </div>