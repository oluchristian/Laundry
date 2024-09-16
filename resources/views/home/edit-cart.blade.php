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
                    @if ($errors->any())
                    
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                      </div>
                  @endif

                  @error('quantity')
                      <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                      </span>
                  @enderror

                      @if (session()->has('message'))
                      <div class="alert alert-success col-md-6 col-xl-6 offset-3 my-4">
                          {{ session('message') }}
                      </div>
                      @endif
                      
                    <h3 class="fw-normal mb-0 text-black">Shopping Cart</h3>
                  </div>

                  <form action="{{ route('user.update.cart', $oneCartItem->id) }}" method="POST">
                    @csrf
                    @method('PATCH')
                  <div class="card rounded-3 mb-4">
                    <div class="card-body p-4">
                      <div class="row d-flex justify-content-between align-items-center">
                        <div class="col-md-2 col-lg-2 col-xl-2">
                          <img
                            src="{{ $oneCartItem->service_imagepath }}"
                            class="img-fluid rounded-3" alt="Cotton T-shirt">
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-3">
                          <p class="lead fw-normal mb-2">{{ $oneCartItem->service_title }}</p>
                          <p><span class="text-muted">Size: </span>M <span class="text-muted">Color: </span>Grey</p>
                        </div>
                        <div class="col-md-3 col-lg-3 col-xl-2 d-flex">
                                <div class="form-floating mb-3">
                                    <input type="number" class="form-control" id="floatingPassword"
                                        value="{{ $oneCartItem->service_quantity }}" name="quantity">
                                    
                                </div>
                                
                            </div>
                            <div class="col-md-3 col-lg-2 col-xl-2 offset-lg-1">
                                <h5 class="mb-0">{{ $oneCartItem->actual_price }}</h5>
                            </div>
                            
                            <input type="submit" value="Save" class="btn btn-primary">
                            
                        </div>
                    </div>
                </div>
            </form>
          
                  
          
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