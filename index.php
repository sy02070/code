<?php 
	include "login.php";
?>
<?php 
	include "head.php";
	?>
<?php 
	include "top.php";
    ?>
    <?php 
	include "header.php";
	?>
	<?php 
	include "navigation.php";
	?>
	<?php 
	include "sider.php";
    ?>
    					<div class="row">
				<div class="col-lg-12">
					<div class="heading"><h2>Sách đang khuyến mãi</h2></div>
	
					<div class="products">
					<?php
   require 'inc/truyvan.php';
   if ($result->num_rows > 0) {
	   // output data of each row
	   while($row = $result->fetch_assoc()) {

?>
						<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
							<div class="product">
								<div class="image"><a href="product.php?id=<?php echo $row["ID"]?>"><img src="images/<?php echo $row["HinhAnh"]?>" style="width:300px;height:300px" /></a></div>
								<div class="caption">
									<div class="name" style="height:50px"><h3><a href="product.php?id=<?php echo $row["ID"]?>"><?php echo $row["Ten"]?></a></h3></div>
									<div class='star-rating'>
                                  		<ul class='list-inline' style="color:yellow; font-size:20px">
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star'></i></li>
                                    		<li class='list-inline-item'><i class='glyphicon glyphicon-star-empty'></i></li>
                                  		</ul>
                                	</div>
									<div class="price" style="color: red;"><?php echo currency_format($row["giakhuyenmai"]) ?><span style="font-size: 14px;"><?php echo currency_format($row["Gia"]) ?></span></div>
								
								<div class="g-plusone" data-size="medium" data-annotation="none" data-href="/product.php?id=<?php echo $row["ID"] ?>"></div>
								</div>
							</div>
			
						</div>
						<?php
		}
	}
					?>
					</div>
		

			     </div>

				 </div>
			
			<?php 
	include "sanphamoinhat.php"
	?>
	

			 </div>

			 </div>
		</div>
	</div>
   <?php 
	include "footer.php"
	?>
    </body>
</html>