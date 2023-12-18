<!-------------- Invoice List  ------------------>
<?php
//---------Database connection File---------------
include "db_connect.php";
?>
<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Invoice List</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.5.0/css/responsive.dataTables.min.css">
</head>

<body>
	<style type="text/css">
		a {
			text-decoration: none;
		}

		.error {
			color: red;

		}

		#eye {
			position: absolute;
			right: 35px;
			transform: translate(0%, 60%);

			cursor: pointer;
		}

		.fa {
			font-size: 20px;
			color: #7a797e;
			margin-left: -90%;
			position: static;
		}

		body {
			/* background-color: rgb(44, 167, 167); */
		}

		/* div.container { max-width: 1200px } */
	</style>
	<br>
	<br>
    <!---------------------------- Buttons ----------------------------->
	<div style="display:flex;justify-content: space-between;margin-left: 5%;margin-right: 5%;">
		<div>
			<a href="index.php" class="btn btn-secondary">
				<svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-person-add" viewBox="0 0 16 16">
					<path d="M12.5 16a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7Zm.5-5v1h1a.5.5 0 0 1 0 1h-1v1a.5.5 0 0 1-1 0v-1h-1a.5.5 0 0 1 0-1h1v-1a.5.5 0 0 1 1 0Zm-2-6a3 3 0 1 1-6 0 3 3 0 0 1 6 0ZM8 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4Z" />
					<path d="M8.256 14a4.474 4.474 0 0 1-.229-1.004H3c.001-.246.154-.986.832-1.664C4.484 10.68 5.711 10 8 10c.26 0 .507.009.74.025.226-.341.496-.65.804-.918C9.077 9.038 8.564 9 8 9c-5 0-6 3-6 4s1 1 1 1h5.256Z" />
				</svg>&nbsp;&nbsp;New Invoice</a>
		</div>
		<div>
			<a href="index.php" class="btn btn-secondary"><svg xmlns="http://www.w3.org/2000/svg" width="30" height="25" fill="currentColor" class="bi bi-box-arrow-in-right" viewBox="0 0 16 16">
					<path fill-rule="evenodd" d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z" />
					<path fill-rule="evenodd" d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
				</svg>&nbsp;&nbsp;Back</a>
		</div>
	</div>
	<br>
	<br>
	<!----------------- Datatable  ----------------------->
	<div class="container">
		<div class="row">
			<table id="example" class="display now-rap" style="width: 100%;">
				<thead>
					<tr>
						<th>Invoice No</th>
						<th>Name</th>
						<th>Phone No</th>
						<th>Product</th>
						<th>Price</th>
						<th>Bank Name</th>
						<th>Bank Address</th>
						<th>Account Holder</th>
						<th>Account No</th>
						<th>Branch Code</th>
						<th>IFSC code</th>
						<th>Address</th>
						<th>Action</th>
					</tr>
				</thead>
				<?php
				//SQL query for filtering invoice_no column
				$sql = 'SELECT Distinct(invoice_no) FROM invoice';
				$query = mysqli_query($conn, $sql);
				if (!$query) {
					die(mysqli_error($conn));
				} else {
					while ($row = mysqli_fetch_assoc($query)) {
						$invoice = $row['invoice_no'];
						echo "<tr><td>" . $row['invoice_no'] . "</td>";
						//SQL query for filtering name,phone columns
						$sql1 = "SELECT DISTINCT(name),phone From invoice WHERE invoice_no='$invoice'";
						$query1 = mysqli_query($conn, $sql1);
						while ($row1 = mysqli_fetch_assoc($query1)) {
							echo "<td>" . $row1['name'] . "</td><td>" . $row1['phone'] . "</td>";
						}
						echo "<td>";
						//SQL query for filtering product columns
						$sql2 = "SELECT * From invoice WHERE invoice_no='$invoice'";
						$query2 = mysqli_query($conn, $sql2);
						while ($row2 = mysqli_fetch_assoc($query2)) {
							echo $row2['product'] . "<br>";
						}
						echo "</td><td>";
						//SQL query for filtering price column
						$sql3 = "SELECT * From invoice WHERE invoice_no='$invoice'";
						$query3 = mysqli_query($conn, $sql3);
						while ($row3 = mysqli_fetch_assoc($query3)) {
							echo $row3['price'] . "<br>";
						}
						echo "</td>";
						//SQL query for filtering all columns
						$sql4 = "SELECT DISTINCT(name),phone,bank,bank_address,account_holder,account_no,branch_code,ifsc,address From invoice WHERE invoice_no='$invoice'";
						$query4 = mysqli_query($conn, $sql4);
						while ($row4 = mysqli_fetch_assoc($query4)) {
							echo "<td>" . $row4['bank'] . "</td><td>" . $row4['bank_address'] . "</td><td>" . $row4['account_holder'] . "</td><td>" . $row4['account_no'] . "</td><td>" . $row4['branch_code'] . "</td><td>" . $row4['ifsc'] . "</td><td>" . $row4['address'] . "</td>";
						}
						
				?>
				<!----------------- Buttons  --------------------->
						<td>
							<div style="display: flex;">
								<div><a href="pdf.php?invoice=<?php echo $row['invoice_no']; ?>" class="btn btn-primary edit"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-download" viewBox="0 0 16 16">
											<path d="M.5 9.9a.5.5 0 0 1 .5.5v2.5a1 1 0 0 0 1 1h12a1 1 0 0 0 1-1v-2.5a.5.5 0 0 1 1 0v2.5a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2v-2.5a.5.5 0 0 1 .5-.5" />
											<path d="M7.646 11.854a.5.5 0 0 0 .708 0l3-3a.5.5 0 0 0-.708-.708L8.5 10.293V1.5a.5.5 0 0 0-1 0v8.793L5.354 8.146a.5.5 0 1 0-.708.708l3 3z" />
										</svg></a>&nbsp;&nbsp;
								</div>
								<div><a href="print_invoice.php?invoice=<?php echo $row['invoice_no']; ?>" class='btn btn-danger'><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-printer" viewBox="0 0 16 16">
											<path d="M2.5 8a.5.5 0 1 0 0-1 .5.5 0 0 0 0 1" />
											<path d="M5 1a2 2 0 0 0-2 2v2H2a2 2 0 0 0-2 2v3a2 2 0 0 0 2 2h1v1a2 2 0 0 0 2 2h6a2 2 0 0 0 2-2v-1h1a2 2 0 0 0 2-2V7a2 2 0 0 0-2-2h-1V3a2 2 0 0 0-2-2zM4 3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1v2H4zm1 5a2 2 0 0 0-2 2v1H2a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h12a1 1 0 0 1 1 1v3a1 1 0 0 1-1 1h-1v-1a2 2 0 0 0-2-2zm7 2v3a1 1 0 0 1-1 1H5a1 1 0 0 1-1-1v-3a1 1 0 0 1 1-1h6a1 1 0 0 1 1 1" />
										</svg></a></div>
							</div>
						</td>
				<?php	 }
					echo "</tr>";
				}
				// }
				?>


			</table>
		</div>
		<br><br>

	</div>

<!-------------- CDNs for Datatable ------------------>
	<script src="https://code.jquery.com/jquery-3.7.0.js"></script>
	<script src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/responsive/2.5.0/js/dataTables.responsive.min.js"></script>


	<script type="text/javascript">
		//-------------- DataTable configution--------------
		new DataTable('#example', {
			responsive: true
		});
	</script>

</body>

</html>