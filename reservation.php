<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";

	if(!isset($_SESSION['email'])) { 
        $_SESSION['error_message'] = 'You need to login first';

        header('Location: login.php');
    }
	
	$msg = "";

	
	if($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		if(isset($_POST['submit'])) {
			
			$guest = preg_replace("#[^0-9]#", "", $_POST['guest']);
			$name = htmlentities($_SESSION['nama'], ENT_QUOTES, 'UTF-8');
			$email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
			$phone = preg_replace("#[^0-9]#", "", $_POST['phone']);
			$date_res = htmlentities($_POST['date_res'], ENT_QUOTES, 'UTF-8');
			$time = htmlentities($_POST['time'], ENT_QUOTES, 'UTF-8');
			$suggestions = htmlentities($_POST['suggestions'], ENT_QUOTES, 'UTF-8');
			
			if($guest != "" && $name != "" && $email && $phone != "" && $date_res != "" && $time != "" && $suggestions != "") {
				
				$check = $db->query("SELECT * FROM reservation WHERE no_of_guest='".$guest."' AND name='".$name."' AND email='".$email."' AND phone='".$phone."' AND date_res='".$date_res."' AND time='".$time."' LIMIT 1");
				
				if($check->num_rows) {
					
					$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>You have already placed a reservation with the same information</p>";
					
				}else{
					
					$insert = $db->query("INSERT INTO reservation(no_of_guest, name, email, phone, date_res, time, suggestions) VALUES('".$guest."','".$name."', '".$email."', '".$phone."', '".$date_res."', '".$time."', '".$suggestions."')");
					
					if($insert) {
						
						$ins_id = $db->insert_id;
						
						$reserve_code = "BK_$ins_id";
						
						$msg = "<p style='padding: 15px; color: green; background: #eeffee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Booking berhasil dilakukan. Kode Booking Anda adalah  $reserve_code. Harap dicatat </p>";

						$_SESSION['id'] = $ins_id;

						header("location: menu.php");
						
					}else{
						
						$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Could not place reservation. Please try again</p>";
						
					}
					
				}
				
			}else{
				
				$msg = "<p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'>Incomplete form data or Invalid data type</p>";
				
				print_r($_POST);
				
			}
			
		}
		
	}
	
?>

<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>
	
<title>SARI RAOS</title>

<link rel="stylesheet" href="css/main.css" />

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>

	
</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>PESANAN</h2>
		<h3>MEJA</h3>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
		
		<form method="post" onsubmit="popup(this);" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form" id="form_submit">
			
			<h2 class="form_head"><span class=>PESAN MEJA</span></h2>
			<p class="form_slg">Kami menawarkan Anda layanan terbaik</p>
			
			<?php echo "<br/>".$msg; ?>
			
			<div class="left">
				
				<div class="form_group">
					 
					 <label>Jumlah Orang</label>
					<input type="number" placeholder="How many guests" min="1" name="guest" id="guest" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Nama</label>
					<input type="name" name="name" value="<?= $_SESSION['nama'] ?>" disabled >
					
				</div>
				
				<div class="form_group">
					
					<label>Email</label>
					<input type="email" name="email" placeholder="Enter your email" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Nomer Telepon</label>
					<input type="text" name="phone" placeholder="Enter your phone number" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Tanggal</label>
					<input type="date" name="date_res" placeholder="Select date for booking" required>
					
				</div>
				
				<div class="form_group">
					
					<label>Waktu</label>
					<input type="time" name="time" placeholder="Select time for booking" required>
					
				</div>
				
				
			</div>
			
			<div class="left">
				
				<div class="form_group">
					
                    <label>Pesan <small><b>(Bagaimana pengaturan yang Anda inginkan)</b></small></label>
					<textarea name="suggestions" placeholder="your suggestions" required></textarea>
					
				</div>
				
				<div class="form_group">

					<input type="submit" class="submit" name="submit" value="MAKE YOUR BOOKING" id="form_submit">
					<script>
					// 	document.getElementById("form_submit").onclick = function() {myFunction()};

					// 	function myFunction() {
					// 		document.getElementById("form_submmit").innerHTML = "YOU CLICKED ME!";
					// }
					</script>
					
				</div>
				
			</div>
			
			<p class="clear"></p>
			
		</form>
		
	</div>
	
</div>

<?php print_r($_SESSION);?>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
	
		<div class="contact">
			
			<div class="left">
				
				<h3>LOCATION</h3>
				<p>Jl. R.A Kartini Unit 2, Rimbo Bujang, Tebo</p>
				<p>JAMBI</p>
				
			</div>
			
			<div class="left">
				
				<h3>CONTACT</h3>
				<p>08054645432, 07086898709</p>
				<p>Website@gmail.com</p>
				
			</div>

			<p class="left"></p>
			
			<div class="icon_holder">
				
				<a href="#"><img src="image/icons/Facebook.png" alt="image/icons/Facebook.png" /></a>
				<a href="#"><img src="image/icons/Google+.png" alt="image/icons/Google+.png"  /></a>
				<a href="#"><img src="image/icons/Twitter.png" alt="image/icons/Twitter.png"  /></a>
				
			</div>
			
		</div>
		
	</div>
	
</div>

<div class="footer_parallax" onclick="remove_class()">
	
	<div class="on_footer_parallax">
		
		<p>&copy; <?php echo strftime("%Y", time()); ?> <span>SARI RAOS</span>. All Rights Reserved</p>

		
	</div>
	
</div>
	
</body>

</html>