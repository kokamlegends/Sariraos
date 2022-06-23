<?php 
	
	session_start();
	require "includes/functions.php";
	require "includes/db.php";
    if(!isset($_SESSION['user'])) {
        header("location: logout.php");
    }
	
    $cat = $db->query("SELECT * FROM customers");
		
    if($cat->num_rows) {
        
        $result = "<table class='table table-hover table-striped'>
                    <thead>
                        <th>S/N</th>
                        <th>Customer Name</th>
                        <th>E-mail</th>
                        <th>Address</th>
                        <th>Contact Number</th>
                    </thead>
                    <tbody>";
        
        $x = 1;
        
        while($row = $cat->fetch_assoc()) {
            
            $id = $row['id'];
            $cust_name = $row['name'];
            $address = $row['address'];
            $email = $row['email'];
            $CN = $row['contact_number'];
            
            $result .=  "<tr>
                            <td>$x</td>
                            <td>$cust_name</td>
                            <td>$address</td>
                            <td>$email</td>
                            <td>$CN</td>
                        </tr>";
                                                            
                                
            $x++;
        }
        
        $result .= "</tbody>
                    </table>";
        
    }else{
        
        $result = "<p style='color:red; padding: 10px; background: #ffeeee;'>No records available in the database yet</p>";
        
    }
?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/favicon.ico">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>SARI RAOS</title>


    <!-- Bootstrap core CSS     -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />

    <style>
        @media print {
            .btn {
                display: none;
            }
        }
    </style>
	
</head>
<body>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12" style="margin-top:50px">
            <center>
            <h4> SARI RAOS </h4>
            <h4>Rekapitulasi Laporan User</h4>
            </center>
            <button type="button" onclick="window.print()" class="btn btn-sm btn-secondary">Print Laporan</button>
            <hr>
            <?php echo $result; ?>
            <div class="col-lg-12" style="margin-top:50px">
            <p align="right"> Jambi, 02 Juni 2022 </p>
            <p align="right"> Pimpinan  </p>
            <div class="col-lg-12" style="margin-top:80px">
            <hr size="10px" width="18%" align="right">
        </div> 
    </div>
</div>

<script>
    window.print();
</script>

</body>

</html>
