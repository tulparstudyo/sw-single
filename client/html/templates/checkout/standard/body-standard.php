<?php

/**
 * @license LGPLv3, http://opensource.org/licenses/LGPL-3.0
 * @copyright Metaways Infosystems GmbH, 2013
 * @copyright Aimeos (aimeos.org), 2015-2020
 */

$enc = $this->encoder();

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );

$checkoutTarget = $this->config( 'client/html/checkout/standard/url/target' );
$checkoutController = $this->config( 'client/html/checkout/standard/url/controller', 'checkout' );
$checkoutAction = $this->config( 'client/html/checkout/standard/url/action', 'index' );
$checkoutConfig = $this->config( 'client/html/checkout/standard/url/config', [] );

$optTarget = $this->config( 'client/jsonapi/url/target' );
$optCntl = $this->config( 'client/jsonapi/url/controller', 'jsonapi' );
$optAction = $this->config( 'client/jsonapi/url/action', 'options' );
$optConfig = $this->config( 'client/jsonapi/url/config', [] );


?>
<section class="container aimeos checkout-standard" data-jsonurl="<?= $enc->attr( $this->url( $optTarget, $optCntl, $optAction, [], [], $optConfig ) ); ?>">
<div  class="container">
	<nav>
		<ol class="steps">

			<li class="step active basket">
				<a href="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, [], [], $basketConfig ) ); ?>">
					<?= $enc->html( $this->translate( 'client', 'Basket' ), $enc::TRUST ); ?>
				</a>
			</li>

			<?php foreach( $this->get( 'standardStepsBefore', [] ) as $name ) : ?>
				<li class="step active <?= $name ?>">
					<a href="<?= $enc->attr( $this->url( $checkoutTarget, $checkoutController, $checkoutAction, ['c_step' => $name], [], $checkoutConfig ) ); ?>">
						<?= $enc->html( $this->translate( 'client', $name ) ); ?>
					</a>
				</li>
			<?php endforeach; ?>

			<?php if( $this->get( 'standardStepActive', false ) ) : ?>
				<li class="step current <?= $this->get( 'standardStepActive', false ) ?>">
					<?= $enc->html( $this->translate( 'client', $this->get( 'standardStepActive', false ) ) ); ?>
				</li>
			<?php endif ?>

			<?php foreach( $this->get( 'standardStepsAfter', [] ) as $name ) : ?>
				<li class="step <?= $name ?>">
					<?= $enc->html( $this->translate( 'client', $name ) ); ?>
				</li>
			<?php endforeach; ?>

		</ol>
	</nav>


	<?php if( isset( $this->standardErrorList ) ) : ?>
		<ul class="error-list">
			<?php foreach( (array) $this->standardErrorList as $errmsg ) : ?>
				<li class="error-item"><?= $enc->html( $errmsg ); ?></li>
			<?php endforeach; ?>
		</ul>
	<?php endif; ?>


	<form id="form-checkout" method="<?= $enc->attr( $this->get( 'standardMethod', 'POST' ) ); ?>" action="<?= $enc->attr( $this->get( 'standardUrlNext' ) ); ?>">
		<?= $this->csrf()->formfield(); ?>
		<?= $this->get( 'standardBody' ); ?>
	</form>

	<script>
    $("body").on("click",".checkout-standard-delivery .col-sm-12 .option",function(e){
        $.ajax({
            type:"POST",
            url:$('#form-checkout').attr("action"),
            data:$('#form-checkout').serialize(),
            success: function(response){
                var doc = document.createElement("html");
                doc.innerHTML = response;
                var basket = $(".checkout-table", doc);
                if(basket.length){
                   $('.checkout-table').html(basket); 
                } else {
                    var error = $(".error-list", doc).text();
                    if(error){
                        alert(error);
                    } else{
                        $.get( '/shop/checkout', function( response ) {
                            var doc = document.createElement("html");
                            doc.innerHTML = response;
                            var basket = $(".checkout-table", doc);
                            if(basket.length){
                                $('.checkout-table').html(basket); 
                            } else {
                                alert("unknown error, please try again later");
                            }
                        });
                    }
                }
            }
        });
    })
</script>
</div>
</section>
