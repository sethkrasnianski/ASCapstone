<?php get_header(); ?>
	<?php get_nav($_SESSION['Company']); ?>
	<div class="center page">
		<div class="order">
			<form action="." method="post" id="next3">
				<input type="hidden" name="action" value="next3" />
				<input type="submit" name="submit" value="Submit Comment" class="button submit">
			</form>
			<form action="." method="post" id="newOrder">
				<div class="col-45">
					<div class="item semiNarrow">
						<input class="small" type="text" name="" />
						<label class="heightfix">Lead Person</label>
					</div>
					<div class="clearall"></div>
					<div class="item narrow">
						<label>QTY</label>
						<input class="small" type="text" name="" />
					</div>
					<div class="item narrow first">
						<label>Credit</label>
						<input class="small" type="text" name="" />
					</div>
					<div class="clearall"></div>
					<div class="item">
						<label>Comments</label>
						<textarea></textarea>
					</div>
					<div class="item medium">
						<label class="heightfix">Total Price</label>
						<input type="text" />
					</div>
					<div class="clearall"></div>
					<div class="item">
						<label>Comments</label>
						<textarea></textarea>
					</div>
					<input type="submit" name="submit" value="Submit Comment" class="button submit">
				</div>
				<div class="col-45">
					<div class="item wide">
						<label class="heightfix">Customer</label>
						<input type="text" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfixsmall">Product <br/>Model No.</label>
						<input type="text" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">SO#RMA#</label>
						<input type="text" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">Order Date</label>
						<input type="text" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">Ship Date</label>
						<input type="text" />
					</div>
					<div class="clearall"></div>
					<div class="item wide">
						<label class="heightfix">PO Number</label>
						<input type="text" />
					</div>
				</div>
			</form>
		</div>
	</div>
<?php get_footer(); ?>