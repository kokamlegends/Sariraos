<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";

    if(isset($_SESSION['email'])) {
        header('Location: index.php');
    }

    if(isset($_POST['submit'])) {
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $get_cust = $db->query("SELECT * FROM customers WHERE email = '$email' AND password = '$password'");
        $row = mysqli_fetch_array($get_cust,MYSQLI_ASSOC);         
        
        if($get_cust->num_rows) {
            $_SESSION['email'] = $_POST['email'];
            $_SESSION['nama'] = $row['name'];

            header('Location: index.php');
        } else {
            $_SESSION['error_message'] = 'Email or password is incorrect';
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
		
		<h2>LOGIN</h2>
		
	</div>
	
</div>

<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class=>Login Here</span></h2>
		
		<div class="inner_content">
			
			<form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="hr_book_form">
			
			<br>

            <?php
                if(isset($_SESSION['success_message'])) {
            ?>
                <p style='padding: 15px; color: green; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'><?= $_SESSION['success_message'] ?></p>
            <?php
                } elseif(isset($_SESSION['error_message'])) {
            ?>
             <p style='padding: 15px; color: red; background: #ffeeee; font-weight: bold; font-size: 13px; border-radius: 4px; text-align: center;'><?= $_SESSION['error_message'] ?></p>
            <?php
                }

                unset($_SESSION['success_message']);
                unset($_SESSION['error_message']);
            ?>

            <div style="display: flex; justify-content: center;">
                <div class="left">
                    
                    <div class="form_group">
                         
                         <label style="text-align: left">Email</label>
                        <input type="email" placeholder="Enter your email" name="email" id="email" required>
                        
                    </div>
                    
                    <div class="form_group">
                        
                        <label style="text-align: left">Password</label>
                        <input type="password" name="password" placeholder="Enter your password" id="password" required>
                        
                    </div>

                    <div class="form_group" style="margin-top: 10px">
                        <p>Dont have an account? register <a href="register.php">here</a></p>
                    </div>
    
                    <div class="form_group">
                        
                        <input type="submit" class="submit" name="submit" value="LOGIN" />
                        
                    </div>
                    
                    
                </div>

            </div>
			
			<p class="clear"></p>
			
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