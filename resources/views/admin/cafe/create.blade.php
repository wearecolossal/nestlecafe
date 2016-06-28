@extends('layouts.admin')

@section('page-header', 'Create Cafe')

@section('content')
    <div class="col-md-8">
        <div class="panel panel-default">
            <div class="panel-heading">Cafe Information</div>
            {!! Form::open(['route' => 'admin.cafes.store', 'files' => true, 'class' => 'cafe']) !!}
            <div class="panel-body">
                <div class="row">
                    <div class="col-md-4 form-group">
                        <img src="{{ URL::asset('library/img/loc-noimg.jpg') }}" style="max-width:100%;" alt="">
                        {!! Form::file('image', ['class' => 'form-control']) !!}
                    </div>
                    <div class="col-md-8">
                        <div class="form-group">
                            {!! Form::label('store_number', 'Store Number') !!}
                            {!! Form::text('store_number', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('name', 'Store Name') !!}
                            {!! Form::text('name', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('coming_soon', 'Coming Soon?') !!}
                            <select name="coming_soon" id="coming_soon" class="form-control">
                                <option value="0">No</option>
                                <option value="1">Yes</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <hr>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('address', 'Address') !!}
                            {!! Form::text('address', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="row">
                            <div class="form-group col-md-6">
                                {!! Form::label('city', 'City') !!}
                                {!! Form::text('city', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-6">
                                {!! Form::label('state', 'State') !!}
                                {!! Form::text('state', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-8">
                                {!! Form::label('country', 'Country') !!}
                                {!! Form::text('country', null, ['class' => 'form-control']) !!}
                            </div>
                            <div class="form-group col-md-4">
                                {!! Form::label('zip_code', 'ZIP') !!}
                                {!! Form::text('zip_code', null, ['class' => 'form-control']) !!}
                            </div>
                        </div>
                        <div class="form-group">
                            {!! Form::label('phone', 'Phone Number') !!}
                            {!! Form::text('phone', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('maps_url', 'Google Map URL') !!}
                            {!! Form::text('maps_url', null, ['class'=>'form-control']) !!}
                        </div>
                    </div>
                    <div class="col-md-12">
                        <div class="form-group">
                            {!! Form::label('facebook_url', 'Facebook URL') !!}
                            {!! Form::text('facebook_url', null, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!! Form::label('online_order', 'Online Order URL') !!}
                            {!! Form::text('online_order', null, ['class' => 'form-control']) !!}
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="col-md-4">
        <div class="panel panel-default">
            <div class="panel-heading">Cafe Services <em class="services-message text-success"></em>
            </div>
            <div class="panel-body">

                <div class="list-group cafe-services">
                    <a style="cursor: pointer" class="list-group-item" data-service="bakery"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Bakery {!! Form::hidden('bakery', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="cookie"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Cookies {!! Form::hidden('cookie', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="smoothies"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Smoothies {!! Form::hidden('smoothies', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="wifi"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Wifi {!! Form::hidden('wifi', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="curbside"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Curbside {!! Form::hidden('curbside', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="frozenyogurt"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Frozen Yogurt {!! Form::hidden('frozenyogurt', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="savory"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Savory {!! Form::hidden('savory', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="icecream"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i> Ice
                        Cream {!! Form::hidden('icecream', 0) !!}</a>
                    <a style="cursor: pointer" class="list-group-item" data-service="coffee"><i
                                class="glyphicon glyphicon-ok hidden"></i> <i class="glyphicon glyphicon-tag"></i>
                        Coffee {!! Form::hidden('coffee', 0) !!}</a>
                </div>
            </div>
        </div>
        <div class="panel panel-default">
            <div class="panel-heading">
                Caf&eacute; Hours <em class="days-message hidden text-success"></em>
            </div>
            <div class="panel-body">
                <div class="row">
                    {{--{!! Form::hidden('_method', 'PUT') !!}--}}
                    @for($i = 0; $i <= 6;$i++)
                        <div class="col-md-12">
                            <span class="pull-left">{{ $days[$i]['regular'] }}</span>

                            <div class="btn-group pull-right toggle-hours">
                                <a class="btn btn-default open btn-xs" data-value="1"
                                   data-day="{{ $days[$i]['lowercase'] }}"><i class="glyphicon glyphicon-ok"></i></a>
                                <a class="btn btn-default btn-danger closed btn-xs" data-value="0"
                                   data-day="{{ $days[$i]['lowercase'] }}"><i
                                            class="glyphicon glyphicon-remove"></i></a>
                                {!! Form::hidden($days[$i]['lowercase'].'_open', 0, ['class' => $days[$i]['lowercase']]) !!}
                            </div>
                            <div class="clearfix"></div>
                            <br>
                        </div>
                        <div class="form-group col-md-6 hidden" data-day="{{ $days[$i]['lowercase'] }}">
                            <select name="{{ $days[$i]['lowercase'] }}_start" id="{{ $days[$i]['lowercase'] }}_start"
                                    class="form-control input-sm">
                                <option value="">Start</option>
                                {!! timeHTMLSelect(null, '10:00 am') !!}
                            </select>
                        </div>
                        <div class="form-group col-md-6 hidden" data-day="{{ $days[$i]['lowercase'] }}">
                            <select name="{{ $days[$i]['lowercase'] }}_end" id="{{ $days[$i]['lowercase'] }}_end"
                                    class="form-control input-sm">
                                <option value="">End</option>
                                {!! timeHTMLSelect(null, '9:00 pm') !!}
                            </select>
                        </div>
                    @endfor
                </div>
                <div class="clearfix"></div>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="panel panel-default">
            <div class="panel-footer text-center">
                {!! Form::submit('Update Cafe', ['class' => 'btn btn-primary']) !!}
                <a class="save-as-draft btn btn-default">Save As Draft</a>
                <a href="{{ URL::to('admin/cafes') }}" class="btn btn-danger">Cancel</a>
                {!! Form::hidden('draft', 0) !!}
            </div>
            {!! Form::close() !!}
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="countryState" tabindex="-1" role="dialog" aria-labelledby="countryState">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel">Please choose the country for this caf&eacute;</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        {!! Form::label('country', 'Country') !!}
                        <select name="country" id="country" class="form-control">
                            <option value="">Choose Country</option>
                            <option data-state="usa" value="United States of America">United States of America</option>
                            <option data-state="canada" value="Canada">Canada</option>
                            <option data-state="" value="Bahrain">Bahrain</option>
                            <option data-state="" value="Iraq">Iraq</option>
                            <option data-state="" value="Jordan">Jordan</option>
                            <option data-state="" value="Kuwait">Kuwait</option>
                            <option data-state="" value="Lebanon">Lebanon</option>
                            <option data-state="" value="Oman">Oman</option>
                            <option data-state="" value="Qatar">Qatar</option>
                            <option data-state="" value="Saudi Arabia">Saudi Arabia</option>
                            <option data-state="" value="United Arab Emirates">United Arab Emirates</option>
                            <option data-state="" value="">----</option>
                            <option data-state="" value="Afghanistan">Afghanistan</option>
                            <option data-state="" value="Åland Islands">Åland Islands</option>
                            <option data-state="" value="Albania">Albania</option>
                            <option data-state="" value="Algeria">Algeria</option>
                            <option data-state="" value="American Samoa">American Samoa</option>
                            <option data-state="" value="Andorra">Andorra</option>
                            <option data-state="" value="Angola">Angola</option>
                            <option data-state="" value="Anguilla">Anguilla</option>
                            <option data-state="" value="Antarctica">Antarctica</option>
                            <option data-state="" value="Antigua and Barbuda">Antigua and Barbuda</option>
                            <option data-state="" value="Argentina">Argentina</option>
                            <option data-state="" value="Armenia">Armenia</option>
                            <option data-state="" value="Aruba">Aruba</option>
                            <option data-state="" value="Australia">Australia</option>
                            <option data-state="" value="Austria">Austria</option>
                            <option data-state="" value="Azerbaijan">Azerbaijan</option>
                            <option data-state="" value="Bahamas">Bahamas</option>
                            <option data-state="" value="Bahrain">Bahrain</option>
                            <option data-state="" value="Bangladesh">Bangladesh</option>
                            <option data-state="" value="Barbados">Barbados</option>
                            <option data-state="" value="Belarus">Belarus</option>
                            <option data-state="" value="Belgium">Belgium</option>
                            <option data-state="" value="Belize">Belize</option>
                            <option data-state="" value="Benin">Benin</option>
                            <option data-state="" value="Bermuda">Bermuda</option>
                            <option data-state="" value="Bhutan">Bhutan</option>
                            <option data-state="" value="Bolivia, Plurinational State of">Bolivia, Plurinational State of</option>
                            <option data-state="" value="Bonaire, Sint Eustatius and Saba">Bonaire, Sint Eustatius and Saba</option>
                            <option data-state="" value="Bosnia and Herzegovina">Bosnia and Herzegovina</option>
                            <option data-state="" value="Botswana">Botswana</option>
                            <option data-state="" value="Bouvet Island">Bouvet Island</option>
                            <option data-state="" value="Brazil">Brazil</option>
                            <option data-state="" value="British Indian Ocean Territory">British Indian Ocean Territory</option>
                            <option data-state="" value="Brunei Darussalam">Brunei Darussalam</option>
                            <option data-state="" value="Bulgaria">Bulgaria</option>
                            <option data-state="" value="Burkina Faso">Burkina Faso</option>
                            <option data-state="" value="Burundi">Burundi</option>
                            <option data-state="" value="Cambodia">Cambodia</option>
                            <option data-state="" value="Cameroon">Cameroon</option>
                            <option data-state="" value="Canada">Canada</option>
                            <option data-state="" value="Cape Verde">Cape Verde</option>
                            <option data-state="" value="Cayman Islands">Cayman Islands</option>
                            <option data-state="" value="Central African Republic">Central African Republic</option>
                            <option data-state="" value="Chad">Chad</option>
                            <option data-state="" value="Chile">Chile</option>
                            <option data-state="" value="China">China</option>
                            <option data-state="" value="Christmas Island">Christmas Island</option>
                            <option data-state="" value="Cocos (Keeling) Islands">Cocos (Keeling) Islands</option>
                            <option data-state="" value="Colombia">Colombia</option>
                            <option data-state="" value="Comoros">Comoros</option>
                            <option data-state="" value="Congo">Congo</option>
                            <option data-state="" value="Congo, the Democratic Republic of the">Congo, the Democratic Republic of
                                the
                            </option>
                            <option data-state="" value="Cook Islands">Cook Islands</option>
                            <option data-state="" value="Costa Rica">Costa Rica</option>
                            <option data-state="" value="Côte d'Ivoire">Côte d'Ivoire</option>
                            <option data-state="" value="Croatia">Croatia</option>
                            <option data-state="" value="Cuba">Cuba</option>
                            <option data-state="" value="Curaçao">Curaçao</option>
                            <option data-state="" value="Cyprus">Cyprus</option>
                            <option data-state="" value="Czech Republic">Czech Republic</option>
                            <option data-state="" value="Denmark">Denmark</option>
                            <option data-state="" value="Djibouti">Djibouti</option>
                            <option data-state="" value="Dominica">Dominica</option>
                            <option data-state="" value="Dominican Republic">Dominican Republic</option>
                            <option data-state="" value="Ecuador">Ecuador</option>
                            <option data-state="" value="Egypt">Egypt</option>
                            <option data-state="" value="El Salvador">El Salvador</option>
                            <option data-state="" value="Equatorial Guinea">Equatorial Guinea</option>
                            <option data-state="" value="Eritrea">Eritrea</option>
                            <option data-state="" value="Estonia">Estonia</option>
                            <option data-state="" value="Ethiopia">Ethiopia</option>
                            <option data-state="" value="Falkland Islands (Malvinas)">Falkland Islands (Malvinas)</option>
                            <option data-state="" value="Faroe Islands">Faroe Islands</option>
                            <option data-state="" value="Fiji">Fiji</option>
                            <option data-state="" value="Finland">Finland</option>
                            <option data-state="" value="France">France</option>
                            <option data-state="" value="French Guiana">French Guiana</option>
                            <option data-state="" value="French Polynesia">French Polynesia</option>
                            <option data-state="" value="French Southern Territories">French Southern Territories</option>
                            <option data-state="" value="Gabon">Gabon</option>
                            <option data-state="" value="Gambia">Gambia</option>
                            <option data-state="" value="Georgia">Georgia</option>
                            <option data-state="" value="Germany">Germany</option>
                            <option data-state="" value="Ghana">Ghana</option>
                            <option data-state="" value="Gibraltar">Gibraltar</option>
                            <option data-state="" value="Greece">Greece</option>
                            <option data-state="" value="Greenland">Greenland</option>
                            <option data-state="" value="Grenada">Grenada</option>
                            <option data-state="" value="Guadeloupe">Guadeloupe</option>
                            <option data-state="" value="Guam">Guam</option>
                            <option data-state="" value="Guatemala">Guatemala</option>
                            <option data-state="" value="Guernsey">Guernsey</option>
                            <option data-state="" value="Guinea">Guinea</option>
                            <option data-state="" value="Guinea-Bissau">Guinea-Bissau</option>
                            <option data-state="" value="Guyana">Guyana</option>
                            <option data-state="" value="Haiti">Haiti</option>
                            <option data-state="" value="Heard Island and McDonald Islands">Heard Island and McDonald Islands</option>
                            <option data-state="" value="Holy See (Vatican City State)">Holy See (Vatican City State)</option>
                            <option data-state="" value="Honduras">Honduras</option>
                            <option data-state="" value="Hong Kong">Hong Kong</option>
                            <option data-state="" value="Hungary">Hungary</option>
                            <option data-state="" value="Iceland">Iceland</option>
                            <option data-state="" value="India">India</option>
                            <option data-state="" value="Indonesia">Indonesia</option>
                            <option data-state="" value="Iran, Islamic Republic of">Iran, Islamic Republic of</option>
                            <option data-state="" value="Iraq">Iraq</option>
                            <option data-state="" value="Ireland">Ireland</option>
                            <option data-state="" value="Isle of Man">Isle of Man</option>
                            <option data-state="" value="Israel">Israel</option>
                            <option data-state="" value="Italy">Italy</option>
                            <option data-state="" value="Jamaica">Jamaica</option>
                            <option data-state="" value="Japan">Japan</option>
                            <option data-state="" value="Jersey">Jersey</option>
                            <option data-state="" value="Jordan">Jordan</option>
                            <option data-state="" value="Kazakhstan">Kazakhstan</option>
                            <option data-state="" value="Kenya">Kenya</option>
                            <option data-state="" value="Kiribati">Kiribati</option>
                            <option data-state="" value="Korea, Democratic People's Republic of">Korea, Democratic People's Republic
                                of
                            </option>
                            <option data-state="" value="Korea, Republic of">Korea, Republic of</option>
                            <option data-state="" value="Kuwait">Kuwait</option>
                            <option data-state="" value="Kyrgyzstan">Kyrgyzstan</option>
                            <option data-state="" value="Lao People's Democratic Republic">Lao People's Democratic Republic</option>
                            <option data-state="" value="Latvia">Latvia</option>
                            <option data-state="" value="Lebanon">Lebanon</option>
                            <option data-state="" value="Lesotho">Lesotho</option>
                            <option data-state="" value="Liberia">Liberia</option>
                            <option data-state="" value="Libya">Libya</option>
                            <option data-state="" value="Liechtenstein">Liechtenstein</option>
                            <option data-state="" value="Lithuania">Lithuania</option>
                            <option data-state="" value="Luxembourg">Luxembourg</option>
                            <option data-state="" value="Macao">Macao</option>
                            <option data-state="" value="Macedonia, the former Yugoslav Republic of">Macedonia, the former Yugoslav
                                Republic of
                            </option>
                            <option data-state="" value="Madagascar">Madagascar</option>
                            <option data-state="" value="Malawi">Malawi</option>
                            <option data-state="" value="Malaysia">Malaysia</option>
                            <option data-state="" value="Maldives">Maldives</option>
                            <option data-state="" value="Mali">Mali</option>
                            <option data-state="" value="Malta">Malta</option>
                            <option data-state="" value="Marshall Islands">Marshall Islands</option>
                            <option data-state="" value="Martinique">Martinique</option>
                            <option data-state="" value="Mauritania">Mauritania</option>
                            <option data-state="" value="Mauritius">Mauritius</option>
                            <option data-state="" value="Mayotte">Mayotte</option>
                            <option data-state="" value="Mexico">Mexico</option>
                            <option data-state="" value="Micronesia, Federated States of">Micronesia, Federated States of</option>
                            <option data-state="" value="Moldova, Republic of">Moldova, Republic of</option>
                            <option data-state="" value="Monaco">Monaco</option>
                            <option data-state="" value="Mongolia">Mongolia</option>
                            <option data-state="" value="Montenegro">Montenegro</option>
                            <option data-state="" value="Montserrat">Montserrat</option>
                            <option data-state="" value="Morocco">Morocco</option>
                            <option data-state="" value="Mozambique">Mozambique</option>
                            <option data-state="" value="Myanmar">Myanmar</option>
                            <option data-state="" value="Namibia">Namibia</option>
                            <option data-state="" value="Nauru">Nauru</option>
                            <option data-state="" value="Nepal">Nepal</option>
                            <option data-state="" value="Netherlands">Netherlands</option>
                            <option data-state="" value="New Caledonia">New Caledonia</option>
                            <option data-state="" value="New Zealand">New Zealand</option>
                            <option data-state="" value="Nicaragua">Nicaragua</option>
                            <option data-state="" value="Niger">Niger</option>
                            <option data-state="" value="Nigeria">Nigeria</option>
                            <option data-state="" value="Niue">Niue</option>
                            <option data-state="" value="Norfolk Island">Norfolk Island</option>
                            <option data-state="" value="Northern Mariana Islands">Northern Mariana Islands</option>
                            <option data-state="" value="Norway">Norway</option>
                            <option data-state="" value="Oman">Oman</option>
                            <option data-state="" value="Pakistan">Pakistan</option>
                            <option data-state="" value="Palau">Palau</option>
                            <option data-state="" value="Palestinian Territory, Occupied">Palestinian Territory, Occupied</option>
                            <option data-state="" value="Panama">Panama</option>
                            <option data-state="" value="Papua New Guinea">Papua New Guinea</option>
                            <option data-state="" value="Paraguay">Paraguay</option>
                            <option data-state="" value="Peru">Peru</option>
                            <option data-state="" value="Philippines">Philippines</option>
                            <option data-state="" value="Pitcairn">Pitcairn</option>
                            <option data-state="" value="Poland">Poland</option>
                            <option data-state="" value="Portugal">Portugal</option>
                            <option data-state="" value="Puerto Rico">Puerto Rico</option>
                            <option data-state="" value="Qatar">Qatar</option>
                            <option data-state="" value="Réunion">Réunion</option>
                            <option data-state="" value="Romania">Romania</option>
                            <option data-state="" value="Russian Federation">Russian Federation</option>
                            <option data-state="" value="Rwanda">Rwanda</option>
                            <option data-state="" value="Saint Barthélemy">Saint Barthélemy</option>
                            <option data-state="" value="Saint Helena, Ascension and Tristan da Cunha">Saint Helena, Ascension and
                                Tristan da Cunha
                            </option>
                            <option data-state="" value="Saint Kitts and Nevis">Saint Kitts and Nevis</option>
                            <option data-state="" value="Saint Lucia">Saint Lucia</option>
                            <option data-state="" value="Saint Martin (French part)">Saint Martin (French part)</option>
                            <option data-state="" value="Saint Pierre and Miquelon">Saint Pierre and Miquelon</option>
                            <option data-state="" value="Saint Vincent and the Grenadines">Saint Vincent and the Grenadines</option>
                            <option data-state="" value="Samoa">Samoa</option>
                            <option data-state="" value="San Marino">San Marino</option>
                            <option data-state="" value="Sao Tome and Principe">Sao Tome and Principe</option>
                            <option data-state="" value="Saudi Arabia">Saudi Arabia</option>
                            <option data-state="" value="Senegal">Senegal</option>
                            <option data-state="" value="Serbia">Serbia</option>
                            <option data-state="" value="Seychelles">Seychelles</option>
                            <option data-state="" value="Sierra Leone">Sierra Leone</option>
                            <option data-state="" value="Singapore">Singapore</option>
                            <option data-state="" value="Sint Maarten (Dutch part)">Sint Maarten (Dutch part)</option>
                            <option data-state="" value="Slovakia">Slovakia</option>
                            <option data-state="" value="Slovenia">Slovenia</option>
                            <option data-state="" value="Solomon Islands">Solomon Islands</option>
                            <option data-state="" value="Somalia">Somalia</option>
                            <option data-state="" value="South Africa">South Africa</option>
                            <option data-state="" value="South Georgia and the South Sandwich Islands">South Georgia and the South
                                Sandwich Islands
                            </option>
                            <option data-state="" value="South Sudan">South Sudan</option>
                            <option data-state="" value="Spain">Spain</option>
                            <option data-state="" value="Sri Lanka">Sri Lanka</option>
                            <option data-state="" value="Sudan">Sudan</option>
                            <option data-state="" value="Suriname">Suriname</option>
                            <option data-state="" value="Svalbard and Jan Mayen">Svalbard and Jan Mayen</option>
                            <option data-state="" value="Swaziland">Swaziland</option>
                            <option data-state="" value="Sweden">Sweden</option>
                            <option data-state="" value="Switzerland">Switzerland</option>
                            <option data-state="" value="Syrian Arab Republic">Syrian Arab Republic</option>
                            <option data-state="" value="Taiwan, Province of China">Taiwan, Province of China</option>
                            <option data-state="" value="Tajikistan">Tajikistan</option>
                            <option data-state="" value="Tanzania, United Republic of">Tanzania, United Republic of</option>
                            <option data-state="" value="Thailand">Thailand</option>
                            <option data-state="" value="Timor-Leste">Timor-Leste</option>
                            <option data-state="" value="Togo">Togo</option>
                            <option data-state="" value="Tokelau">Tokelau</option>
                            <option data-state="" value="Tonga">Tonga</option>
                            <option data-state="" value="Trinidad and Tobago">Trinidad and Tobago</option>
                            <option data-state="" value="Tunisia">Tunisia</option>
                            <option data-state="" value="Turkey">Turkey</option>
                            <option data-state="" value="Turkmenistan">Turkmenistan</option>
                            <option data-state="" value="Turks and Caicos Islands">Turks and Caicos Islands</option>
                            <option data-state="" value="Tuvalu">Tuvalu</option>
                            <option data-state="" value="Uganda">Uganda</option>
                            <option data-state="" value="Ukraine">Ukraine</option>
                            <option data-state="" value="United Arab Emirates">United Arab Emirates</option>
                            <option data-state="" value="United Kingdom">United Kingdom</option>
                            <option data-state="" value="United States">United States</option>
                            <option data-state="" value="United States Minor Outlying Islands">United States Minor Outlying Islands
                            </option>
                            <option data-state="" value="Uruguay">Uruguay</option>
                            <option data-state="" value="Uzbekistan">Uzbekistan</option>
                            <option data-state="" value="Vanuatu">Vanuatu</option>
                            <option data-state="" value="Venezuela, Bolivarian Republic of">Venezuela, Bolivarian Republic of</option>
                            <option data-state="" value="Viet Nam">Viet Nam</option>
                            <option data-state="" value="Virgin Islands, British">Virgin Islands, British</option>
                            <option data-state="" value="Virgin Islands, U.S.">Virgin Islands, U.S.</option>
                            <option data-state="" value="Wallis and Futuna">Wallis and Futuna</option>
                            <option data-state="" value="Western Sahara">Western Sahara</option>
                            <option data-state="" value="Yemen">Yemen</option>
                            <option data-state="" value="Zambia">Zambia</option>
                            <option data-state="" value="Zimbabwe">Zimbabwe</option>
                        </select>
                    </div>
                    <div data-country="usa" class="form-group state-filter hidden">
                        {!! Form::label('usState', 'State') !!}
                        <select name="state" id="state" class="form-control">
                            <option value="">Choose State</option>
                            <option value="Alabama">Alabama</option>
                            <option value="Alaska">Alaska</option>
                            <option value="Arizona">Arizona</option>
                            <option value="Arkansas">Arkansas</option>
                            <option value="California">California</option>
                            <option value="Colorado">Colorado</option>
                            <option value="Connecticut">Connecticut</option>
                            <option value="Delaware">Delaware</option>
                            <option value="District of Columbia">District of Columbia</option>
                            <option value="Florida">Florida</option>
                            <option value="Georgia">Georgia</option>
                            <option value="Hawaii">Hawaii</option>
                            <option value="Idaho">Idaho</option>
                            <option value="Illinois">Illinois</option>
                            <option value="Indiana">Indiana</option>
                            <option value="Iowa">Iowa</option>
                            <option value="Kansas">Kansas</option>
                            <option value="Kentucky">Kentucky</option>
                            <option value="Louisiana">Louisiana</option>
                            <option value="Maine">Maine</option>
                            <option value="Maryland">Maryland</option>
                            <option value="Massachusetts">Massachusetts</option>
                            <option value="Michigan">Michigan</option>
                            <option value="Minnesota">Minnesota</option>
                            <option value="Mississippi">Mississippi</option>
                            <option value="Missouri">Missouri</option>
                            <option value="Montana">Montana</option>
                            <option value="Nebraska">Nebraska</option>
                            <option value="Nevada">Nevada</option>
                            <option value="New Hampshire">New Hampshire</option>
                            <option value="New Jersey">New Jersey</option>
                            <option value="New Mexico">New Mexico</option>
                            <option value="New York">New York</option>
                            <option value="North Carolina">North Carolina</option>
                            <option value="North Dakota">North Dakota</option>
                            <option value="Ohio">Ohio</option>
                            <option value="Oklahoma">Oklahoma</option>
                            <option value="Oregon">Oregon</option>
                            <option value="Pennsylvania">Pennsylvania</option>
                            <option value="Rhode Island">Rhode Island</option>
                            <option value="South Carolina">South Carolina</option>
                            <option value="South Dakota">South Dakota</option>
                            <option value="Tennessee">Tennessee</option>
                            <option value="Texas">Texas</option>
                            <option value="Utah">Utah</option>
                            <option value="Vermont">Vermont</option>
                            <option value="Virginia">Virginia</option>
                            <option value="Washington">Washington</option>
                            <option value="West Virginia">West Virginia</option>
                            <option value="Wisconsin">Wisconsin</option>
                            <option value="Wyoming">Wyoming</option>
                        </select>
                    </div>
                    <div class="form-group state-filter hidden" data-country="canada">
                        {!! Form::label('canadaState', 'State/Province') !!}
                        <select name="state" id="state" class="form-control">
                            <option value="">Choose State/Province</option>
                            <option value="Alberta">Alberta</option>
                            <option value="British Columbia">British Columbia</option>
                            <option value="Manitoba">Manitoba</option>
                            <option value="New Brunswick">New Brunswick</option>
                            <option value="Newfoundland and Labrador">Newfoundland and Labrador</option>
                            <option value="Nova Scotia">Nova Scotia</option>
                            <option value="Ontario">Ontario</option>
                            <option value="Prince Edward Island">Prince Edward Island</option>
                            <option value="Quebec">Quebec</option>
                            <option value="Saskatchewan">Saskatchewan</option>
                            <option value="Northwest Territories">Northwest Territories</option>
                            <option value="Nunavut">Nunavut</option>
                            <option value="Yukon">Yukon</option>
                        </select>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default close hidden" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary hidden">Save changes</button>
                </div>
            </div>
        </div>
    </div>
    <a data-target="#countryState" data-backdrop="static" data-toggle="modal" class="hidden countryModal"></a>
@stop

@section('scripts')
    <script>
        toggleHours($('.toggle-hours a'));
        $('a.countryModal').click();
        $('.cafe-services a').on('click', function () {
            var inputField = $(this).find('input');
            $(this).toggleClass('active');
            $(this).find('i.glyphicon-ok').toggleClass('hidden');
            $(this).find('i.glyphicon-tag').toggleClass('hidden');
            if (inputField.val() == '0') {
                inputField.val(1);
            } else {
                inputField.val(0);
            }
        });
        $('select#country').on('change', function () {
            var stateList = $(this).find('option:selected').data('state');
            var country = $(this).val();
            $('input[name="country"]').val(country);
            $('input[name="state"]').val('');
            if (stateList.length > 0) {
                $('.form-group.state-filter').addClass('hidden');
                $('.form-group[data-country="' + stateList + '"]').toggleClass('hidden');
                $('select#state').on('change', function () {
                    var state = $(this).val();
                    $('input[name="state"]').val(state);
                    if ($('input[name="country"]').val().length > 0) {
                        if ($('input[name="state"]').val().length > 0) {
                            $('#countryState button.close').click();
                        }
                    }
                });
            } else {
                $('.form-group.state-filter').addClass('hidden');
                if ($('input[name="country"]').val().length > 0) {
                    $('#countryState button.close').click();
                }
            }
        });
    </script>
@stop