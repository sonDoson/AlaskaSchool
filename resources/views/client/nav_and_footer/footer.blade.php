<footer>
    <div class="row section" style="padding-bottom: 30px;">
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
                    <p></p><i class="fas fa-map-marker-alt"></i> {!! $contact['address'] !!}</p>
                    <p><i class="fas fa-phone"></i> {!! $contact['phone'] !!}</p>
                    <p><i class="far fa-envelope"></i> {!! $contact['email'] !!}</p>
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
                <ul>
                    <li>&nbsp;&nbsp;<a href="{{ asset('/') }}">{{ $static_text[4][4][$lang[1]] }}</a></li>
                    <li>&nbsp;&nbsp;<a style="width: 250px;" id="nav_contact"  href="{{ '/contact' }}">{{ $contact[$lang[0]] }}</a></li>
                    @for($i = 1; $i <= 5; $i++)
                        <li>
                            &nbsp;&nbsp;<a style="width: 250px;" id="{{ 'nav_' . $i }}" href="{{ '/cat/' . $i }}">{{ $category[$i][$lang[0]] }}</a>
                        </li>
                    @endfor
                </ul>
            </div>
        </div>
    </div>
</footer>