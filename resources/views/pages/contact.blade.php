@extends('layouts.master')

@section('banner', 'page mini')
@section('background', URL::asset('library/img/banner-base.jpg'))
@section('bannerText')
    {!! "Contact Us" !!}
@stop


@section('content')
    <section class="page">
        <div class="block header">
            <h2>
                Please contact us via the form below. We look forward to serving you. If you'd like to contact a store directly, go to the Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg; <nobr><a href="{{ URL::to('locations') }}">store locator</a></nobr>.
            </h2>
            <hr class="red-dotted-divider within">
            <br>

        </div>

        <div class="main-column">

            <div class="block dark">
                <div class="alert hidden" style="background:#ffd41f;padding:15px;color:#2E1A11;"></div>
                {!! Form::open() !!}
                <div class="form-group">
                    <label for="">* = required</label>
                </div>
                <div class="form-group">
                    {!! Form::label('name', 'Name*') !!}
                    <input name="name" id="name" type="text" />
                </div>
                <div class="form-group">
                    {!! Form::label('email', 'Email*') !!}
                    <input name="email" id="email" type="text" />
                </div>
                <div class="form-group">
                    {!! Form::label('reason', 'Reason*') !!}
                    <select name="subject" id="subject">
                        <option value="">Please Choose</option>
                        <option value="Change my order">Change my order</option>
                        <option value="Discuss a recent order">Discuss a recent order</option>
                        <option value="Ask about a Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Caf&eacute;">Ask about a Nestl&eacute;<sup>&reg;</sup> Toll House<sup>&reg;</sup> Cafe</option>
                        <option value="Ask about dessert products">Ask about dessert products</option>
                        <option value="Learn more about Franchising">Learn more about Franchising</option>
                        <option value="Cookie Crew (kids club)">Cookie Crew (kids club)</option>
                        <option value="Caf&eacute; Club (send me promotions)">Caf&eacute; Club (send me promotions)</option>
                        <option value="Leave a Comment">Leave a Comment</option>
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('location', 'Location') !!}
                    <select name="store" id="store">
                        <option value="">Please Choose</option>
                        <option value="">Not Applicable</option>
                        @foreach(\App\Cafe::orderby('name', 'asc')->where('archive', 0)->where('draft', 0)->get() as $cafe)
                            <option value="{{ $cafe->id }}">{{ $cafe->name }} - {{ $cafe->city }}{{ $cafe->state ? ', '.$cafe->state : null }}{{ $cafe->country ? ', '.$cafe->country : null }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    {!! Form::label('comments', 'Comments*') !!}
                    <textarea class="" value="" name="comments" id="comments" cols="30" rows="10"></textarea>
                </div>
                <div class="form-group">
                    {!! Form::submit('Submit') !!}
                </div>
                <div class="g-recaptcha" data-sitekey="6LeXIXEUAAAAAC2I4tdWqlMHYIZJ73qCaEsNAUoV"></div>
                {!! Form::close() !!}
            </div>
        </div>
        <div class="side-column">
            <div class="block transparent">
                <h3>Nestl&eacute;&reg; Toll House&reg; Caf&eacute; by Chip&reg;</h3>
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
                <a href="{{ URL::to('locations') }}" class="btn wired btn-sm">Visit The Caf&eacute; Locator</a>
            </div>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
    </section>
@stop

@section('scripts')
    {{--<script>--}}
        {{--$('form').on('submit', function(e){--}}
            {{--e.preventDefault();--}}
            {{--var that = $(this);--}}
            {{--var url = that.attr('action');--}}
            {{--$.ajax({--}}
                {{--type: 'post',--}}
                {{--url: url,--}}
                {{--data: that.serialize(),--}}
                {{--success: function (response) {--}}
                    {{--if(response == 'success') {--}}
                        {{--window.location.replace('{{ URL::to('contact/success') }}');--}}
                    {{--} else {--}}
                        {{--$('.alert').text('Please fill out all the required fields');--}}
                        {{--$('.alert').removeClass('hidden');--}}
                    {{--}--}}
                {{--}--}}
            {{--});--}}
        {{--});--}}
    {{--</script>--}}
@stop