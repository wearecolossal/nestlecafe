@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Customer Service" !!}
@stop


@section('content')
    <section class="page">
        <div class="block header">
            <h2>
                Please contact us via the form below. We look forward to serving you. If you'd like to contact a store directly, go to the Nestlé Toll House Café by Chip <a href="{{ URL::to('locations') }}">store locator</a>.
            </h2>
            <hr class="red-dotted-divider within">
            <br>
        </div>
        <div class="main-column">
            <div class="block dark">
                {!! Form::open() !!}
                <div class="form-group">
                    {!! Form::label('name', 'Name') !!}
                    {!! Form::text('name', null) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email') !!}
                    {!! Form::text('email', null) !!}
                </div>
                <div class="form-group">
                    {!! Form::label('reason', 'Reason') !!}
                    <select name="reason" id="reason">
                        <option value="">Please Choose</option>
                        <option value="change-order">Change my order</option>
                        <option value="discuss-order">Discuss a recent order</option>
                        <option value="ask-about-nestle-cafe">Ask about a Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Cafe</option>
                        <option value="dessert">Ask about dessert products</option>
                        <option value="franchising">Learn more about Franchising</option>
                        <option value="cookie-crew">Cookie Crew (kids club)</option>
                        <option value="cafe-club">Caf&eacute; Club (send me promotions)</option>
                        <option value="comment">Leave a Comment</option>
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('location', 'Location') !!}
                    <select name="location" id="location">
                        <option value="">Please Choose</option>
                        <option value="000">Choose Location</option>

                        <option value="7055"> - ABDALI BOULEVARD, Anman, </option>

                        <option value="2258">AK - Dimond Blvd, Anchorage, AK</option>

                        <option value="2165">AL - Athens Highway 72 Centre, Athens, AL</option>

                        <option value="2246">AR - Turtle Creek, Jonesboro, AR</option>

                        <option value="2238">AZ - Westgate Tanger, Glendale, AZ</option>

                        <option value="2133">CA - Eastvale Gateway, Eastvale, CA</option>

                        <option value="2167">CA - Ontario Mills Mall, Ontario, CA</option>

                        <option value="2096">CA - Topanga Plaza, Canoga Park, CA</option>

                        <option value="2179">CA - Foothill Ranch Town Center, Foothill Ranch, CA</option>

                        <option value="2135">CA - The Great Mall of the Bay Area, Milpitas, CA</option>

                        <option value="2108">CA - Southbay Galleria, Redondo Beach, CA</option>

                        <option value="2092">CA - Otay Ranch Town Center, Chula Vista, CA</option>

                        <option value="2028">CA - Valencia Town Center, Valencia, CA</option>

                        <option value="2037">CA - The Shops at Heavenly, S. Lake Tahoe, CA</option>

                        <option value="2142">CA - Cannery Row, Monterey, CA</option>

                        <option value="2178">CA - Victoria Gardens, Rancho Cucamonga, CA</option>

                        <option value="2248">CA - SOUTHLAND MALL, Hayward, CA</option>

                        <option value="2257">CA - Stoneridge Shopping Center, Pleasanton, CA</option>

                        <option value="2229">CA - Chula Vista Mall Center (West of Macy's), Chula Vista, CA</option>

                        <option value="2247">CA - New Park Mall, Newark, CA</option>

                        <option value="2261">CA - West Valley Mall, Tracy, CA</option>

                        <option value="2220">CO - Alamosa, Alamosa, CO</option>

                        <option value="6007">FL - Florida Mall, Orlando, FL</option>

                        <option value="2174">FL - Citrus Park Town Center, Tampa, FL</option>

                        <option value="2217">FL - Coconut Point, Estero, FL</option>

                        <option value="2224">FL - Lakeland Square Mall, Lakeland, FL</option>

                        <option value="2153">FL - Orlando Premium Outlets, Orlando, FL</option>

                        <option value="2023">FL - Miami International Mall, Miami, FL</option>

                        <option value="2032">FL - Dadeland Mall, Miami, FL</option>

                        <option value="2110">FL - Seminole Town Center, Sanford, FL</option>

                        <option value="2270">FL - Tampa Premium Outlets, Lutz, FL</option>

                        <option value="2121">GA - North Point, Alpharetta, GA</option>

                        <option value="2202">GA - Town Center, Kennesaw, GA</option>

                        <option value="2053">IL - Orland Park, Orland Park, IL</option>

                        <option value="2210">IL - Woodfield Mall, Schaumburg, IL</option>

                        <option value="2226">IL - Spring Hill Mall, West Dundee, IL</option>

                        <option value="2262">IL - Yorktown Center, Lombard, IL</option>

                        <option value="2099">IN - Circle Center, Indianapolis, IN</option>

                        <option value="2127">KS - Oak Park Mall, Overland Park, KS</option>

                        <option value="2228">LA - Mall St. Vincent, Shreveport, LA</option>

                        <option value="2251">MD - The Centre at Salisbury, Salisbury, MD</option>

                        <option value="2263">MD - Wheaton Mall, Silver Spring, MD</option>

                        <option value="2206">MI - Orchard Lake, Orchard Lake, MI</option>

                        <option value="2218">MI - Westland Mall, Westland, MI</option>

                        <option value="2022">MI - The Crossroads Mall, Portage, MI</option>

                        <option value="2277">MI - SOUTHLAND CENTER, Taylor, MI</option>

                        <option value="2031">MN - Mall of America, Bloomington, MN</option>

                        <option value="2106">MN - Mall of America, Bloomington, MN</option>

                        <option value="2155">MO - Union Station, St. Louis, MO</option>

                        <option value="2216">MO - Chesterfield Mall, Chesterfield, MO</option>

                        <option value="2185">NC - Four Seasons Town Centre, Greensboro, NC</option>

                        <option value="2061">NC - Southpark Mall, Charlotte, NC</option>

                        <option value="2204">NC - Streets of Southpoint, Durham, NC</option>

                        <option value="2203">NC - Carolina Place, Pineville, NC</option>

                        <option value="2249">NC - Valley Hills Mall, Hickory, NC</option>

                        <option value="2255">NC - GREENVILLE MALL, Greenville, NC</option>

                        <option value="2123">NM - Animas Valley, Farmington, NM</option>

                        <option value="2007">NV - Miracle Mile, Las Vegas, NV</option>

                        <option value="2175">NV - Town Square Las Vegas, Las Vegas, NV</option>

                        <option value="2199">NY - Campus Plaza, Vestal, NY</option>

                        <option value="2245">NY - South Shore, Bay Shore, NY</option>

                        <option value="2271">NY - Hewlett, Hewlett, NY</option>

                        <option value="2122">OK - Woodland Hills, Tulsa, OK</option>

                        <option value="2209">ON - Bramalea City Center, Brampton, ON</option>

                        <option value="2213">ON - Fallowfield, Ottawa, ON</option>

                        <option value="2221">ON - Kanata Shopping Center, Ottawa, ON</option>

                        <option value="2233">ON - Rideau, Ottawa, ON</option>

                        <option value="2250">ON - TANGER OUTLET, Ottawa, ON</option>

                        <option value="2254">ON - TORONTO SPADINA, Toronto, ON</option>

                        <option value="2253">ON - 111 Richmond, Ottawa, ON</option>

                        <option value="2181">PA - Lehigh Valley Mall, Whitehall, PA</option>

                        <option value="2136">PA - Willow Grove, Willow Grove, PA</option>

                        <option value="2095">PA - Park City, Lancaster, PA</option>

                        <option value="2193">PA - Neshaminy, BENSALEM, PA</option>

                        <option value="2043">PA - Franklin Mills, Philadelphia, PA</option>

                        <option value="2188">PA - Franklin Mills II, Philadelphia, PA</option>

                        <option value="2071">SC - Village @ Sandhill, Columbia, SC</option>

                        <option value="2242">SC - Columbiana Centre, Columbia, SC</option>

                        <option value="2187">TX - Houston Premium Outlets, Cypress, TX</option>

                        <option value="2008">TX - Galleria Dallas, Dallas, TX</option>

                        <option value="2118">TX - La Centerra, Katy, TX</option>

                        <option value="2163">TX - Post Oak Mall, College Station, TX</option>

                        <option value="2001">TX - Stonebriar Mall, Frisco, TX</option>

                        <option value="2006">TX - Sunrise Mall, Brownsville, TX</option>

                        <option value="2030">TX - La Plaza Mall, McAllen, TX</option>

                        <option value="2076">TX - Firewheel Town Center, Garland, TX</option>

                        <option value="2026">TX - Baybrook Mall, Friendswood, TX</option>

                        <option value="2004">TX - Houston Galleria, Houston, TX</option>

                        <option value="2093">TX - Highland Village, Lewisville, TX</option>

                        <option value="2104">TX - Cypress Fair, Cypress, TX</option>

                        <option value="2198">TX - Katy Mills Mall, Katy, TX</option>

                        <option value="2191">TX - Greenspoint Mall, Houston, TX</option>

                        <option value="2197">TX - Greenway Plaza, Houston, TX</option>

                        <option value="2222">TX - Collin Creek Mall, Plano, TX</option>

                        <option value="2244">TX - Sikes Senter, Wichita Falls, TX</option>

                        <option value="2240">TX - Town East Mall, Mesquite, TX</option>

                        <option value="2034">TX - Houston Galleria Four, Houston, TX</option>

                        <option value="2042">TX - Bush Intercontinental Airport, Houston, TX</option>

                        <option value="2049">TX - Lakeline Mall, Cedar Park, TX</option>

                        <option value="2190">TX - West Oaks Mall, Houston, TX</option>
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('comments', 'Comments') !!}
                    {!! Form::textarea('comments', null) !!}
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit') !!}
                </div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="side-column">
            <div class="block transparent">
                <h3>Nestl&eacute; Tollhouse</h3>
                <img src="{{ URL::asset('library/img/contact_corporateimg.jpg') }}" style="width:100%;max-width:intrinsic;margin:0 auto;display:block;" alt="">
                <p>
                    <small>
                        101 W Renner Rd., Suite 240 <br>
                        Richardson, TX 75082
                    </small>
                </p>
                <hr class="yellow-dotted-divider within"/>
                <h3>Direct Phone Lines</h3>

                <p>
                    <small>
                        (214) 495-9533 Information <br>
                        (214) 281-8065 Franchise Sales <br>
                        (214) 281-8070 Real Estate <br>
                    </small>
                </p>
                <hr class="yellow-dotted-divider within">
                <div class="clearfix"></div>
                <h3>Looking For A Nearby Caf&eacute;?</h3>
                <a href="" class="btn wired btn-sm">Visit The Caf&eacute; Locator</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </section>
@stop

@section('scripts')
@stop