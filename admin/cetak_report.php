<?php 
	
	session_start();
	require "includes/functions.php";
	require "includes/db.php";
    if(!isset($_SESSION['user'])) {
        header("location: logout.php");
    }
	
	$result = "";
	$pagenum = "";
	$per_page = 20;
    $tgl_mulai = $_GET['tgl_mulai'];
    $tgl_akhir = $_GET['tgl_akhir'];
		
    $cat = $db->query("SELECT * FROM basket WHERE (date_made between '$tgl_mulai' and '$tgl_akhir')");
    
    if($cat->num_rows) {
        
        $result = "<table class='table table-bordered'>
                    <thead>
                        <th>S/N</th>
                        <th>Customer Name</th>
                        <th>Code BK</th>
                        <th>Date</th>
                        <th>Total</th>
                        <th>Status</th>
                        <th>Detail Order</th>
                    </thead>
                    <tbody>";
        
        $x = 1;
			
			while($row = $cat->fetch_assoc()) {
				
				$id = $row['id'];
				$cust_name = $row['customer_name'];
                $address = $row['address'];
				$date = $row['date_made'];
				$total = 'Rp '.$row['total'].',000';
				$status = $row['status'];
                $detail = '';

                $detail_order = $db->query("SELECT * FROM items WHERE order_id = '$id'");
                
                while($data_detail_order = $detail_order->fetch_assoc()) {
                    $detail .= $data_detail_order['food'].' ('.$data_detail_order['qty'].') <br>';
                }
				
				$result .=  "<tr>
								<td>$x</td>
								<td>$cust_name</td>
                                <td>$address</td>
								<td>$date</td>
								<td>$total</td>
								<td>$status</td>
                                <td>$detail</td>
							</tr>";
																
									
				$x++;
			}
			
			$result .= "</tbody>
						</table>";
			
		}else{
			
			$result = "<p style='color:red; padding: 10px; background: #ffeeee;'>No records available in the database yet</p>";
			
		}

    $tgl_mulai = ($tgl_mulai ? date('d-m-Y', strtotime($tgl_mulai)) : '-');
    $tgl_akhir = ($tgl_akhir ? date('d-m-Y', strtotime($tgl_akhir)) : '-');
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
            <h4>Rekapitulasi laporan dari tanggal <?= $tgl_mulai ?> sampai tanggal <?= $tgl_akhir ?></h4>
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
