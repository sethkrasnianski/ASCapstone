<?php get_header(); ?>
	<?php get_nav($_SESSION['Company']); ?>
	<div class="center page">
		<div class="order">
			<form action="." method="post" id="newOrder">
				<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
					<input type="hidden" name="action" value="placeOrder" />
				<?php } else { ?>
					<input type="hidden" name="action" value="updateOrder" />
				<?php } ?>
				<div class="col-40">
					<div class="item narrow">
						<label>Lead Person</label>
						<input class="small" type="text" name="LeadPerson" />
					</div>
					<div class="clearall"></div>
					<div class="item narrow">
						<label>Credit</label>
						<input class="small" type="text" name="Credit" />
					</div>
					<div class="item narrow">
						<label>QTY</label>
						<input class="small" type="text" name="Quantity" />
					</div>
					<div class="clearall"></div>
					<div class="item">
						<label>Comments</label>
						<textarea name="Comments"></textarea>
					</div>
					<div class="item medium">
						<label class="heightfix">Total Price</label>
						<input id="totalPrice" type="text" name="PricePaid" />
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
				<div class="col-55">
					<div class="item wide">
						<label class="heightfix">Product</label>
						<div class="selectWrap">
							<div class="selectButton"></div>
							<select>
								<?php foreach ($products as $product) { ?>
									<option value="<?php echo $product['ProductPrice']; ?>"><?php echo $product['ProductName']; ?></option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">PO Number</label>
						<input type="text" name="PONumber" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">Order Date</label>
						<input type="text" id="orderDate" name="OrderDate" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">Projected Ship Date</label>
						<input type="text" id="shipDate" name="ProjectedShipDate" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">Actual Ship Date</label>
						<input type="text" id="actualDate" name="ActualShipDate" />
					</div>
					<div class="clearall"></div>
					<?php if($_SESSION['PermissionLevel'] <= 2) { ?>
						<a href="javascript:;" class="play ease-1 start">P</a>
						<div class="item time first">
							<label class="heightfix">Total Time</label>
							<input id="timer" type="text" name="totalTime" />
						</div>
						<div class="clearall"></div>
						<div class="item time">
							<label class="heightfix">Start Time</label>
							<input id="startTime" type="text" name="startTime" />
						</div>
						<div class="clearall"></div>
						<div class="item time">
							<label class="heightfix">Stop Time</label>
							<input id="stopTime" type="text" name="stopTime" />
						</div>
						<div class="clearall"></div>
						<input type="submit" name="saveTime" value="Save Timestamp" class="button submit saveTime">
					<?php } ?>
				</div>
			</form>
			<div class="issue">
				<a href="?action=issue">Report an issue</a>
			</div>
		</div>
	</div>
<?php get_footer(); ?>