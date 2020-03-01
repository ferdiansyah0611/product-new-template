@extends('templates')
@section('css')
    <title>Login Account <?php echo $_SERVER['HTTP_HOST']; ?></title>
@endsection
@section('content')
<section class="flexbox-container">
    <div class="col-md-4 offset-md-4 col-xs-10 offset-xs-1  box-shadow-2 p-0">
        <div class="card border-grey border-lighten-3 m-0">
            <div class="card-header no-border">
                <div class="card-title text-xs-center">
                    <div class="p-1"><img src="../../app-assets/images/logo/robust-logo-dark.png" alt="branding logo"></div>
                </div>
                <h6 class="card-subtitle line-on-side text-muted text-xs-center font-small-3 pt-2"><span>Login with <?php echo $_SERVER['HTTP_HOST']; ?></span></h6>
            </div>
            <div class="card-body collapse in">
                <div class="card-block">
                    <form class="form-horizontal form-simple" method="post" action="{{url('post-login')}}" novalidate>@csrf
                        <fieldset class="form-group position-relative has-icon-left mb-0">
                            <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Your Username" name="email" required>
                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-position">
                                <i class="icon-head"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group position-relative has-icon-left mt-1">
                            <input type="password" class="form-control form-control-lg input-lg" id="user-password" placeholder="Enter Password" name="password" required>
                            @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            <div class="form-control-position">
                                <i class="icon-key3"></i>
                            </div>
                        </fieldset>
                        <fieldset class="form-group row">
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-left">
                                <fieldset>
                                    <input type="checkbox" id="remember-me" class="chk-remember">
                                    <label for="remember-me"> Remember Me</label>
                                </fieldset>
                            </div>
                            <div class="col-md-6 col-xs-12 text-xs-center text-md-right"><a href="recover-password.html" class="card-link">Forgot Password?</a></div>
                        </fieldset>
                        <button type="submit" class="btn btn-primary btn-lg btn-block"><i class="icon-unlock2"></i> Login</button>
                    </form>
                </div>
            </div>
            <div class="card-footer">
                <div class="">
                    <a href="{{url('redirect/google')}}" title="">Google</a>
                    <p class="float-sm-right text-xs-center m-0">Dont have account ? <a href="{{url('/registrations')}}" class="card-link">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</section>@endsection
@section('ajax')
<script type="text/javascript">
$(document).ready(function(){
$('#footerStyle').css("display", "none");
$('#bodyStyle').css({
  "background-image":"url({{asset('image/walpaper-9.jpg')}})",
  "background-attachment":"fixed",
  "background-size":"100% 100%",
});
$('#navbarStyle').css("display", "none");
$('#menuStyle').css("display", "none");
$('#appContentStyle').css("margin", "0");
});
</script>
@endsection