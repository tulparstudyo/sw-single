<?php
$enc = $this->encoder();
$config = $this->config( 'client/jsonapi/url/config', [] );
$url_parameters = request()->route()->parameters();
$productItem = $this->get( 'productItem', [] );
$media = $productItem->getRefItems( 'media', 'default', 'default' );
$image_url = $media->getPreview()->first();
$long = $productItem->getRefItems( 'text', 'long', 'default' );
$content = $long->getContent()->first();

$basketTarget = $this->config( 'client/html/basket/standard/url/target' );
$basketController = $this->config( 'client/html/basket/standard/url/controller', 'basket' );
$basketAction = $this->config( 'client/html/basket/standard/url/action', 'index' );
$basketConfig = $this->config( 'client/html/basket/standard/url/config', [] );
$basketSite = $this->config( 'client/html/basket/standard/url/site' );
$marked = $productItem->getConfigValue('marked');
$advanced = $productItem->getConfigValue('advanced');
?>
<div class="col-lg-3 col-md-6 catalog-detail-basket" data-aos="fade-up" data-aos-delay="100">
<form method="POST" action="<?= $enc->attr( $this->url( $basketTarget, $basketController, $basketAction, ( $basketSite ? ['site' => $basketSite] : [] ), [], $basketConfig ) ); ?>">
<?= $this->csrf()->formfield(); ?>
    <div class="box <?php if($marked) echo 'featured';?>">
        <?php if($advanced){ ?>
        <span class="advanced"><?= $enc->html( $this->translate( 'client', 'Advanced' ), $enc::TRUST ); ?></span>
        <?php } ?>
        <h3><?=$productItem->getName()?></h3>
        <div class="media-image" style="background-image: url(<?= $this->content( $image_url ); ?>)"></div>
        <h4>
        <?=$this->partial($this->config( 'client/html/common/partials/price', 'common/partials/price-standard' ),
            ['prices' => $productItem->getRefItems( 'price', null, 'default' )])?>
        </h4>
        <?=$content?>
        <div class="btn-wrap"> 
						<?php if( !$productItem->getRefItems( 'price', 'default', 'default' )->empty() ) : ?>
							<div class="addbasket">
								<div class="input-group">
									<input type="hidden" value="add" name="<?= $enc->attr( $this->formparam( 'b_action' ) ); ?>" />
									<input type="hidden"
										name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'prodid'] ) ); ?>"
										value="<?= $enc->attr( $productItem->getId() ); ?>"
									/>
									<input type="hidden" class="form-control input-lg" <?= !$productItem->isAvailable() ? 'disabled' : '' ?>
										name="<?= $enc->attr( $this->formparam( ['b_prod', 0, 'quantity'] ) ); ?>"
										min="<?= $productItem->getScale() ?>" max="2147483647"
										step="<?= $productItem->getScale() ?>" maxlength="10"
										value="<?= $productItem->getScale() ?>" required="required"
									/>
									<button class="btn-buy" type="submit" value="" <?= !$productItem->isAvailable() ? 'disabled' : '' ?> >
										<?= $enc->html( $this->translate( 'client', 'Buy Now' ), $enc::TRUST ); ?>
									</button>
								</div>
							</div>
						<?php endif ?>

        </div>
    </div>
</form>
</div>
