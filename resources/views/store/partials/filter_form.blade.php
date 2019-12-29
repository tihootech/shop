<form action="{{url()->current()}}">

    <div class="row">
        <div class="col-12 form-group">
            <label for="product-name"> نام محصول </label>
            <input type="number" id="product-name" class="form-control" name="q" value="{{request('q')}}">
        </div>
        <div class="col-6 form-group">
            <label for="min"> قیمت از </label>
            <input type="number" id="min" class="form-control" name="min" value="{{request('min')}}">
        </div>
        <div class="col-6 form-group">
            <label for="max"> قیمت تا </label>
            <input type="number" id="max" class="form-control" name="max" value="{{request('max')}}">
        </div>
        <div class="col-12 mt-3">
            <label for="order"> مرتب سازی </label>
            <select class="form-control wide py-0" name="order">
                <option value=""> -- بدون مرتب سازی -- </option>
                <option @if(request('order') == 'price-desc' ) selected @endif value="price-desc"> گرانترین </option>
                <option @if(request('order') == 'price-asc' ) selected @endif value="price-asc"> ارزانترین </option>
                <option @if(request('order') == 'date-desc' ) selected @endif value="date-desc"> جدید ترین </option>
                <option @if(request('order') == 'date-asc' ) selected @endif value="date-asc"> قدیمی ترین </option>
                <option @if(request('order') == 'discount-asc' ) selected @endif value="discount-asc"> کمترین تخفیف </option>
                <option @if(request('order') == 'discount-desc' ) selected @endif value="discount-desc"> بیشترین تخفیف </option>
            </select>
        </div>

        <div class="col-12 text-center mt-3">
            <button type="submit" class="btn essence-btn"> <i class="fa fa-search ml-1"></i> جستجو </button>
        </div>

    </div>

</form>
