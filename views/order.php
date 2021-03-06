<?php get_header($doc_title); ?>
	<?php get_nav($_SESSION['Company']); ?>
	<div class="center page">
		<div class="order">
			<form action="." method="post" id="newOrder">
				<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
					<input type="hidden" name="action" value="updateOrder" />
				<?php } else { ?>
					<input type="hidden" name="action" value="placeOrder" />
					<input type="hidden" name="UserID" value="<?php echo $_SESSION['UserID']; ?>" /> 
					<input type="hidden" name="PricePaid" id="PricePaid"/>

				<?php } ?>
				<div class="col-55">
					<div class="item wide">
						<label class="heightfix">Product</label>
						<div class="selectWrap">
							<div class="selectButton"></div>
							<select name="ProductID">
								<?php foreach ($products as $product) { ?>
									<option <?php if($product['ProductID'] === $order['ProductID']) {echo "selected='selected'";} ?> value="<?php echo $product['ProductID']; ?>,<?php echo $product['ProductPrice']; ?>"><?php echo $product['ProductName']; ?></option>
								<?php } ?>
							</select>
							Price per unit $<label id="unitPrice"></label>
						</div>
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">PO Number</label>
						<input type="text" name="PONumber" value="<?php echo $order['PONumber']; ?>"/>
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">Order Date</label>
						<input <?php if($_SESSION['editStatus'] === 1) {echo "disabled='true'";} ?> type="text" id="orderDate" name="OrderDate" value="<?php echo $order['OrderDate']; ?>"/>
					</div>
					<div class="clearall"></div>
					<?php if($_SESSION['PermissionLevel'] <= 2 || $_SESSION['editStatus'] === 1) { ?>
						<div class="item wide">
							<label class="heightfix">Projected Ship Date</label>
							<input <?php if($_SESSION['editStatus'] === 1) {echo "disabled='true'";} ?> type="text" id="shipDate" name="ProjectedShipDate" value="<?php echo $order['ProjectedShipDate']; ?>"/>
						</div>
						<div class="clearall"></div>
					<?php } ?>
					<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
						<div class="item wide">
							<label class="heightfix">Actual Ship Date</label>
							<input type="text" id="actualDate" name="ActualShipDate" value="<?php echo $order['ActualShipDate']; ?>"/>
						</div>
						<div class="clearall"></div>
						<a href="javascript:;" class="play ease-1 start">P</a>
						<div class="item time first">
							<label class="heightfix">Total Time</label>
							<input id="timer" type="text" name="totalTime" value="<?php echo $order['totalTime']; ?>"/>
						</div>
						<div class="clearall"></div>
						<div class="item time">
							<label class="heightfix">Start Time</label>
							<input id="startTime" type="text" name="startTime" value="<?php echo $order['startTime']; ?>"/>
						</div>
						<div class="clearall"></div>
						<div class="item time">
							<label class="heightfix">Stop Time</label>
							<input id="stopTime" type="text" name="stopTime" value="<?php echo $order['stopTime']; ?>"/>
						</div>
						<div class="clearall"></div>
						<input type="submit" name="saveTime" value="Save Timestamp" class="button submit saveTime">
					<?php } ?>
				</div>
				<div class="col-40">
					<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
						<div class="item narrow">
							<label>Lead Person</label>
							<input class="small" type="text" name="LeadPerson" value="<?php echo $order['LeadPerson'] ?>"/>
						</div>
						<div class="selectWrap">
							<div class="selectButton"></div>
							<select name="LeadPerson">
							<?php foreach ($employees as $employee) { ?>
								<option value="<?php echo $employee['UserID']; ?>"><?php echo $employee['FirstName']; ?> </option>
							<?php } ?>
							</select>
						</div>
						</div>
					<div class="clearall"></div>
					<?php } ?>
					<div class="item narrow">
						<label>Credit</label>
						<input class="small" type="text" name="Credit" />
					</div>
					<div class="item narrow">
						<label>QTY</label>
						<input id="quantity" class="small" type="text" name="Quantity" value="<?php echo $_SESSION['editStatus'] === 1 ? $order['Quantity'] : 1; ?>" />
					</div>
					<div class="clearall"></div>
					<div class="item">
						<label>Comments</label>
						<textarea name="Comments"><?php echo $comments['Comment'] ?></textarea>
					</div>
					<div class="item medium">
						<label class="heightfix">Total Price</label>
						<input id="totalPrice" type="text" name="PricePaid" value="<?php echo $order['PricePaid'] ?>"/>
					</div>
					<!-- hide -->
					<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
						<div class="employee">
							<div class="item narrow">
								<label class="checkfix">Special Assignment</label>
								<input class="check" type="text" name="Assignment1" />
							</div>
							<div class="clearall"></div>
							<div class="item">
								<label>Comments</label>
								<textarea name="Comments"></textarea>
							</div>
							<div class="clearall"></div>
							<div class="item narrow">
								<label class="checkfix">Special Assignment</label>
								<input class="check" type="text" name="Assignment1" />
							</div>
							<div class="clearall"></div>
							<div class="item">
								<label>Comments</label>
								<textarea name="Comments"></textarea>
							</div>
							<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
								<input type="submit" name="update" value="Update Order" class="button update">
							<?php } ?>
						</div>
					<?php } ?>
					<?php if($_SESSION['PermissionLevel'] !== 1) { ?>
						<input type="submit" name="submit" value="Submit Order" class="button submit">
					<?php } ?>
				</div>
			</form>
			<div class="clearall"></div>
			<div class="col-40">
				<div class="issue">
					<a href="?action=issue">Report an issue</a>
				</div>
			</div>
		</div>
	</div>
<?php get_footer(); ?>