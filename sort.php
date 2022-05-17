<?php
  $dbhost='localhost';
  $username='root';
  $pass='';
  $db='roomiee';
  $con= mysqli_connect("$dbhost","$username","$pass","$db") ;
   
  $val=$_POST['value'];
  if($val=="1")
  {  $sql="Select * from room ORDER BY price ASC";
     $result=mysqli_query($con,$sql);
	 if($result)
	 {   echo '<div class="product-grid-list" id="cards">
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
			  echo '</div>
			        </div>';
	}
 }
 else if($val=="2")
 {  $sql="Select * from room ORDER BY price DESC";
     $result=mysqli_query($con,$sql);
	 if($result)
	 {   echo '<div class="product-grid-list" id="cards">
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
			  echo '</div>
			        </div>';
	 }
 }
 else 
 { echo "No result found";
 }
 mysqli_close($con);
 ?>
	 