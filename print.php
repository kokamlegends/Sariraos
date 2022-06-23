<?php 
	
	session_start();
	require "admin/includes/functions.php";
	require "admin/includes/db.php";
	error_reporting(0);

    if(!isset($_SESSION['email'])) {
        $_SESSION['error_message'] = 'You need to login first';

        header('Location: login.php');
    }

    $noboking = $_SESSION['addr'];
    $sql = $db->query("SELECT * FROM basket WHERE address='$noboking' LIMIT 1");
    while ($row = $sql->fetch_assoc()) {
        $id_ord = $row['id'];
        $total = $row['total'];
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

<style>
    .table {
        padding:20px;
        width: 100%;
        margin:20px;
        float:right;
        border-collapse: collapse;
    }

    .table th, .table td {
        align:left;
        background-color:yellow;
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
    .button{
        text-decoration:none;
        color:white;
        background: #1e9500;
        border-radius:5px;
        width: 200px;
        height:auto;

    }
</style>

<script src="js/jquery.min.js" ></script>

<script src="js/myscript.js"></script>
<textarea id="printing-css" style="display:none;">.no-print{display:none}</textarea>
<iframe id="printing-frame" name="print_frame" src="about:blank" style="display:none;"></iframe>
<script type="text/javascript">
function printDiv(elementId) {
 var a = document.getElementById('printing-css').value;
 var b = document.getElementById(elementId).innerHTML;
 window.frames["print_frame"].document.title = document.title;
 window.frames["print_frame"].document.body.innerHTML = '<style>' + a + '</style>' + b;
 window.frames["print_frame"].window.focus();
 window.frames["print_frame"].window.print();
}
</script>



</head>

<body>
	
<?php require "includes/header.php"; ?>

<div class="content" id="id-elemen-yang-ingin-di-print" onclick="remove_class()">
    <div class="inner_content">
        <div class="left">
            <table class="table" border="1px" width="400px">
                <tr>
                    <td colspan="2" align="center"><h3>Sari Raos</h3></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><p>Bukti order</p></td>
                </tr>
                <tr>
                    <td colspan="2"><br></td>
                </tr>
                <tr>
                    <th><p>No. Booking  </p></th>
                    <td><p><?= $noboking ?></p></td>
                </tr>
                <tr>
                    <th>No. Order  </th>
                    <td><?= "ORD_".$id_ord ?></td>
                </tr>
                <tr>
                    <td colspan="2"><br></td>
                </tr>
                <tr>
                    <th><p>Total Order  </p></th>
                    <td><?= "Rp.". $total ?></td>
                </tr>
            </table>
        </div>
        <div class="right">
            <br>
            <br>
            <br>
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
            <br>
            <br>
            <br>
        </div>
    </div>
</div>

<div class="content print">
    <div class="inner_content">
        <div class="left">
            <a class="button" href="javascript:printDiv('id-elemen-yang-ingin-di-print')">Print Disini</a>
        </div>
    </div>
</div>
<div class="content print" onclick="remove_class()">
	
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

<div class="footer_parallax print" onclick="remove_class()">
	
	<div class="on_footer_parallax">
		
		<p>&copy; <?php echo strftime("%Y", time()); ?> <span>SARI RAOS</span>. All Rights Reserved</p>
		
	</div>
	
</div>

</body>

</html>