<?php get_header($doc_title); ?>
	<?php get_nav("Forgot Password"); ?>
	<div class="center page">
		<div class="error"><?php echo $error; ?></div>
		<div id="ProductReport">
				<div id="top">
					<div class="item">
						<div class="bold-text label-title">Lead Person</div><input type="textbox" class="tinybox"/>
						<div class="bold-text label-title">Customer</div><input type="textbox" class="largebox"/><br/>
					<div class="clearall"></div>

					<div class="item">
						<div class="bold-text label-title">Credit</div><input type="textbox" class="tinybox"/>
						<div class="bold-text label-title">Product Model No.</div><input type="textbox" class="largebox"/>
					<div class="clearall"></div>
				</div>

				<div id="left">
					<div class="item"><div class="bold-text label-title">Comments</div></div><div class="clearall"></div>
					<div class="item"><textarea class="comments"></textarea></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Total Price</div><input type="textbox" name="total-price"class="midbox"/></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Special Assignment #1</div><input type="checkbox"/></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Comment:</div></div><div class="clearall"></div>
					<div class="item"><textarea name="comment-one" resize="no" class="comment"></textarea></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Special Assignment #2</div><input type="checkbox"/></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Comment:</div></div><div class="clearall"></div>
					<div class="item"><textarea name="comment-two" class="comment"></textarea></div><div class="clearall"></div>
			
				</div>

				<div id="right">
					<div class="item"><div class="bold-text label-title">SO#RMA#:</div><input type="textbox" name="rma-number" class="midbox"/></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Order Date:</div><input type="textbox" name="order-date" class="midbox"/></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Projected Shipment Date:</div><input type="textbox" name="projected-date" class="midbox"/></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">PO Number:</div><input type="textbox" name="po-number" class="midbox"/></div><div class="clearall"></div>
					<div class="item"><div class="bold-text label-title">Actual Shipment:</div><input type="textbox" class="midbox"/></div><div class="clearall"></div>

					<div id="square">
						<div class="item"><div class="bold-text label-title">Start Time:</div><input type="textbox" class="smallbox"/></div><div class="clearall"></div>
						<div class="item"><div class="bold-text label-title">Stop Time:</div><input type="textbox" class="smallbox"/></div><div class="clearall"></div>
						<div class="item"><div class="bold-text label-title">Total Time:</div><input type="textbox" class="smallbox"/></div><div class="clearall"></div>
					</div>

					<input type="button" name="generate-rma"class="button" value="Generate RMA"/>
				</div>

				<div id="bottom">
					<a href="#">Report An Issue</a>
					<input type="button" name="update-order" class="button" value="Update Order"/>
				</div>
				
		</div>
	</div>
<?php get_footer(); ?>