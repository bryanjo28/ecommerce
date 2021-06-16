@extends('frontend.main_master')
@section('content')

@section('title')
My Cart Page 
@endsection


<div class="breadcrumb">
	<div class="container">
		<div class="breadcrumb-inner">
			<ul class="list-inline list-unstyled">
				<li><a href="home.html">Home</a></li>
				<li class='active'>MyCart</li>
			</ul>
		</div><!-- /.breadcrumb-inner -->
	</div><!-- /.container -->
</div><!-- /.breadcrumb -->

<div class="body-content">
	<div class="container">
		<div class="row">
			<div class="shopping-cart">
				<div class="shopping-cart-table">
					<div class="table-responsive">
						<table class="table">
							<thead>
								<tr>
									<th class="cart-romove item">Image</th>
									<th class="cart-description item">Name</th>
									<th class="cart-qty item">Quantity</th>
									<th class="cart-sub-total item">Subtotal</th>
									<th class="cart-total last-item">Remove</th>
								</tr>
							</thead>
							<tbody id="cartPage">
			
							</tbody>
						</table>
					</div>
				</div>
				<div class="col-md-4"></div>
				<div class="col-md-4"></div>
				<div class="col-md-4 col-sm-12 cart-shopping-total">
					<table class="table">
						<thead>
							<tr>
								<th>
									<div class="cart-sub-total">
										Subtotal<span class="inner-left-md">$600.00</span>
									</div>
									<div class="cart-grand-total">
										Grand Total<span class="inner-left-md">$600.00</span>
									</div>
								</th>
							</tr>
						</thead><!-- /thead -->
						<tbody>
								<tr>
									<td>
										<div class="cart-checkout-btn pull-right">
											<button type="submit" class="btn btn-primary checkout-btn">PROCCED TO CHEKOUT</button>
										</div>
									</td>
								</tr>
						</tbody><!-- /tbody -->
					</table><!-- /table -->
				</div>
			</div>
		</div><!-- /.row -->
	</div>
				
</div><!-- /.row -->



		<br>
		@include('frontend.body.brands')
	</div>
</div>







@endsection