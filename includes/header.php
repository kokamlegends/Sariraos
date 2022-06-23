<header class="print">
	
	<div class="nav_toggle" onclick="toggle_class();">
		
		<span class="toggle_icon"></span>
		
	</div>
	
	<div onclick="remove_class()">
	
	<div class="main_nav">
		
		<h2>RUMAH MAKAN SARI RAOS</h2>
		
		<ul class="default_links">
			
			<li><a href="index.php">Home</a></li>
			<li><a href="reservation.php">Pesan Meja</a></li>
			<li><a href="gallery.php">Gallery</a></li>
			<li><a href="basket.php">Keranjang</a></li>
            <li><a href="order.php">Riwayat Order</a></li>
            <?php
                if(!isset($_SESSION['email'])) {
            ?>
                <li><a href="login.php">Login</a></li>
            <?php
                } else {
            ?>
                <li><a href="logout.php">Logout</a></li>
            <?php
                }
            ?>
			
		</ul>
		
		<p class="clear"></p>
		
	</div>
	
	<p class="clear"></p>
	
	</div>
	
</header>

<div class="responive_nav">
	
	<div class="nav_section_img">
		
		<div class="nav_section_div">
			
			<h3>RUMAH MAKAN SARI RAOS</h3>
			
		</div>
		
	</div>
	
	<div class="nav_section">
		
		<ul>
			
			<li><a href="index.php"><span class="home">Home</span></a></li>
			<li><a href="menu.php"><span class="menu">Menu</span></a></li>
			<li><a href="reservation.php"><span class="reserve">Pesan Meja</span></a></li>
			<li><a href="gallery.php"><span class="gallery">Gallery</span></a></li>
			<li><a href="basket.php"><span class="order">Order</span></a></li>
			
		</ul>
		
	</div>
	
</div>