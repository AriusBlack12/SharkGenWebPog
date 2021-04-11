<?php
			
			echo'
			<div class="col-sm-3">
				<div class="tile-block tile-'. $color .'">
					
					<div class="tile-header">
						
						<a href="#sample-modal" data-toggle="modal" data-target="#sample-modal-dialog-'. $id .'">
						<i class="glyphicon glyphicon-cloud"></i>
						
						<a href="#">
							'. $name .'
							<span>Generate your '; if($name === "Steam"){echo
							'key';}
							else
							{echo 'account';} echo'!</span>
						</a>
					</div>
					
					<div class="tile-content">
					'; if($name === "Steam"){
					echo'
						<font color="white"><center><h2>***** <i class="entypo-minus"></i> ***** <i class="entypo-minus"></i> *****</h2></center></font>
						';}else{
						echo'
						<font color="white"><center><h2><i class="entypo-user"></i>:<i class="entypo-key"></i></h2></center></font>';} echo'
						<input type="text" class="form-control" readonly />
						
						
					</div>
					
					<div class="tile-footer">
						<button type="button" class="btn btn-block">Generate</button>
						<button type="button" class="btn btn-block">Copy</button>
					</div>
				</div>
				</div>
		';
		echo'
	<!-- ################################################# -->	
		<div class="modal fade" id="sample-modal-dialog-'. $id .'">
		<div class="modal-dialog">
			<div class="modal-content">
				
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
					<h4 class="modal-title">Configure color n°'.$id . '</h4>
				</div>
				
				<div class="modal-body">
				<form action="generator" method="POST">
			                <label>Color :</label></br>
           <select name="color" class="form-control" style="margin-bottom: 5px;" required>
<option value="blue">Blue</option>
<option value="cyan">Cyan</option>
<option value="red">Red</option>
<option value="green">Green</option>
<option value="aqua">Aqua</option>
<option value="purple">Purple</option>
<option value="pink">Pink</option>
<option value="orange">Orange</option>
<option value="brown">brown</option>
<option value="plum">Plum</option>
<option value="gray">Gray</option>
<option value="black">Black</option>
</select>
						               <div style="display:none;"> <label>ID :</label></br>
            <input type="text" name="idnews" class="form-control"  value="'. $id.'" readonly/></br></div>
			</div>
				
				<div class="modal-footer">
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					<button type="button submit" class="btn btn-primary">Save changes</button>
					</form>
				</div>
			</div>
		</div>
	</div> ';} ?>