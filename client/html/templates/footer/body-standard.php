<footer id="footer">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 footer-contact">
                    <?=techie_option('col_1')?>
                </div>
                <div class="col-lg-2 col-md-6 footer-links">
                    <?=techie_option('col_2')?>
                </div>
                <div class="col-lg-3 col-md-6 footer-links">
                    <?=techie_option('col_3')?>
<ul>
<li><a href="<?=url('jsonapi')?>/techie?legal=terms_conditions" class="popup terms_conditions">Terms and conditions</a></li>
<li><a href="<?=url('jsonapi')?>/techie?legal=privacy_policy" class="popup privacy_policy">Privacy policy</a></li>
<li><a href="<?=url('jsonapi')?>/techie?legal=cancellation_policy" class="popup cancellation_policy">Cancellation policy</a></li>
</ul>
                </div>
                <div class="col-lg-4 col-md-6 footer-newsletter">
                    <?=techie_option('col_4')?>
                    <form action="" method="post">
                        <input type="email" name="email">
                        <input type="submit" value="<?=$this->translate('client', 'Subscribe')?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="copyright-wrap d-md-flex py-4">
            <div class="mr-md-auto text-center text-md-left">
                <div class="copyright">
                    <?=techie_option('copyright_text')?>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="<?=techie_option('twitter_url')?>" class="twitter"><i class="bx bxl-twitter"></i></a> 
                <a href="<?=techie_option('facebook_url')?>" class="facebook"><i class="bx bxl-facebook"></i></a> 
                <a href="<?=techie_option('instagram_url')?>" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
        </div>
    </div>
</footer>