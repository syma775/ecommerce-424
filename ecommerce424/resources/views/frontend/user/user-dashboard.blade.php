@extends('frontend.user.master')
@section("title")
E-commerce
@endsection
@section("content")
<header class="bg-dark py-5">
            <div class="container px-4 px-lg-5 my-5">
                <div class="text-center text-white">
                    <h1 class="display-4 fw-bolder">Shop in style</h1>
                    <p class="lead fw-normal text-white-50 mb-0">With this shop hompeage template</p>
                </div>
            </div>
        </header>
        <!-- Section-->
        <section class="py-5">
            @foreach($products as $product)
            
            <div class="container px-4 px-lg-5 mt-5">
                <div class="">
                   <div class="col-md-12">
                    <div class="row">
                    
                        <div class="col-md-3">
                       
                        <div class="card ">
                        @if(session()->has('success'))
					          <div class="alert alert-success">{{ session()->get('success')}}</div>
					          @endif
							  @if(session()->has('error'))
					          <div class="alert alert-danger">{{ session()->get('error')}}</div>
					          @endif
                            <!-- Sale badge-->
                            <div class="badge bg-dark text-white position-absolute" style="top: 0.5rem; right: 0.5rem">Sale</div>
                            <!-- Product image-->
                            <img class="card-img-top" src="{{ asset('/product/'.$product->image) }}" alt="..." />
                            <!-- Product details-->
                            <div class="card-body p-4">
                           
                                <div class="text-center">
                                <form action="{{ url('/add/to/cart') }}" method="post">
                                @csrf
                                    <!-- Product name-->
                                    <h5 class="fw-bolder">{{ $product->name }}</h5>
                                 
                                    <div class=" mb-2">
                                        <div class="">
                                        <span class="text-muted">Size:</span>
                                        {{ $product->size }}
                                        </div>
                                        <div class="">
                                        <span class="text-muted">Color:</span>
                                        {{ $product->color }} 
                                        </div>
                                        
                                    </div>
                                    <!-- Product price-->
                                    <span class="text-muted">Price:</span>
                                    {{ $product->price }}
                                </div>
                            </div>
                            <!-- Product actions-->
                            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                            
											<input type="hidden" name="vendor_id" value="{{ $product->vendor_id }}"/>
											<input type="hidden" name="product_id" value="{{ $product->id }}"/>
											<input type="hidden" name="price" value="{{ $product->price }}"/>
											<div class="women">
												<!-- <h6><a href="{{ url('/product/details/'.$product->id) }}">{{ $product->name }}</a></h6>
												<p ><em class="item_price">${{ $product->price }}</em></p> -->
                                                <!-- <input type="number" min="1" max="{{ $product->qty}}" name="qty" value="1"/> -->
												
                                                <div class="text-center"><button class="btn btn-outline-dark mt-auto" type="submit">Add to cart</button></div>
                                            
												
												
											</div>
										</form>
                               
                            </div>
                        </div>

                        </div>

                        </div>
                        
                        <div class="col-md-1"></div>
                        <div class="col-md-1"></div>
                    </div>
                   </div>
                </div>
            </div>
           
            @endforeach
            
        </section>
@endsection