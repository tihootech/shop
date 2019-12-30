<div class="single-product-wrapper">
    <div class="product-img">
        @if ($product->image)
            <img src="{{asset($product->image->path)}}" alt="{{$product->name}}">
        @else
            <img src="{{asset('essence/img/no-img.png')}}" alt="{{$product->name}}">
        @endif
        @if ($product->last_image)
            <img class="hover-img" src="{{asset($product->last_image->path)}}" alt="{{$product->name}}">
        @else
            <img class="hover-img" src="{{asset('essence/img/no-img.png')}}" alt="{{$product->name}}">
        @endif

        <!-- Product Badge -->
        @if ($product->discount)
            <div class="product-badge offer-badge">
                <span>-{{$product->discount}}%</span>
            </div>
        @endif

    </div>
    <!-- Product Description -->
    <div class="product-description">
        {{-- <span>mango</span> --}}
        <a href="{{url("product/$product->name")}}">
            <h6> {{$product->name}} </h6>
        </a>
        <p class="product-price">
            @if ($product->status == -1)
                <strong class="badge badge-danger"> ناموجود </strong>
            @elseif ($product->discount)
                <span class="old-price">{{number_format($product->price)}}</span>
                <strong class="text-danger mr-2"> {{toman($product->cost())}} </strong>

            @else
                {{toman($product->price)}}
            @endif
        </p>

        <!-- Hover Content -->
        <div class="hover-content">
            <!-- Add to Cart -->
            <div class="add-to-cart-btn">
                <a href="{{url("product/$product->name")}}" class="btn essence-btn"> <i class="fa fa-eye ml-1"></i> مشاهده </a>
            </div>
        </div>
    </div>
</div>
