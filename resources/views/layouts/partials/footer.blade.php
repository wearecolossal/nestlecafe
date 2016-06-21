<footer id="footer">

    <div class="container">

        <div class="footer-section">
            <h1>Nestlé Café</h1>
            <ul>
                <li class="{{ isActive('online-order') }}"><a href="{{ URL::to('order-online') }}">Order Online</a>
                </li>
                <li class="{{ isActive('about') }}"><a href="{{ URL::to('about') }}">About Us</a></li>
                <li class="{{ isActive('careers') }} hidden"><a href="{{ URL::to('careers') }}">Careers</a></li>
                <li class="{{ isActive('locations') }}"><a href="{{ URL::to('locations') }}">Caf&eacute; Locations</a>
                </li>
                <li class="{{ isActive('cafe-club') }}"><a href="{{ URL::to('cafe-club') }}">The Caf&eacute; Club</a>
                </li>
                <li><a href="{{ URL::to('blog') }}">Cookie Talk</a></li>
            </ul>
        </div>
        <div class="footer-section">
            <h1>Featured Brands</h1>
            <ul>
                <li><a href="http://www.nestle-purelife.us/" target="_blank">Nestl&eacute;<sup>&reg;</sup> Pure
                        Life<sup>&reg;</sup></a></li>
                <li style="margin-bottom:7px;"><a href="http://www.verybestbaking.com/Toll-House.aspx"
                                                  target="_blank">Nestl&eacute;<sup>&reg;</sup> Toll
                        House<sup>&reg;</sup> <br>Cafe by Chip<sup>&reg;</sup></a></li>
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
                <li class="{{ isActive('contact') }}"><a href="{{ URL::to('contact') }}">Contact Us</a></li>
                <li class="{{ isActive('franchise') }}"><a href="{{ URL::to('franchise') }}">Franchising
                        Opportunities</a></li>
                <li class="{{ isActive('careers') }}"><a href="{{ URL::to('careers') }}">Careers</a></li>
                <li><a href="https://www.treatdata.com/" target="_blank">Treatdata</a></li>
                <li><a href="https://springfield2.franconnect.net/nestlecafe/" target="_blank">CafeConnect</a></li>
                <li><a data-load="document" href="Nestle-Tollhouse-Cafe-by-Chip-Nutrition-Facts.pdf" target="_blank">Nutritional
                        Info</a></li>
                <li><a data-load="document" href="allergy-disclaimer.pdf" target="_blank">Allergy Notice</a></li>
                <li class="{{ isActive('legal') }}"><a href="{{ URL::to('legal') }}">Legal & Privacy Info</a></li>
            </ul>
        </div>
        <div class="footer-section text-center email-club">
            <h2>Join Our Email Club for News and Offers</h2>
            <br>

            <div class="clearfix"></div>
            <a href="{{ URL::to('cafe-club') }}" style="font-size:12px;padding:8px;" class="btn wired">Click To
                Join!</a>
            <br><br>

            <div class="clearfix"></div>
            <small class="text-yellow">- Follow Us! -</small>
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
        <p>&copy; Copyright {{ date('Y') }} Crest Foods, Inc. All rights reserved. Nestl&eacute;<sup>&reg;</sup>, Toll
            House<sup>&reg;</sup> Cafe by Chip<sup>&reg;</sup> and certain other marks and associated label designs are
            trademarks of Soci&eacute;t&eacute;
            des Produits Nestl&eacute; S.A., Used by Crest Foods, Inc., and its independent franchisees, with
            permission​.</p>

        <div class="footer-logos">
            <a href="http://www.norton-creative.com" target="_blank"><img
                        src="{{ URL::asset('library/img/footer-norton.png') }}" alt=""></a>
            <a href="http://colossal.net" target="_blank"><img src="{{ URL::asset('library/img/footer-colossal.png') }}"
                                                               alt=""></a>
        </div>
        <div class="clearfix"></div>
    </div>
</footer>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="{{ URL::asset('library/js/vendor/jquery-1.11.3.min.js') }}"><\/script>')</script>
<script src="{{ URL::asset('library/js/plugins.js') }}"></script>
<script src="{{ URL::asset('library/js/parallax.js') }}"></script>
<script src="{{ URL::asset('library/js/main.js') }}"></script>
<script>
    $(document).ready(function () {
        //Find document links in SQL DB and updates their URL
        addUrlToDocuments('{{ URL::to('uploads/documents') }}/');
    });
</script>
@yield('scripts')
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
    ga('create', 'UA-3699341-1', 'auto');
    ga('send', 'pageview');
</script>
</body>
</html>