<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	error_reporting(0);

    if(!isset($_SESSION['email'])) {
        $_SESSION['error_message'] = 'You need to login first';

        header('Location: login.php');
    }

    $email_cust = $_SESSION['email'];
    $sql = $db->query("SELECT * FROM customers WHERE email='$email_cust' LIMIT 1");
    while ($row = $sql->fetch_assoc()) {
        $id_cust = $row['id'];
    }

    $arr_items = [];
    $address = $_SESSION['addr'];
    $orders = $db->query("SELECT * FROM basket WHERE address = '$address'");

?>

<!Doctype html>

<html lang="en">

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

<meta name="description" content="" />

<meta name="keywords" content="" />

<head>
	
<title>SARI RAOS</title>

<link rel="stylesheet" href="css/main.css" />

<style>
    .table {
        width: 100%;
        border-collapse: collapse;
    }

    .table th, .table td {
        border: 1px solid black;
        padding: 10px;
    }

    @media print{
        .noprint {display:none;}
    }
    .cetak{
        text-decoration:none;
        background: #1e9500;
        float:right;     
	    color: #fff;
	    height: 30px;
	    border: 1px solid #1e9500;
	    font-family: verdana;
	    font-size: 19px;
	    border-radius: 4px;
        text-align:center;
    }
</style>

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>

</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="parallax_basket" onclick="remove_class()">
	
	<div class="parallax_head_basket">
		
		<h2>Riwayat Order</h2>
		<h3>Anda</h3>
		
	</div>
	
</div>

<div class="content remove_pad" onclick="remove_class()">
	
	<div class="inner_content on_parallax">
		
		<h2><span class=>Riwayat Order</span></h2>
        <?php
          if($orders->num_rows == 0) {  
        ?>
        <h3 style=' text-align: center; font-weight: lighter; padding: 10px 0px; background: #ffeeee; color: #333;'>Riwayat order masih kosong</h3>
		<?php
          } else {
        ?>
		<div class="order_holder">
			
			<table class="table">
                <thead>
                    <tr>
                        <th>ORDER ID</th>
                        <th>NAME</th>
                        <th>CODE BK</th>
                        <th>ORDER</th>
                        <th>QTY</th>
                        <th>STATUS</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        while ($row = $orders->fetch_assoc()) {
                            $order_id = $row['id'];
                            $_SESSION['ord'] = "ORD_".$row['id'];
                            $_SESSION['addr'] = $row['address'];
                            $_SESSION['total'] = $row['total'];

                            // get items by order_id
                            $items = $db->query("SELECT * FROM items WHERE order_id = $order_id");
                            while ($item = $items->fetch_assoc()) {
                                $arr_items[] = $item;
                            }
                    ?>
                        <tr>
                            <td rowspan="<?= count($arr_items) ?>">ORD_<?= $row['id'] ?></td>
                            <td rowspan="<?= count($arr_items) ?>"><?= $row['customer_name'] ?></td>
                            <td rowspan="<?= count($arr_items) ?>"><?= $row['address'] ?></td>
                            <td><?= $arr_items[0]['food'] ?></td>
                            <td><?= $arr_items[0]['qty'] ?></td>
                            <td rowspan="<?= count($arr_items) ?>"><?= ucfirst($row['status']) ?></td>
                        </tr>
                        <?php
                            unset($arr_items[0]);
                            if(count($arr_items)) {
                                foreach($arr_items as $item) {
                        ?>
                            <tr>
                                <td><?= $item['food'] ?></td>
                                <td><?= $item['qty'] ?></td>
                            </tr>
                        <?php
                            }
                        }
                        ?>
                        <tr>
                            <td colspan="5" align="right">Total</td>
                            <td>Rp <?= number_format($row['total']) ?></td>
                        </tr>
                    <?php
                        }
                    ?>
                </tbody>
            </table>
		</div>
        <?php
          }
        ?>
	</div>  
</div>

<div class="content" onclick="remove_class()">
    <div class="inner_content">
        <div class="right noprint">
            <h3>Pembayaran :</h3><br>
            <i>Pembayaran harus Sesuai Denagan Nama Pemesan,jika tidak pesanan tidak kami confirm.</i><br>
            <ol>
                <li>
                    <ul>
                        <p>Transfer Bank : </p>
                        <li>BRI 09xxxx</li>
                        <li>BNI 09xxxx</li>
                    </ul>
                </li>
                <li>
                    <p>Bayar Ditempat (Transfer DP Rp.50k untuk confirm  pesanan)</p>
                </li>
            </ol>
        </div>
        <div class="left">
          <a href="print.php" class="cetak" onclick="cetakdata()">Print Disini</a>
        </div>
    </div>
</div>

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