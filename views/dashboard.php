<?php get_header(); ?>
	<?php render_output($_REQUEST); ?>
	<?php  isset($_SESSION['UserID']) ? get_nav($_SESSION['Company']) : get_nav('Welcome'); ?>
	<div class="page">
		<div class="welcome">
			<?php if($orderResponse){ ?>
				<h1><?php echo $orderResponse; ?></h1>
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

					foreach ($orders as $order) {
						echo "ORDER ID :" . $order['OrderDetailID'] . "<br/>";
						echo "Quantity: " . $order['Quantity'] . "<br/>";
						echo "Price Paid: " . $order['PricePaid']. "<br/><br/>";
					}

				}?>
			<?php } ?>
		</div>
	</div>
<?php get_footer(); ?>