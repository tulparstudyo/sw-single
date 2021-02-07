<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2020
 */

$enc = $this->encoder();

?>
<?php $this->block()->start( 'checkout/standard/address' ); ?>
<div class="row">
<div class ="col-12 col-lg-8 ">
<section class="checkout-standard-address aos-init aos-animate" data-aos="fade-up" data-aos-delay="150">

	<h1><?= $enc->html( $this->translate( 'client', 'address' ), $enc::TRUST ); ?></h1>
	


	<div class="form-horizontal row">
		<?= $this->block()->get( 'checkout/standard/address/billing' ); ?>

		<?= $this->block()->get( 'checkout/standard/address/delivery' ); ?>
	</div>


	<div class="button-group">
		<a class="btn btn-default btn-lg btn-back" href="<?= $enc->attr( $this->get( 'standardUrlBack' ) ); ?>">
			<?= $enc->html( $this->translate( 'client', 'Previous' ), $enc::TRUST ); ?>
		</a>
		<button class="btn btn-primary btn-lg btn-action">
			<?= $enc->html( $this->translate( 'client', 'Next' ), $enc::TRUST ); ?>
		</button>
	</div>

</section>
<?php $this->block()->stop(); ?>
<?= $this->block()->get( 'checkout/standard/address' ); ?>
