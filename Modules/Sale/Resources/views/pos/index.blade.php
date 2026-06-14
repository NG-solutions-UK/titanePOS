@extends('layouts.app')

@section('title', 'POS')

@section('third_party_stylesheets')

@endsection

@section('breadcrumb')
    <ol class="breadcrumb border-0 m-0">
        <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        <li class="breadcrumb-item active">POS</li>
    </ol>
@endsection

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                @include('utils.alerts')
            </div>
			<div class="col-12">

				<ul class="nav nav-tabs" id="posTabs" role="tablist">

					<li class="nav-item">
						<a class="nav-link active"
						   id="products-tab"
						   data-toggle="tab"
						   href="#products"
						   role="tab">
							Products
						</a>
					</li>

					<li class="nav-item">
						<a class="nav-link"
						   id="payment-tab"
						   data-toggle="tab"
						   href="#payment"
						   role="tab">
							Payment
						</a>
					</li>
				</ul>

				<div class="tab-content border-left border-right border-bottom p-3">
					<!-- Products Tab -->
					<div class="tab-pane fade show active"
						 id="products"
						 role="tabpanel">

						<livewire:search-product />
						<div class="card mb-3">
							<div class="card-body">
								<button class="btn btn-primary bi bi-check"
										onclick="Livewire.dispatch('selectedCategory', [''])">
									All
								</button>
								@foreach($product_categories as $category)
									<button class="btn btn-outline-primary btn-lg m-2"
											onclick="Livewire.dispatch('selectedCategory', [{{ $category->id }}])">
										{{ $category->category_name }}
									</button>
								@endforeach
							</div>
						</div>

						<livewire:pos.product-list
							:categories="$product_categories" />
					</div>
					
					<!-- Payment Tab -->
					<div class="tab-pane fade"
						 id="payment"
						 role="tabpanel">

						<livewire:pos.checkout
							:cart-instance="'sale'"
							:customers="$customers" />
					</div>
				</div>
			</div>
        </div>
    </div>
@endsection


@push('page_scripts')

    @if(session('pdfUrl'))
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            var pdfUrl = @json(session('pdfUrl'));
            if (pdfUrl) {
                var iframe = document.createElement('iframe');
                iframe.style.display = 'none';
                iframe.src = pdfUrl;
                iframe.onload = function() {
                    iframe.contentWindow.print();
                };
                document.body.appendChild(iframe);
            }
        });
    </script>
    @endif

    <script src="{{ asset('js/jquery-mask-money.js') }}"></script>
    <script>
        $(document).ready(function () {
            window.addEventListener('showCheckoutModal', event => {
                $('#checkoutModal').modal('show');

                $('#paid_amount').maskMoney({
                    prefix:'{{ settings()->currency->symbol }}',
                    thousands:'{{ settings()->currency->thousand_separator }}',
                    decimal:'{{ settings()->currency->decimal_separator }}',
                    allowZero: false,
                });

                $('#total_amount').maskMoney({
                    prefix:'{{ settings()->currency->symbol }}',
                    thousands:'{{ settings()->currency->thousand_separator }}',
                    decimal:'{{ settings()->currency->decimal_separator }}',
                    allowZero: true,
                });

                $('#paid_amount').maskMoney('mask');
                $('#total_amount').maskMoney('mask');

                $('#checkout-form').submit(function () {
                    var paid_amount = $('#paid_amount').maskMoney('unmasked')[0];
                    $('#paid_amount').val(paid_amount);
                    var total_amount = $('#total_amount').maskMoney('unmasked')[0];
                    $('#total_amount').val(total_amount);
                });
            });
        });
    </script>
	
	

@endpush

<style>
#posTabs .nav-link {
    font-size: 18px;
    font-weight: 600;
    padding: 15px 30px;
}

.tab-content {
    min-height: 600px;
}
</style>