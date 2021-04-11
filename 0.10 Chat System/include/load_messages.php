							<?php 
							include("settings.php");
							$allchats = mysqli_query($con, "SELECT * FROM chat ORDER BY id DESC") or die(mysqli_error($con));
								while($row = mysqli_fetch_array($allchats)){
									echo'
							<p><font color="red">'. $row['date'] .'</font> - <b>'. htmlentities($row['username']) .'</b>: '. htmlentities($row['message']) .'</p>
								';}
							?>