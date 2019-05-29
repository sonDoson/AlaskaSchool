<div class="cover-baner row">
    <div class="banner-01 col-12">
        <section class="banner cover_01">
            @if(!empty($section_0['images']))
                @foreach($section_0['images'] as $key => $value)
                <article>
                <img src="{{ $value }}" alt="" width="100%" height="auto" />
                </article>
                @endforeach
            @elseif(!empty($section_0[key($section_0)][0]['images']))
                @foreach($section_0[key($section_0)] as $key => $value)
                <article>
                    <img src="{{ $value['images'][0] }}" alt="" width="100%" height="auto" />
                </article>
                @endforeach
            @else
                @foreach($section_0 as $key => $value)
                <article>
                    <img src="{{ $value['images'][0] }}" alt="" width="100%" height="auto" />
                </article>
                @endforeach
            @endif
        </section>
    </div>
</div>

