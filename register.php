<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";

    if(isset($_SESSION['email'])) {
        header('Location: index.php');
    }

    if(isset($_POST['submit'])) {
        $fullname = $_POST['name'];
        $email = $_POST['email'];
        $password = md5($_POST['password']);
        $contact_number = $_POST['contact_number'];
        $address = $_POST['address'];

        $insert = $db->query("INSERT INTO customers(name, contact_number, email, password, address) VALUES('".$fullname."', '".$contact_number."', '".$email."', '".$password."', '".$address."')");         

        if(!$db->error) {
            $_SESSION['success_message'] = 'Register success, please login';

            header('Location: login.php');
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

<style>
    img[src*="https://cloud.githubusercontent.com/assets/23024110/20663010/9968df22-b55e-11e6-941d-edbc894c2b78.png"] {
    display: none;}
</style>

</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax" onclick="remove_class()">
	
	<div class="parallax_head">
		
		<h2>REGISTER</h2>
		
	</div>
	
</div>

<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class="fresh">Register Here</span></h2>
		
		<div class="inner_content">
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form">
			
			<br>

            <div style="display: flex; justify-content: center;">
                <div class="left">
                    
                    <div class="form_group">
                         
                        <label style="text-align: left">Name</label>
                        <input type="text" placeholder="Enter your full name" name="name" id="name" required>

                    </div>

                    <div class="form_group">
                         
                         <label style="text-align: left">Email</label>
                        <input type="email" placeholder="Enter your email" name="email" id="email" required>
                        
                    </div>

                    <div class="form_group">
                        
                        <label style="text-align: left">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" id="password" required>
                        
                    </div>

                    <div class="form_group">
                         
                         <label style="text-align: left">Phone Number</label>
                        <input type="text" placeholder="Enter your phone number" name="contact_number" id="contact_number" required>
                        
                    </div>

                    <div class="form_group">
                         
                         <label style="text-align: left">Address</label>
                        <input type="text" placeholder="Enter your address" name="address" id="address" required>
                        
                    </div>

                    <div class="form_group" style="margin-top: 10px">
                        <p>Already have an account? login <a href="login.php">here</a></p>
                    </div>
    
                    <div class="form_group">
                        
                        <input type="submit" class="submit" name="submit" value="REGISTER" />
                        
                    </div>
                    
                    
                </div>

            </div>
			
		</form>
			
		</div>
		
	</div>
	
</div>

<div class="content" onclick="remove_class()">
	
	<div class="inner_content">
		
		<div class="contact">
			
			<div class="left">
				
				<h3>LOCATION</h3>
				<p>Jl. R.A Kartini Unit 2, Rimbo Bujang, Tebo </p>
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