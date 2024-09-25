<section class="trending-product section" id="product" style="margin-top: 12px;">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title">
                    <h2>Trending Product</h2>
                    <p>There are many variations of passages of Lorem Ipsum available, but the majority have
                        suffered alteration in some form.</p>
                </div>
            </div>
        </div>
        <div class="row">
            
            @foreach ($product as $product)
            <div class="col-lg-3 col-md-6 col-12">
                <!-- Start Single Product -->
                <div class="single-product">
                    <div class="product-image">
                        <img src="images/product/{{ $product->image }}" alt="#">
                        <div class="button">
                            <a href="{{ route('product.add.to.cart',$product->id) }}" class="btn"><i class="lni lni-cart"></i> Add to Cart</a>
                        </div>
                    </div>
                    <div class="product-info">
                        <span class="category">{{ $product->category->category_name }}</span>
                        <h4 class="title">  
                            <a href="product-grids.html">{{ $product->product_title }}</a>
                        </h4>
                        
                        <div class="price">
                            @if ($product->discount_price !=null )
                                <h6 class="text-primary">Discount Price: ${{ $product->discount_price }}</h6>
                                <span class="text-danger"><del>Price ${{ $product->price }}</del></span>
                            @else
                            <span>Price: ${{ $product->price }}</span>
                            @endif
                            
                        </div>
                        {{-- <hr>
                        <div class="d-flex whichlist_all">
                            <div>
                                <a href="javascript:void(0)">
                                    <i class="fas fa-heart whichlist"></i>
                                </a>
                            </div>
                            <div>
                                <a href="javascript:void(0)">
                                    <i class="fa-solid fa-eye details"></i>
                                </a>
                            </div>
                        </div> --}}
                    </div>
                </div>
                <!-- End Single Product -->
            </div>
            @endforeach
            
        </div>
    </div>
</section>