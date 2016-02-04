<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package nestlecafe
 */

?>

<footer id="footer">
    <div class="container">
        <div class="footer-section">
            <h1>Nestlé Café</h1>
            <ul>
                <li><a href="<?php echo str_replace('blog', 'online-order', site_url()); ?>">Online Ordering</a></li>
                <li><a href="<?php echo str_replace('blog', 'about', site_url()); ?>">About Us</a></li>
                <li><a href="<?php echo str_replace('blog', 'careers', site_url()); ?>">Careers</a></li>
                <li><a href="<?php echo str_replace('blog', 'locations', site_url()); ?>">Caf&eacute; Locations</a></li>
                <li><a href="<?php echo str_replace('blog', 'cafe-club', site_url()); ?>">The Caf&eacute; Club</a></li>
                <li class="active"><a href="<?php echo site_url(); ?>">Cookie Talk</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h1>Featured Brands</h1>
            <ul>
                <li><a href="http://www.nestle-purelife.us/" target="_blank">Nestl&eacute;<sup>&reg;</sup> Pure
                        Life<sup>&reg;</sup></a></li>
                <li><a href="http://www.verybestbaking.com/Toll-House.aspx"
                       target="_blank">Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup></a></li>
                <li><a href="http://www.nestleusa.com/" target="_blank">Nestl&eacute;<sup>&reg;</sup></a></li>
                <li><a href="http://www.wonka.com/" target="_blank">Wonka<sup>&reg;</sup></a></li>
                <li><a href="http://www.butterfinger.com/" target="_blank">Butterfinger<sup>&reg;</sup></a></li>
                <li><a href="http://www.wonka.com/" target="_blank">Nerds<sup>&reg;</sup></a></li>
                <li><a href="http://www.nestlecrunch.com/" target="_blank">Crunch<sup>&reg;</sup></a></li>
                <li><a href="http://www.nesquik.com/Default.aspx" target="_blank">Nesquik<sup>&reg;</sup></a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h1>Regional Brands</h1>
            <ul>
                <li><a href="http://www.edy.s.com/" target="_blank">Edy's<sup>&reg;</sup></a></li>
                <li><a href="http://www.dreyers.com/" target="_blank">Dreyer's<sup>&reg;</sup></a></li>
                <li><a href="http://www.nestle.com/Brands/IceCream/Pages/IceCreamCatalogue.aspx" target="_blank">Nestl&eacute;
                        Ice Cream<sup>&reg;</sup></a></li>
                <li><a href="http://www.nescafe.com" target="_blank">Nescaf&eacute;</a></li>
                <li><a href="https://www.nestleprofessional-beverages.com.au/brands/buondi/" target="_blank">Buondi</a>
                </li>
                <li><a href="https://www.moevenpick-icecream.com/Pages/default.aspx"
                       target="_blank">M&ouml;venpick<sup>&reg;</sup></a></li>
                <li><a href="https://www.kitkat.com" target="_blank">Kit Kat<sup>&reg;</sup></a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h1>Support</h1>
            <ul>
                <li><a href="<?php echo str_replace('blog', 'contact', site_url()); ?>">Contact Us</a></li>
                <li><a href="<?php echo str_replace('blog', 'franchise', site_url()); ?>">Franchising Opportunities</a>
                </li>
                <li><a href="https://www.treatdata.com/" target="_blank">Treatdata</a></li>
                <li><a href="https://springfield2.franconnect.net/nestlecafe/" target="_blank">CafeConnect</a></li>
                <li><a href="<?php echo str_replace('blog', 'legal', site_url()); ?>">Legal & Privacy Info</a></li>
            </ul>
        </div>
        <div class="footer-section text-center email-club">
            <h2>Join Our Email Club for News and Offers</h2>

            <form action="<?php echo str_replace('blog', 'cafe-club', site_url()); ?>" method="GET">
                <input type="text" name="EmailAddress" id="EmailAddress" placeholder="Your Email Address">
            </form>
            <div class="clearfix"></div>
            <small class="text-yellow">- Join! -</small>
            <div class="clearfix"></div>
            <div class="social-links">
                <a href="https://www.facebook.com/nestlecafe" target="_blank"></a>
                <a href="https://twitter.com/NestleCafe" target="_blank"></a>
                <a href="https://www.instagram.com/nestlecafe/" target="_blank"></a>
                <a href="https://www.youtube.com/user/NestleTollHouseCafe" target="_blank"></a>
                <a href="https://www.pinterest.com/nestlecafe/" target="_blank"></a>
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
    <div class="container fine-print">
        <p>&copy; Copyright <?php echo date('Y'); ?> Crest Foods, Inc. All rights reserved.
            Nestl&eacute;<sup>&reg;</sup>, Toll House<sup>&reg;</sup> and certain other marks and associated label
            designs are trademarks of Soci&eacute;t&eacute; des Produits Nestl&eacute; S.A., Used by Crest Foods, Inc.,
            and its independent franchisees, with permission​.</p>
            <div class="footer-logos">
                <a href="http://www.norton-creative.com" target="_blank"><img src="<?php echo str_replace('blog', 'library/img/footer-norton.png', site_url()); ?>" alt=""></a>
                <a href="http://colossal.net" target="_blank"><img src="<?php echo str_replace('blog', 'library/img/footer-colossal.png', site_url()); ?>" alt=""></a>
            </div>
            <div class="clearfix"></div>
    </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="<?php echo str_replace('blog', 'library/js/vendor/jquery-1.11.3.min.js', site_url()); ?>"><\/script>')</script>
<script src="<?php echo str_replace('blog', 'library/js/plugins.js', site_url()); ?>"></script>
<script src="<?php echo str_replace('blog', 'library/js/main-min.js', site_url()); ?>"></script>
<script>
    $(document).ready(function () {
        $.get('<?php echo str_replace('blog', 'snippet/menu-items', site_url()); ?>', function (data) {
            var dataLength = data.length;
            var i;
            var menuContainer = $('.menulist.dropdown');
            var menuListItem;
            for(i = 0; i <= dataLength; i++) {
                var filler = '<li><a href="'+data[i].link+'">'+data[i].name+'</a></li>';
                $('.menulist.dropdown').append(filler);
            }
        });
    });
</script>
<!-- Google Analytics: change UA-XXXXX-X to be your site's ID. -->
<script>
    (function (b, o, i, l, e, r) {
        b.GoogleAnalyticsObject = l;
        b[l] || (b[l] =
            function () {
                (b[l].q = b[l].q || []).push(arguments)
            });
        b[l].l = +new Date;
        e = o.createElement(i);
        r = o.getElementsByTagName(i)[0];
        e.src = 'https://www.google-analytics.com/analytics.js';
        r.parentNode.insertBefore(e, r)
    }(window, document, 'script', 'ga'));
    ga('create', 'UA-XXXXX-X', 'auto');
    ga('send', 'pageview');
</script>

<?php wp_footer(); ?>
</body>
</html>
