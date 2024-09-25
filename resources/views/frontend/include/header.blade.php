<header class="header navbar-area">
    <!-- Start Topbar -->
    <div class="topbar">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-middle">
                        <ul class="useful-links">
                            <li><a href="/">Home</a></li>
                            <li><a href="about-us.html">About Us</a></li>
                            <li><a href="contact.html">Contact Us</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4 col-md-4 col-12">
                    <div class="top-end">
                        <div class="user">
                            <i class="lni lni-user"></i>
                            Hello
                        </div>
                        <ul class="user-login">
                            <li>
                                <a href="{{ url('signIn') }}">Sign In</a>
                            </li>
                            <li>
                                <a href="{{ url('signUp') }}">Register</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Topbar -->
    <!-- Start Header Middle -->
    <div class="header-middle">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-3 col-md-3 col-7">
                    <!-- Start Header Logo -->
                    <a class="navbar-brand" href="{{ url('/') }}">
                        <img src="{{ asset('/') }}images/logo/logo.png" alt="Logo">
                    </a>
                    <!-- End Header Logo -->
                </div>
                <div class="col-lg-5 col-md-7 d-xs-none">
                    <!-- Start Main Menu Search -->
                    <div class="main-menu-search">
                        <!-- navbar search start -->
                        <div class="navbar-search search-style-5">
                           
                            <div class="search-input">
                                <input type="text" placeholder="Search">
                            </div>
                            <div class="search-btn">
                                <button><i class="lni lni-search-alt"></i></button>
                            </div>
                        </div>
                        <!-- navbar search Ends -->
                    </div>
                    <!-- End Main Menu Search -->
                </div>
                <div class="col-lg-4 col-md-2 col-5">
                    <div class="middle-right-area">
                        <div class="nav-hotline">
                            <i class="lni lni-phone"></i>
                            <h3>Hotline:
                                <span>(+100) 123 456 7890</span>
                            </h3>
                        </div>
                        <div class="navbar-cart">
                            <div class="wishlist">
                                <a href="javascript:void(0)">
                                    <i class="lni lni-heart"></i>
                                    <span class="total-items">{{ count((array) session('cart')) }}</span>
                                </a>
                            </div>
                            <div class="cart-items">
                                <a href="javascript:void(0)" class="main-btn">
                                    <i class="lni lni-cart"></i>
                                    <span class="total-items">{{ count((array) session('cart')) }}</span>
                                </a>
                                <!-- Shopping Item -->
                                @php
                                    $total=0
                                @endphp
                                @foreach ((array) session('cart') as $id => $details)
                                    @php
                                        $price = ($details['discount_price'] != null) ? $details['discount_price'] : $details['product_price'];
                                        $total += $price * $details['product_quantity'];
                                    @endphp
                                @endforeach
                                <div class="shopping-item">
                                    <div class="dropdown-cart-header">
                                        <span>{{ count((array) session('cart')) }} Items</span>
                                        <a>${{ $total }}</a>
                                    </div>
                                    
                                    <ul class="shopping-list">
                                    @if (session('cart'))
                                        @foreach (session('cart') as $id=>$details)     
                                        <li>
                                            <a href="javascript:void(0)" class="remove" title="Remove this item"><i
                                                    class="lni lni-close"></i></a>
                                            <div class="cart-img-head">
                                                <a class="cart-img" href="product-details.html"><img src="{{ asset('images/product/'.$details['image']) }}" alt="#"></a>
                                            </div>

                                            <div class="content">
                                                <h4><a href="product-details.html">
                                                        {{ $details['product_title'] }}</a></h4>
                                                    @php
                                                        $price = ($details['discount_price'] != null) ? $details['discount_price'] : $details['product_price'];
                                                    @endphp
                                                <p class="quantity">1x - <span class="amount">${{ $price }}</span></p>
                                            </div>
                                        </li>
                                        @endforeach
                                    @endif
                                    </ul>
                                        
                                    <div class="bottom">
                                        <div class="total">
                                            <span>Total</span>
                                            <span class="total-amount">${{ $total }}</span>
                                        </div>
                                            <div class="button">
                                                <a href="{{ route('product.cart') }}" class="btn animate">View Cart</a>
                                            </div>
                                    </div>
                                </div>
                                <!--/ End Shopping Item -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Header Middle -->
    <!-- Start Header Bottom -->
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-8 col-md-6 col-12">
                <div class="nav-inner">
                   
                    <!-- Start Navbar -->
                    <nav class="navbar navbar-expand-lg">
                        <button class="navbar-toggler mobile-menu-btn" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ms-auto">
                                <li class="nav-item">
                                    <a href="{{ url('/') }}" class="active" aria-label="Toggle navigation">Home</a>
                                </li>
                                <li class="nav-item">
                                    <a  href="#category">Category</a>
                                </li>
                                <li class="nav-item">
                                    <a  href="#product">Product</a>
                                </li>
                                <li class="nav-item">
                                    <a  href="#team-member">Team Member</a>
                                </li>
                                <li class="nav-item">
                                    <a href="#services">Service</a>
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav>
                    <!-- End Navbar -->
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Nav Social -->
                <div class="nav-social">
                    <h5 class="title">Follow Us:</h5>
                    <ul>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-facebook-filled"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-twitter-original"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-instagram"></i></a>
                        </li>
                        <li>
                            <a href="javascript:void(0)"><i class="lni lni-skype"></i></a>
                        </li>
                    </ul>
                </div>
                <!-- End Nav Social -->
            </div>
        </div>
    </div>
    <!-- End Header Bottom -->
</header>