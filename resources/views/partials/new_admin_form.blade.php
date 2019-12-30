<form class="row justify-content-center" action="{{url('user_admin/'.$admin->id)}}" method="post">
	@if ($admin->id)
		@method('PUT')
	@endif
	@csrf
	<div class="col-lg-4 col-md-8">
		<div class="form-group">
			<label for="name"> نام </label>
			<input type="text" class="form-control" name="name" id="name" value="{{old('name') ?? $admin->name}}">
			<small class="text-muted">
				<i class="fa fa-asterisk ml-1"></i>
				نام فروشگاه
			</small>
		</div>
	</div>
	<div class="col-lg-4 col-md-8">
		<div class="form-group">
			<label for="phone"> شماره تماس </label>
			<input type="text" class="form-control" name="phone" id="phone" value="{{old('phone') ?? $admin->phone}}">
			<small class="text-muted">
				<i class="fa fa-asterisk ml-1"></i>
				شماره تماس فروشگاه
			</small>
		</div>
	</div>
	@unless ($admin->id)
		<div class="col-lg-4 col-md-8">
			<div class="form-group">
				<label for="pwd"> رمزعبور </label>
				<input type="text" class="form-control" name="pwd" id="pwd" value="{{old('pwd')}}">
				<small class="text-muted">
					<i class="fa fa-asterisk ml-1"></i>
					رمز عبور برای ورود به حساب کاربری -
					نام کاربری نیز درواقع شماره تماس ادمین خواهد بود.
				</small>
			</div>
		</div>
	@endunless
	<div class="col-lg-8">
		<div class="form-group">
			<label for="title"> عنوان فروشگاه </label>
			<input type="text" class="form-control" name="title" id="title" value="{{old('title') ?? $admin->details->title ?? null}}">
			<small class="text-muted">
				<i class="fa fa-asterisk ml-1"></i>
				عنوان فروشگاه در واقع آدرسی است که در مرورگر وارد میشود تا محصولات فروشگاه به کاربران نشان داده شود.
				به عنوان مثال اگر عنوان فروشگاه را test قرار دهید،
				آنگاه آدرس فروشگاه مورد نظر برابر خواهد بود با:
				<b class="calibri text-info"> {{url('/')}}/test </b>
			</small>
		</div>
	</div>
	<div class="col-lg-12">
		<div class="form-group">
			<label for="address"> آدرس فروشگاه </label>
			<input type="text" class="form-control" name="address" id="address" value="{{old('address') ?? $admin->details->address ?? null}}">
		</div>
	</div>
	<div class="col-lg-3 col-md-6">
		<button type="submit" class="btn btn-primary btn-block">
			@if ($admin->id)
				<i class="fa fa-check ml-1"></i> ویرایش
			@else
				<i class="fa fa-plus ml-1"></i> تعریف ادمین جدید
			@endif
		</button>
	</div>
</form>
