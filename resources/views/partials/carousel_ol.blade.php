@if ( count($packages = fragments_overflow($section->fragments )) > 1 )
    <ol class="carousel-indicators carousel-indicators-numbers">
        @foreach ( $packages as $number => $package)
            <li data-target="#carouselIndicators{{$section->id}}" data-slide-to="{{$number}}" @if(!$number) class="active" @endif></li>
        @endforeach
    </ol>
@endif
