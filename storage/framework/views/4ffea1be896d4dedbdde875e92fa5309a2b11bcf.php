<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="icon" type="image/x-icon" href="<?php echo e(asset('/vendor/icon/favicon.ico')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="152x152" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-152-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-144-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="120x120" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-120-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-114-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-72-267423.png')); ?>">

<link rel="apple-touch-icon-precomposed" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-57-267423.png')); ?>">

<link rel="icon" href="<?php echo e(asset('/vendor/icon/simple-celtic-knot-32-267423.png')); ?>" sizes="32x32">

        <!-- Styles -->
        <style>
            html, body {
                background-color: #fff;
                color: #636b6f;
                font-family: 'Nunito', sans-serif;
                font-weight: 200;
                height: 100vh;
                margin: 0;
            }

            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 84px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 13px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
        </style>
    </head>
    <body>
        <div class="flex-center position-ref full-height">
            <?php if(Route::has('login')): ?>
                <div class="top-right links">
                    <?php if(auth()->guard()->check()): ?>
                        <a href="<?php echo e(url('/home')); ?>">Home</a>
                    <?php else: ?>
                        <a href="<?php echo e(route('login')); ?>">Login</a>

                        <?php if(Route::has('register')): ?>
                            <a href="<?php echo e(route('register')); ?>">Register</a>
                        <?php endif; ?>
                    <?php endif; ?>
                </div>
            <?php endif; ?>

            <div class="content">
                <div class="title m-b-md">
                    Laravel
                </div>

                <div class="links">
                    <a href="https://laravel.com/docs">Docs</a>
                    <a href="https://laracasts.com">Laracasts</a>
                    <a href="https://laravel-news.com">News</a>
                    <a href="https://blog.laravel.com">Blog</a>
                    <a href="https://nova.laravel.com">Nova</a>
                    <a href="https://forge.laravel.com">Forge</a>
                    <a href="https://vapor.laravel.com">Vapor</a>
                    <a href="https://github.com/laravel/laravel">GitHub</a>
                </div>
            </div>
        </div>
    </body>
</html>
<?php /**PATH C:\wamp64\www\product\resources\views\welcome.blade.php ENDPATH**/ ?>