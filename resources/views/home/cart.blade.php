<!doctype html>
<html class="no-js" lang="zxx">
@include('home.head')
<body>
    <!-- ? Preloader Start -->
   
    <!-- Preloader Start -->
    
        <!-- Header Start -->
        @include('home.header')
        <!-- Header End -->
    
    <main>
       

        <section class="h-100" style="background-color: #eee;">
            <div class="container h-100 py-5">
              <div class="row d-flex justify-content-center align-items-center h-100">
                <div class="col-10">
          
                  <div class="d-flex justify-content-between align-items-center mb-4">
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                  </div>
                  
                  @include('home.errors-session-message')

                  @forelse (
                   $cart as $cart)
                  <div class="card rounded-3 mb-4" onclick="window.location='{{ route('user.view.services', $cart->service_id) }}';">
                    <div class="card-body p-4">
                      <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img
                            src="{{ $cart->service_imagepath }}"
                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <p class="lead fw-normal mb-2">{{ $cart->service_title }}</p>
                          <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                         
                            <div class="form-floating">
                                    <p class=""> <span>Quantity:</span> {{ $cart->service_quantity }}</p>
                            </div>

                        </div>
                        <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                          <h5 class="mb-0">{{ $cart->actual_price }}</h5>
                        </div>
                        <div class="col-md-1 col-lg-1 col-xl-1 text-end">
                          {{-- <form action="{{ route('user.edit.cart', $cart->id) }}" method="POST">
                            @csrf
                            <input type="submit" > --}}
                            <a href="{{ route('user.view.edit.cart', $cart->id) }}" class="text-primary"><i class="fas fa-edit fa-lg"></i></a>
                          
                          <a onclick="return confirm('Are you sure?')" href="{{ route('user.destroy.cart', $cart->id) }}" class="text-danger"><i class="fas fa-trash fa-lg"></i></a>
                        </div>
                      </div>
                    </div>
                  </div>
                

                  {{-- Customer Delivery Details --}}

                  @if ($loop->last)
                  <div class="card mb-4">
                    <div class="card-body d-flex flex-row">
                      <div class="d-flex flex-column">
                        <p class="card-text">Address: {{ $cart->user_address }}<br>Email: {{ $cart->user_email }}<br>Phone Number: {{ $cart->user_phone }}</p>
                        <div class="d-flex flex-row">
                            <a href="{{ route('user.edit.address', $cart->user_id) }}" class="btn btn-primary">Edit Details</a>
                          </div>
                      </div>
                    </div>
                  </div>

                  {{-- Submit button --}}
                  <div class="card">
                    <div class="card-body">
                      <button type="button" class="btn btn-warning btn-block btn-lg">Proceed to Pay {{ $totalPrice }}</button>
                    </div>
                  </div>
                @endif
                  @empty
                  <div class="text-center">
                      <h1>Your cart is empty. Before proceed to checkout you must add some products to your shopping cart.</h1>
                  </div>
              @endforelse
                  
                  
                  
          
                </div>
              </div>
            </div>
          </section>

        
       
       
    </main>
   @include('home.footer')
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

@include('home.js')

</body>
</html>