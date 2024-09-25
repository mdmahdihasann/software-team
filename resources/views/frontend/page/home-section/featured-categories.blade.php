<section class="featured-categories section" id="category">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Featured Categories</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            @forelse ($category as $value)
            
            <div class="col-lg-2 col-md-4 col-6">
                <!-- Start Single Category -->
                <div class="single-category">
                    <div class="images"><img src="images/category/{{ $value->image }}" alt="{{ $value->category_name }}"></div>
                    <div class="mt-2 text-center">
                        <a href="#" class="heading">{{ $value->category_name }}</a>
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            @empty
            <h4 class="text-center text-danger">Data not found</h4>
            @endforelse
            
            {{-- <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category">
                    <h3 class="heading">Desktop & Laptop</h3>
                    <ul>
                        <li><a href="product-grids.html">Smart Television</a></li>
                        <li><a href="product-grids.html">QLED TV</a></li>
                        <li><a href="product-grids.html">Audios</a></li>
                        <li><a href="product-grids.html">Headphones</a></li>
                        <li><a href="product-grids.html">View All</a></li>
                    </ul>
                    <div class="images">
                        <img src="{{ asset('/') }}images/featured-categories/fetured-item-2.png" alt="#">
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category">
                    <h3 class="heading">Cctv Camera</h3>
                    <ul>
                        <li><a href="product-grids.html">Smart Television</a></li>
                        <li><a href="product-grids.html">QLED TV</a></li>
                        <li><a href="product-grids.html">Audios</a></li>
                        <li><a href="product-grids.html">Headphones</a></li>
                        <li><a href="product-grids.html">View All</a></li>
                    </ul>
                    <div class="images">
                        <img src="{{ asset('/') }}images/featured-categories/fetured-item-3.png" alt="#">
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category">
                    <h3 class="heading">Dslr Camera</h3>
                    <ul>
                        <li><a href="product-grids.html">Smart Television</a></li>
                        <li><a href="product-grids.html">QLED TV</a></li>
                        <li><a href="product-grids.html">Audios</a></li>
                        <li><a href="product-grids.html">Headphones</a></li>
                        <li><a href="product-grids.html">View All</a></li>
                    </ul>
                    <div class="images">
                        <img src="{{ asset('/') }}images/featured-categories/fetured-item-4.png" alt="#">
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category">
                    <h3 class="heading">Smart Phones</h3>
                    <ul>
                        <li><a href="product-grids.html">Smart Television</a></li>
                        <li><a href="product-grids.html">QLED TV</a></li>
                        <li><a href="product-grids.html">Audios</a></li>
                        <li><a href="product-grids.html">Headphones</a></li>
                        <li><a href="product-grids.html">View All</a></li>
                    </ul>
                    <div class="images">
                        <img src="{{ asset('/') }}images/featured-categories/fetured-item-5.png" alt="#">
                    </div>
                </div>
                <!-- End Single Category -->
            </div>
            <div class="col-lg-4 col-md-6 col-12">
                <!-- Start Single Category -->
                <div class="single-category">
                    <h3 class="heading">Game Console</h3>
                    <ul>
                        <li><a href="product-grids.html">Smart Television</a></li>
                        <li><a href="product-grids.html">QLED TV</a></li>
                        <li><a href="product-grids.html">Audios</a></li>
                        <li><a href="product-grids.html">Headphones</a></li>
                        <li><a href="product-grids.html">View All</a></li>
                    </ul>
                    <div class="images">
                        <img src="{{ asset('/') }}images/featured-categories/fetured-item-6.png" alt="#">
                    </div>
                </div>
                <!-- End Single Category -->
            </div> --}}
        </div>
    </div>
</section>