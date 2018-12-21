<footer>
    <div class="row section">
        <div id="footer-left" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3" style="margin-bottom: 30px;">
            <div id="footer-left-img">
                <img src="{{ asset('uploads/logo/logo02.png') }}" alt="alaska school" width="auto" height="100%" />
            </div>
            <!-- form deleted -->
            <br>
            <br>
            <div id="footer-text">
                <div>
                    <h4>{{ $static_text[2][2][$lang[1]] }}:</h4>
                    <p>Ad: {!! $contact['address'] !!}</p>
                    <p>T: {!! $contact['phone'] !!} | F: {!! $contact['fax'] !!}</p>
                    <p>E: {!! $contact['email'] !!}</p>
                </div>
                <div id="footer-left-conect">
                    <br>
                    <div>
                        @foreach($contact['link'] as $key => $value)
                            @if($value['link'] !== '')
                            <a href="{{ $value['link'] }}" style="color: #ffffff"><i style="font-size: 45px; margin-right: 10px" class="{{ $value['icon'] }}"></i></a>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div id="footer-mid" class="col-xs-12 col-sm-12 col-md-12 col-lg-6 col-xl-6" style="margin-bottom: 30px;">
            <iframe {!! $contact['map'] !!} width="100%" height="300px" frameborder="0" style="border:0" allowfullscreen></iframe>
        </div>
        <!--text-->
        <div id="footer-right" class="col-xs-12 col-sm-12 col-md-12 col-lg-3 col-xl-3">
            <div class="row" style="width: 100%; height: 100%;margin: 0" >
                {!! $contact['footer_text'][$lang[1]] !!}
            </div>
        </div>
    </div>
</footer>