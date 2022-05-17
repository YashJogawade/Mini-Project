<?php 
  $dbhost='localhost';
  $username='root';
  $pass='';
  $db='roomiee';
  $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
  
  $limit_per_page="6";
  $page="";
  if(isset($_POST["page_no"]))
  {  $page=$_POST["page_no"]; }
  else
  { $page=1;
  }
  
  $offset=($page-1)*$limit_per_page;
  $sql_total="Select * from room";
  $records=mysqli_query($con,$sql_total);
  $total_record=mysqli_num_rows($records);
  $total_pages=ceil($total_record/$limit_per_page);
  
  $previous=$page-1;
  if($previous==0)
  {  $previous=1; }
  $next=$page+1;
  if($next>$total_pages)
  { $next=$page; }
  
  $sql="Select * from room LIMIT $offset,$limit_per_page";
  $result=mysqli_query($con,$sql);
  
  if(mysqli_num_rows($result) >0)
  {         echo '<div class="product-grid-list" id="cards">
                  <div class="row mt-30">';

             while($row=mysqli_fetch_assoc($result))
			  {  echo '<div class="col-sm-12 col-lg-4 col-md-6">
                       <div class="product-item bg-light">			
	                   <div class="card">
		               <div class="thumb-content">
				          <img class="card-img-top img-fluid" src="data:image1;base64,'.base64_encode($row['image1']).'">
		               </div>
		               <div class="card-body">
		        <form method="post" action="Advertisement_Room.php">
		        <h4 class="card-title">'.$row['title'].'</h4>
		        <ul class="list-inline product-meta">
		    	<li class="list-inline-item">
		    		<i class="fa fa-folder-open-o"></i>'.$row['category'].'
		    	</li>
		    	<li class="list-inline-item">Price(Rs):'.$row['price'].'
		    	</li>
				<li class="list-inline-item">'.$row['location'].'
		    	</li>
				<input type="hidden" name="room_id" value='.$row['room_id'].'> 
		        </ul>
			    <div>  
			    <input type="submit" name="ViewAd" class="btn btn-primary" value="View Ad" style="height:30px; padding:2px 10px;">
		        </div>
			    </form>
		        </div>
	            </div> 
                </div>
		        </div>';
				}
			  echo "</div>
			        </div>
					
					
					<div class='pagination justify-content-center' id='pagination'>
					<nav aria-label='Page navigation example'>
						<ul class='pagination'>
						<div id='previous'>
							<li class='page-item'>
								<a class='page-link' aria-label='Previous' id='$previous'>
									<span aria-hidden='true'>&laquo;</span>
								</a>
							</li>
					    </div>
					";
					
                  				
					for($i=1;$i<=$total_pages;$i++)
					{ 
				      if($i==$page)
                      {  $class_name="page-item active";
                      }
                      else
                      {  $class_name="page-item";  }
				  
					  echo "
					        <li class='$class_name'><a class='page-link' id='$i'>".$i."</a></li>
							
					        ";
					  
					}
					echo "<div id='next'>
					        <li class='page-item'>
							    <a class='page-link' aria-label='Next' id='$next'>
									<span aria-hidden='true'>&raquo;</span>
								</a>
							</li>
						</div>
					     </ul>
					     </nav>
					     </div>";
   }
   else
   { echo "No result found";
   }
   mysqli_close($con);
 ?>