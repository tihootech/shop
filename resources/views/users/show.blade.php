@extends('layouts.dashboard')
@section('main')
    <div class="row user">
        <div class="col-md-12 @if(session('message')) mt-5 @endif">
            <div class="profile">
                <div class="info"><img class="user-img" src="{{asset('dashboard/img/user.png')}}">
                    <h4> {{$user->name}} </h4>
                    <p> نوع حساب : {{translate($user->type)}} </p>
                </div>
                <div class="cover-image" style="background-image: url({{asset('dashboard/img/banner.jpg')}});"></div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="tile p-0">
                <ul class="nav flex-column nav-tabs user-tabs">
                    <li class="nav-item"><a class="nav-link active" href="#user-timeline" data-toggle="tab"> رویداد ها </a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-settings" data-toggle="tab"> تغییر اطلاعات کاربری </a></li>
                    <li class="nav-item"><a class="nav-link" href="#user-password" data-toggle="tab"> تغییر گذرواژه </a></li>
                </ul>
            </div>
        </div>
        <div class="col-md-9">
            <div class="tab-content">
                <div class="tab-pane active" id="user-timeline">
                    <div class="timeline-post">
                        <div class="post-media">
                            <a href="#"><img src="{{asset('dashboard/img/user.png')}}"></a>
                            <div class="pr-4">
                                <h5><a href="#"> {{$user->name}} </a></h5>
                                {{-- <p class="text-muted"><small>2 January at 9:30</small></p> --}}
                            </div>
                        </div>
                        <div class="post-content">
                            <p> این کاربر در تاریخ {{human_date($user->created_at)}} به مجموعه اضافه شد. </p>
                        </div>
                        {{-- <ul class="post-utility">
                            <li class="likes"><a href="#"><i class="fa fa-fw fa-lg fa-thumbs-o-up"></i>Like</a></li>
                            <li class="shares"><a href="#"><i class="fa fa-fw fa-lg fa-share"></i>Share</a></li>
                            <li class="comments"><i class="fa fa-fw fa-lg fa-comment-o"></i> 5 Comments</li>
                        </ul> --}}
                    </div>
                </div>
                <div class="tab-pane fade" id="user-settings">
                    <div class="tile user-settings">
                        <h4 class="line-head">تغییر اطلاعات کاربری</h4>
                        <form method="post" action="{{url("users/$user->id")}}">
                            @csrf
                            {{method_field('PUT')}}
                            <input type="hidden" name="type" value="info">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label> شماره تماس </label>
                                    <input class="form-control" type="text" name="phone" value="{{$user->phone}}" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="name"> نام کاربری </label>
                                    <input class="form-control" type="text" name="name" id="name" value="{{$user->name}}" required>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> تایید </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="tab-pane fade" id="user-password">
                    <div class="tile user-settings">
                        <h4 class="line-head"> تغییر رمز عبور </h4>
                        <form method="post" action="{{url("users/$user->id")}}">
                            @csrf
                            {{method_field('PUT')}}
                            <input type="hidden" name="type" value="password">
                            <div class="row mb-4">
                                <div class="col-md-4">
                                    <label for="current-password"> رمز عبور فعلی </label>
                                    <input class="form-control" type="password" name="current_password" id="current-password" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="new-password"> رمز عبور جدید</label>
                                    <input class="form-control" type="password" name="new_password" id="new-password" required>
                                </div>
                                <div class="col-md-4">
                                    <label for="new-password-confirm"> رمز عبور جدید</label>
                                    <input class="form-control" type="password" name="new_password_confirmation" id="new-password-confirm" required>
                                </div>
                            </div>
                            <div class="row mb-10">
                                <div class="col-md-12">
                                    <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> تایید </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
