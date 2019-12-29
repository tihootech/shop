<!-- Cart Button -->
<div class="cart-button">
    <a href="#" id="rightSideCart"><img src="{{asset('essence/img/core-img/bag.svg')}}" alt=""> <span>{{cart_products_count()}}</span></a>
</div>

<div class="cart-content d-flex">

    <!-- Cart List Area -->
    <div class="cart-list">

        @foreach (cart_products() as $id => $array)
            <?php // TODO: fix mobile view ?>
            <div class="single-cart-item">
                <a href="#" class="product-image">
                    <img src="{{asset($array['product']->image->path ??  'essence/img/tihootech-long.png')}}" class="cart-thumb" alt="{{$array['product']->title}}">
                    <!-- Cart Item Desc -->
                    <div class="cart-item-desc">
                        <span class="product-remove" data-id="{{$id}}">
                            <i class="fa fa-close" aria-hidden="true"></i>
                        </span>
                        <h6>{{$array['product']->name}}</h6>
                        <p class="size">قیمت پایه : {{toman( $array['product']->price)}}</p>
                        <p class="size">تخفیف : {{$array['product']->discount}}%</p>
                        <p class="size">تعداد: {{$array['count']}}</p>
                        <p class="size">
                            <button class="change-count" type="button" value="{{$id}}" name="more">
                                <i class="fa fa-arrow-up ml-1"></i>
                                افزایش تعداد
                            </button>
                            @if ($array['count'] > 1)
                                <button class="change-count" type="button" value="{{$id}}" name="less">
                                    <i class="fa fa-arrow-down ml-1"></i>
                                    کاهش تعداد
                                </button>
                            @endif
                        </p>
                        <p class="price">{{toman( $array['product']->cost() * $array['count'] )}}</p>
                    </div>
                </a>
            </div>
        @endforeach

    </div>

    <!-- Cart Summary -->
    <div class="cart-amount-summary">

        <h2>مجموع هزینه ها</h2>
        <ul class="summary-table">
            <li><span>مجموع:</span> <span> {{toman(cart_sum('price'))}}  </span></li>
            <li><span>هزینه ارسال:</span> <span> رایگان </span></li>
            <li><span>تخفیف:</span> <span>{{toman(cart_sum('price')-cart_sum())}}</span></li>
            <li><span>قابل پرداخت:</span> <span> {{toman(cart_sum())}} </span></li>
        </ul>
        <div class="checkout-btn mt-100">
            <a href="{{url('store/checkout')}}" class="btn essence-btn"> نهایی سازی و پرداخت </a>
        </div>
    </div>
</div>
