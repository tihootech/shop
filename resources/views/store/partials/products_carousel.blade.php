<section class="new_arrivals_area clearfix">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-heading text-center">
                    <h2> {{$title}} </h2>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="popular-products-slides owl-carousel">

                    @foreach ($products as $product)
                        @include('store.partials.product')
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>
