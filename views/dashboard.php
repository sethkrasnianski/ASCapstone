<?php get_header(); ?>
	<?php  isset($_SESSION['UserID']) ? get_nav($_SESSION['Company']) : get_nav('Welcome'); ?>
	<div class="page">
		<div class="dashboard">
			<?php if($orderResponse){ // ORDER PLACED ?>
				<h1><?php echo $orderResponse; ?></h1>
				<script type="text/javascript">
					setTimeout(function() {
						window.location.href = '?action=dashboard';
					},2500);
				</script>
			<?php } else { ?>
				<?php 
				// ADMIN
				if($_SESSION['PermissionLevel'] <= 2) {
					
					echo "what's up admin / employee?";

				// CUSTOMER - EXISTING
				} else if($_SESSION['NewUser'] === 0) { ?>
					<h1>Since you do not have any orders,</h1>
					<p class="newOrder">You may want to start with <a class="bebas" href="?action=newOrder">creating an order</a>.</p>

				<?php
				// CUSTOMER NEW
				} else if($_SESSION['NewUser'] === 1) {
					$orders = getUserOrders($_SESSION['UserID']);
					date_default_timezone_set('America/New_York');
					$i = 0;
					foreach ($orders as $order) { ?>
						<div class="orderWrap <?php if($i%2) {echo "odd";} ?>">
							<?php $product = getOneProduct($order['ProductID']); ?>
							<?php $i++; ?>
							<form action="." method="post" class="all center">
								<div class="orderNumber">
									<label>Order Number</label>
									<input disabled="true" value="<?php echo $order['OrderDetailID']; ?>" />
								</div>
								<div class="product">
									<label>Product Name</label>
									<input disabled="true" value="<?php echo $product[0]['ProductName']; ?>" />
								</div>
								<div class="clearall"></div>
								<div class="quantity">
									<label>Qty</label>
									<input disabled="true" value="<?php echo $order['Quantity']; ?>" />
								</div>
								<div class="totalPrice">
									<label>Total Price</label>
									<input disabled="true" value="<?php echo $order['PricePaid']; ?>" />
								</div>
								<div class="orderDate right">
									<label>Order Date</label>
									<input disabled="true" value="<?php echo date_format(date_create($order['OrderDate']), 'm/d/Y'); ?>" />
								</div>
								<div class="clearall"></div>
								<a href="?action=editOrder" class="editOrder">Edit Order</a>
							</form>
							<div class="clearall"></div>
						</div>
					<?php } ?>
						<div class="orderWrap">
							<div class="all center">
								<div class="issue">
									<a href="?action=issue">Report an issue</a>
								</div>
							</div>
						</div>

				<?php }?>
			<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>