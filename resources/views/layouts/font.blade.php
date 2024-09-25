<!DOCTYPE html>
<html class="no-js" lang="zxx">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>@yield('title') - {{ env('APP_NAME') }}</title>
    <meta name="description" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/') }}images/favicon.svg" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <!-- ========================= CSS here ========================= -->
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
    <link rel="stylesheet" href="{{ asset('/') }}css/bootstrap.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/LineIcons.3.0.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/tiny-slider.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/glightbox.min.css" />
    <link rel="stylesheet" href="{{ asset('/') }}css/main.css" />
    {{-- internal css --}}
    @stack('styles')
    <style>
        .toast-success {
        background-color: #51a351;
        }
        .toast-error {
        background-color: #bd362f;
        }
        .toast-info {
        background-color: #2f96b4;
        }
        .toast-warning {
        background-color: #f89406;
        }
    </style>
</head>

<body>
    <!--[if lte IE 9]>
      <p class="browserupgrade">
        You are using an <strong>outdated</strong> browser. Please
        <a href="https://browsehappy.com/">upgrade your browser</a> to improve
        your experience and security.
      </p>
    <![endif]-->

    <!-- Preloader -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- /End Preloader -->

    <!-- Start Header Area -->
    @include('frontend.include.header')
    <!-- End Header Area -->
    @if (!Request::is('/'))
        @include('frontend.include.breadcrum')
    @endif
    
    <!-- Start Hero Area -->
    @yield('content')
    <!-- End Shipping Info -->

    <!-- Start Footer Area -->
    @include('frontend.include.footer')
    <!--/ End Footer Area -->

    <!-- ========================= scroll-top ========================= -->
    <a href="#" class="scroll-top">
        <i class="lni lni-chevron-up"></i>
    </a>

    <!-- ========================= JS here ========================= -->
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="{{ asset('/') }}js/bootstrap.min.js"></script>
    <script src="{{ asset('/') }}js/tiny-slider.js"></script>
    <script src="{{ asset('/') }}js/glightbox.min.js"></script>
    <script src="{{ asset('/') }}js/main.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js" type="text/javascript"></script>
    <script>
        
        function flashMessage(status,message){
            toastr.options = {
            "closeButton": false,
            "debug": false,
            "newestOnTop": false,
            "progressBar": false,
            "positionClass": "toast-top-right",
            "preventDuplicates": false,
            "onclick": null,
            "showDuration": "300",
            "hideDuration": "1000",
            "timeOut": "5000",
            "extendedTimeOut": "1000",
            "showEasing": "swing",
            "hideEasing": "linear",
            "showMethod": "fadeIn",
            "hideMethod": "fadeOut"
            }
            switch (status) {
                case 'success':
                    toastr.success(message);
                    break;
                case 'error':
                    toastr.error(message);
                    break;
                case 'info':
                    toastr.info(message);
                    break;
                case 'warning':
                    toastr.warning(message);
                    break;
            }
        }
            @if (session()->get('success'))
                flashMessage('success',"{{ session()->get('success') }}")
            @elseif (session()->get('error'))    
                flashMessage('error',"{{ session()->get('error') }}")
            @elseif (session()->get('info'))    
                flashMessage('info',"{{ session()->get('info') }}")
            @elseif (session()->get('warning'))    
                flashMessage('warning',"{{ session()->get('warning') }}")
            @endif
    </script>
    <script type="text/javascript">
        //========= Hero Slider 
        tns({
            container: '.hero-slider',
            slideBy: 'page',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 0,
            items: 1,
            nav: false,
            controls: true,
            controlsText: ['<i class="lni lni-chevron-left"></i>', '<i class="lni lni-chevron-right"></i>'],
        });

        //======== Brand Slider
        tns({
            container: '.brands-logo-carousel',
            autoplay: true,
            autoplayButtonOutput: false,
            mouseDrag: true,
            gutter: 15,
            nav: false,
            controls: false,
            responsive: {
                0: {
                    items: 1,
                },
                540: {
                    items: 3,
                },
                768: {
                    items: 5,
                },
                992: {
                    items: 6,
                }
            }
        });
    </script>
    {{-- internal js --}}
    @stack('script')
</body>

</html>