<link rel="stylesheet" href="{!! asset('/asset/css/style.css')  !!}">
<div class="container">
    <div class="screen">
        <div class="screen__content">
            <form class="login" action="register" method="post">
                @csrf
                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="text" class="login__input" name="uname" placeholder="User name ">
                </div>

                <div class="login__field">
                    <i class="login__icon fas fa-user"></i>
                    <input type="email" class="login__input" name="email" placeholder="Email ">
                </div>

                <div class="login__field">
                    <i class="login__icon fas fa-lock"></i>
                    <input type="password" class="login__input" name="password" placeholder="Password">
                </div>
                <button class="button login__submit">
                    <span class="button__text">Register Now</span>
                    <i class="button__icon fas fa-chevron-right"></i>
                </button>
            </form>
            <div>

                <div class="social-icons">
                    <span>You Have Already Have an Account<a href="login" >Login Now </a></span>
                </div>
            </div>
        </div>
        <div class="screen__background">
            <span class="screen__background__shape screen__background__shape4"></span>
            <span class="screen__background__shape screen__background__shape3"></span>
            <span class="screen__background__shape screen__background__shape2"></span>
            <span class="screen__background__shape screen__background__shape1"></span>
        </div>
    </div>
</div>
