<div id="donate" class="span-22 prefix-1 suffix-1 last">

	<p class="intro">Your donations are used to cover the cost of providing the Kohana website and related resources. Your donations are not used for any personal gain. As part of the <?php echo HTML::anchor('http://conservancy.softwarefreedom.org/', 'Software Freedom Conservancy') ?>, your donations are fully tax-deductible to the extent permitted by law.</p>

	<div class="span-12 suffix-2">
		<h2>Make a Donation</h2>
		<?php echo Form::open() ?>

		<p><label>I would like to donate $<?php echo Form::input('amount', $post['amount'], array('size' => '6')) ?> to the Kohana PHP Framework.</label></p>
		<?php if (isset($errors['amount'])): ?>
		<p class="error">Please enter decimal value greater than <strong>1.00</strong>.</p>
		<?php endif ?>

		<p>
			<?php echo Form::button('using', HTML::image('media/img/google_checkout.png', array('alt' => 'Google Checkout')), array('value' => 'google')) ?>
			<?php echo Form::button('using', HTML::image('media/img/paypal.png', array('alt' => 'PayPal')), array('value' => 'paypal')) ?><br/>
			<small>If possible, please use Google Checkout, as there are no fees for non-profit organizations.</small>
		</p>

		<?php echo Form::close() ?>

		<p><small>Your secure donation will be made to the <abbr title="Software Freedom Conservancy">SFC</abbr>. Ten percent (10%) of your donation will given to the <abbr title="Software Freedom Conservancy">SFC</abbr> to help cover administration costs and the remaining funds will be allocated to Kohana.</small></p>
	</div>
	<div class="span-8 last">
		<h2>Account Status</h2>
		<dl class="account">
			<dt>Latest Expenses</dt>
			<dd>$27.75 on 2010-02-06 for domain names</dd>
			<dd>$22.00 on 2009-10-26 for domain names</dd>
			<dd>$490.00 on 2009-11-18 for website hosting</dd>

			<dt>Current Balance</dt>
			<dd class="good">$1,100.55</dd>
			<dd><small>Upcoming expenses will be paid in full.</small></dd>
		</dl>
	</div>

</div>