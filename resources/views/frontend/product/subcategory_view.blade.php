
@extends('frontend.main_master')
@section('content')
@section('title')
Subcategory Product Kulinerkita
@endsection

<div class="breadcrumb">
    <div class="container">
      <div class="breadcrumb-inner">
        <ul class="list-inline list-unstyled">
          <li><a href="#">Home</a></li>
  
          @foreach($breadsubcat as $item)
            <li class='active'>{{ $item->subcategory_name_en }}</li>
          @endforeach
        </ul>
      </div>
      <!-- /.breadcrumb-inner --> 
    </div>
    <!-- /.container --> 
  </div>
  <!-- /.breadcrumb -->
  <div class="body-content outer-top-xs">
    <div class='container'>
      <div class='row'>
        <div class='col-md-3 sidebar'> 
          <!-- ================================== TOP NAVIGATION ================================== -->
          @include('frontend.common.vertical_menu')
          <!-- /.side-menu --> 
          <!-- ================================== TOP NAVIGATION : END ================================== -->
          <div class="sidebar-module-container">
            <div class="sidebar-filter"> 
              
        
              <!-- ============================================== PRODUCT TAGS ============================================== -->
              @include('frontend.common.product_tags')
             
							  <!-- ============================================== PRODUCT TAGS: END ============================================== -->
            <!----------- Testimonials------------->
							@include('frontend.common.testimonials')
              
              <!-- ============================================== Testimonials: END ============================================== -->
              
            </div>
            <!-- /.sidebar-filter --> 
          </div>
          <!-- /.sidebar-module-container --> 
        </div>
        <!-- /.sidebar -->
        <div class='col-md-9'> 
          <!-- ========================================== SECTION – HERO ========================================= -->
         
          
          <h4><b>Total Search </b><span class="badge badge-danger" style="background: #FF0000;"> {{ count($products) }} </span> Items  </h4>
          <div class="clearfix filters-container m-t-10">
            <div class="row">
              <div class="col col-sm-6 col-md-2">
                <div class="filter-tabs">
                  <ul id="filter-tabs" class="nav nav-tabs nav-tab-box nav-tab-fa-icon">
                    <li class="active"> <a data-toggle="tab" href="#grid-container"><i class="icon fa fa-th-large"></i>Grid</a> </li>
                    <li><a data-toggle="tab" href="#list-container"><i class="icon fa fa-th-list"></i>List</a></li>
                  </ul>
                </div>
                <!-- /.filter-tabs --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-12 col-md-6">
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Sort by</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> Position <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">position</a></li>
                          <li role="presentation"><a href="#">Price:Lowest first</a></li>
                          <li role="presentation"><a href="#">Price:HIghest first</a></li>
                          <li role="presentation"><a href="#">Product Name:A to Z</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col -->
                <div class="col col-sm-3 col-md-6 no-padding">
                  <div class="lbl-cnt"> <span class="lbl">Show</span>
                    <div class="fld inline">
                      <div class="dropdown dropdown-small dropdown-med dropdown-white inline">
                        <button data-toggle="dropdown" type="button" class="btn dropdown-toggle"> 1 <span class="caret"></span> </button>
                        <ul role="menu" class="dropdown-menu">
                          <li role="presentation"><a href="#">1</a></li>
                          <li role="presentation"><a href="#">2</a></li>
                          <li role="presentation"><a href="#">3</a></li>
                          <li role="presentation"><a href="#">4</a></li>
                          <li role="presentation"><a href="#">5</a></li>
                          <li role="presentation"><a href="#">6</a></li>
                          <li role="presentation"><a href="#">7</a></li>
                          <li role="presentation"><a href="#">8</a></li>
                          <li role="presentation"><a href="#">9</a></li>
                          <li role="presentation"><a href="#">10</a></li>
                        </ul>
                      </div>
                    </div>
                    <!-- /.fld --> 
                  </div>
                  <!-- /.lbl-cnt --> 
                </div>
                <!-- /.col --> 
              </div>
              <!-- /.col -->
              <div class="col col-sm-6 col-md-4 text-right">
                
                <!-- /.pagination-container --> </div>
              <!-- /.col --> 
            </div>
            <!-- /.row --> 
          </div>

          <div class="search-result-container ">
            <div id="myTabContent" class="tab-content category-list">

							<!-- ========================================== Start Grid view========================================= -->
              <div class="tab-pane active " id="grid-container">
                <div class="category-product">
                  <div class="row">
										@foreach($products as $product)
											<div class="col-sm-6 col-md-4 wow fadeInUp">
												<div class="products">
													<div class="product">
														<div class="product-image">
															<div class="image"> <a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
																<img  src="{{asset($product->product_thumbnail)}}" alt=""></a>
															</div>
															<!-- /.image -->
															@php
															$amount = $product->selling_price - $product->discount_price;
															$discount = ($amount/$product->selling_price) * 100;
															@endphp   
															<div>
																@if ($product->discount_price == NULL)
																	<div class="tag new"><span>new</span></div>
																@else
																	<div class="tag hot"><span>{{ round($discount) }}%</span></div>
																@endif
															</div>
														</div>
														<!-- /.product-image -->
														
														<div class="product-info text-left">
															<h3 class="name"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
																@if(session()->get('language') == 'indo') 
																	{{$product->product_name_id}} 
																@else 
																	{{$product->product_name_en}} 
																@endif
																</a>
															</h3>
															<div class="rating rateit-small"></div>
															<div class="description"></div>
															@if ($product->discount_price == NULL)
																<div class="product-price"> <span class="price"> Rp{{number_format($product ->selling_price, 2 )}}</span>  </div>
															@else
																<div class="product-price"> <span class="price"> Rp{{number_format($product ->discount_price, 2 )}} </span> <span class="price-before-discount">Rp {{number_format($product ->selling_price, 2 )}}</span> </div>
															@endif
															<!-- /.product-price --> 
															
														</div>
														<!-- /.product-info -->
														<div class="cart clearfix animate-effect">
															<div class="action">
																<ul class="list-unstyled">
																	<li class="add-cart-button btn-group">
                                    <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> </button>
                                    <button class="btn btn-primary cart-btn" type="button">Add to cart</button>
																	</li>
																</ul>
															</div>
															<!-- /.action --> 
														</div>
														<!-- /.cart --> 
													</div>
													<!-- /.product --> 
													
												</div>
												<!-- /.products --> 
											</div>
                    <!-- /.item -->
                    @endforeach
                  </div>
                  <!-- /.row --> 
                </div>
                <!-- /.category-product --> 
              </div>
							<!-- ========================================== End Grid view========================================= -->

							<!-- ========================================== Product List Start========================================= -->
              
              <div class="tab-pane "  id="list-container">
                <div class="category-product">
									@foreach($products as $product)
									
                  <div class="category-product-inner wow fadeInUp">
                    <div class="products">
                      <div class="product-list product">
                        <div class="row product-list-row">
                          <div class="col col-sm-4 col-lg-4">
                            <div class="product-image">
                              <div class="image"><a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}"><img  src="{{asset($product->product_thumbnail)}}" alt=""></a>  </div>
                            </div>
                            <!-- /.product-image --> 
                          </div>
                          <!-- /.col -->
                          <div class="col col-sm-8 col-lg-8">
                            <div class="product-info">
															<h3 class="name">
																<a href="{{ url('product/details/'.$product->id.'/'.$product->product_slug_en ) }}">
																@if(session()->get('language') == 'indo') 
																	{{$product->product_name_id}} 
																@else
																 	{{$product->product_name_en}} 
																@endif
															</a></h3>
                              <div class="rating rateit-small"></div>
															@if ($product->discount_price == NULL)
																<div class="product-price"> <span class="price"> Rp{{number_format($product ->selling_price, 2 )}}</span>  </div>
															@else
																<div class="product-price"> <span class="price"> Rp{{number_format($product ->discount_price, 2 )}} </span> <span class="price-before-discount">Rp {{number_format($product ->selling_price, 2 )}}</span> </div>
															@endif
                              <!-- /.product-price -->
                              <div class="description m-t-10">
																@if(session()->get('language') == 'indo') 
																	{{$product->short_descp_id}} 
																@else 
																	{{$product->short_descp_en}}
															 	@endif
															</div>
                              <div class="cart clearfix animate-effect">
                                <div class="action">
                                  <ul class="list-unstyled">
                                    <li class="add-cart-button btn-group">
                                      <button  class="btn btn-primary icon" type="button" title="Add Cart" data-toggle="modal" data-target="#exampleModal" id="{{ $product->id }}" onclick="productView(this.id)"> <i class="fa fa-shopping-cart"></i> Add to Cart</button>
                                    </li>
                                  </ul>
                                </div>
                                <!-- /.action --> 
                              </div>
                              <!-- /.cart --> 
                              
                            </div>
                            <!-- /.product-info --> 
                          </div>
                          <!-- /.col --> 
                        </div>
                        <!-- /.product-list-row -->
												@php
													$amount = $product->selling_price - $product->discount_price;
													$discount = ($amount/$product->selling_price) * 100;
												@endphp  
                        <div>
													@if ($product->discount_price == NULL)
														<div class="tag new"><span>new</span></div>
													@else
														<div class="tag hot"><span>{{ round($discount) }}%</span></div>
													@endif
												</div>
                      </div>
                      <!-- /.product-list --> 
                    </div>
                    <!-- /.products --> 
                  </div>
									@endforeach
                  <!-- /.category-product-inner -->
                  
                </div>
                <!-- /.category-product --> 
              </div>
              	<!-- ========================================== Product List END========================================= -->
            </div>


            <!-- /.tab-content -->
            <div class="clearfix filters-container">
              <div class="text-right">
                <div class="pagination-container">
                  <ul class="list-inline list-unstyled">
										{{ $products->links()  }}
                  </ul>
                  <!-- /.list-inline --> 
                </div>
                <!-- /.pagination-container --> </div>
              <!-- /.text-right --> 
              
            </div>
            <!-- /.filters-container --> 
            
          </div>
          <!-- /.search-result-container --> 
          
        </div>
        <!-- /.col --> 
      </div>
      <!-- /.row --> 
      <!-- ============================================== BRANDS CAROUSEL ============================================== -->
      
      <!-- /.logo-slider --> 
      <!-- ============================================== BRANDS CAROUSEL : END ============================================== --> </div>
    <!-- /.container --> 
    
  </div>
  <!-- /.body-content --> 


@endsection