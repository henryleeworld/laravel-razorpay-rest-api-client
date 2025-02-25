<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1" />
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}" />
        <title>{{ config('app.name') }}</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.3.3/css/bootstrap.min.css" integrity="sha512-jnSuA4Ss2PkkikSOLtYs8BlYIeeIK1h99ty4YfvRPAlzr377vr3CXDb7sb7eEEBYjDtcYj+AjBH3FLv5uSJuXg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    </head>
    <body>
        <div id="app">
            <main class="py-4">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6 offset-3 col-md-offset-6">
                            @if($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible fade in" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ __('Error!') }}</strong> {{ $message }}
                            </div>
                            @endif
                            @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade {{ Session::has('success') ? 'show' : 'in' }}" role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                </button>
                                <strong>{{ __('Success!') }}</strong> {{ $message }}
                            </div>
                            @endif

                            <div class="card card-default">
                                <div class="card-header">
                                    {{ config('app.name') }}
                                </div>

                                <div class="card-body text-center">
                                    <form action="{{ route('razorpay.payment.store') }}" method="POST">
                                        @csrf
                                        <script
                                            src="https://checkout.razorpay.com/v1/checkout.js"
                                            data-key="{{ env('RAZORPAY_KEY') }}"
                                            data-amount=1500
                                            data-buttontext="{{ __('list price: US$:list_price', ['list_price' => 15]) }}"
                                            data-name="{{ config('app.name') }}"
                                            data-currency="USD"
                                            data-description="Rozerpay"
                                            data-image="{{ url('images/kamen-rider-black.jpg') }}"
                                            data-prefill.email="{{ __('Email') }}"
                                            data-theme.color="#00D861"
                                        ></script>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer" defer></script>
    </body>
</html>