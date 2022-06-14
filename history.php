<?php include('includes/header.php');?>
<?php include('includes/left_content.php');?>

<div class="center_title_bar">Order History</div>

<div class="box_big">
	<?php
	if (!isset($_SESSION["useruid"])){
		echo '<div class="product_title_big">Ops! You do not have a history of purchase!</div>';
	} else {
	?>
	<table border = "1" border = "1" class="table_oh">
		<thead class="thead_oh">
			<tr>
				<td>Invoice #</td>
				<td>Invoice Date &nbsp;</td>
				<td>Product(s) &nbsp;</td>
				<td>Price &nbsp;</td>
				<td>Paymend Method &nbsp;</td>
			</tr>
		</thead>
		<tbody class="tbody_oh">
		<?php
			$uid = $_SESSION["userid"];
			$total_price = 0;
			$query = mysqli_query($dbc,"SELECT * from invoice WHERE Customer_ID = '$uid'");
			while($result = mysqli_fetch_array($query))
			{
		?>
				<tr>
					<td>
						<?=$result['Invoice_ID']?>&nbsp;
					</td>
					<td>
						<?=$result['Invoice_Date']?>&nbsp;
					</td>
					<td class="product_title">
						<?=$result['Product_Name']?>&nbsp;
					</td>
					<td>
						<?php
							echo '<span>' .$result['Product_Price']. ' SAR </span>';
							$total_price += $result['Product_Price'];
						?>&nbsp;
					</td>
					<td>
						<?php
							echo '<span>' .$result['Payment_Info']. '</span>';
						?>&nbsp;
					</td>
				</tr>
		<?php
			}
		?>

		</tbody>
	</table>
	<?php
	}
	?>
</div>

<?php include('includes/right_content.php');?>
<?php include('includes/footer.php');?>