@include('layouts.header')
@include('modules.menu')

<div class="container">
    <form class="form-horizontal" role="form" method="POST" action="{{ url('shops/register') }}">
        {{ csrf_field() }}
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h2>Đăng ký mở shop</h2>
                <hr>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Tên shop</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: -webkit-fill-available">
                        <div class="input-group-addon" style="width: 34px; height: 34px"><i class="fa fa-user" style="width: 16px"></i></div>
                        <input type="text" name="shop_name" class="form-control" id="name" placeholder="Mic MCS" required=""
                               autofocus="" value="{{ old('shop_name') }}">
                    </div>
                </div>
            </div>
            @if ($errors->has('shop_name'))
                <div class="col-md-3">
                    <div class="form-control-static">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close">{{ $errors->first('shop_name') }}</i>
                        </span>
                    </div>
                </div>
            @endif

        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Số TK</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: -webkit-fill-available">
                        <div class="input-group-addon" style="width: 34px; height: 34px"><i class="fa fa-money" style="width: 16px"></i></div>
                        <input type="text" name="id_bank" class="form-control" id="" placeholder="" required="required"
                               autofocus="" value="{{ old('id_bank') }}">
                    </div>
                </div>
            </div>
            @if ($errors->has('id_bank'))
                <div class="col-md-3">
                    <div class="form-control-static">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close">{{ $errors->first('id_bank') }}</i>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Địa chỉ</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: -webkit-fill-available">
                        <div class="input-group-addon" style="width: 34px; height: 34px"><i class="fa fa-home" style="width: 16px"></i></div>
                        <input type="text" name="address" class="form-control" id="" placeholder="" required="required"
                               autofocus="" value="{{ old('address') }}">
                    </div>
                </div>
            </div>
            @if ($errors->has('address'))
                <div class="col-md-3">
                    <div class="form-control-static">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close">{{ $errors->first('address') }}</i>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="name">Phone</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: -webkit-fill-available">
                        <div class="input-group-addon" style="width: 34px; height: 34px"><i class="fa fa-phone" style="width: 16px"></i></div>
                        <input type="text" name="phone" class="form-control" id="" placeholder="0986xxxxx" required="required"
                               autofocus="" value="{{ old('phone') }}">
                    </div>
                </div>
            </div>
            @if ($errors->has('phone'))
                <div class="col-md-3">
                    <div class="form-control-static">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close">{{ $errors->first('phone') }}</i>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="email">E-Mail Address</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: -webkit-fill-available">
                        <div class="input-group-addon" style="width: 34px; height: 34px"><i class="fa fa-at" style="width: 16px"></i></div>
                        <input type="text" name="email" class="form-control" id="email" placeholder="you@example.com"
                               required="" autofocus="" value="{{ old('email') }}">
                    </div>
                </div>
            </div>
            @if ($errors->has('email'))
                <div class="col-md-3">
                    <div class="form-control-static">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close">{{ $errors->first('email') }}</i>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group has-danger">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: -webkit-fill-available">
                        <div class="input-group-addon" style="width: 34px; height: 34px"><i class="fa fa-key" style="width: 16px"></i></div>
                        <input type="password" name="password" class="form-control" id="password" placeholder="Password"
                               required="" value="{{ old('password') }}">
                    </div>
                </div>
            </div>
            @if ($errors->has('password'))
                <div class="col-md-3">
                    <div class="form-control-static">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close">{{ $errors->first('password') }}</i>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3 field-label-responsive">
                <label for="password">Confirm Password</label>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0" style="width: -webkit-fill-available">
                        <div class="input-group-addon" style="width: 34px; height: 34px">
                            <i class="fa fa-repeat" style="width: 16px"></i>
                        </div>
                        <input type="password" name="password_confirmation" class="form-control" id="password-confirm"
                               placeholder="Password" required="">
                    </div>
                </div>
            </div>
            @if ($errors->has('password_confirmation'))
                <div class="col-md-3">
                    <div class="form-control-static">
                        <span class="text-danger align-middle">
                            <i class="fa fa-close">{{ $errors->first('password_confirmation') }}</i>
                        </span>
                    </div>
                </div>
            @endif
        </div>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <button type="submit" class="btn btn-success"><i class="fa fa-user-plus"></i> Register</button>
            </div>
        </div>
    </form>
</div>
@include('layouts.footer')