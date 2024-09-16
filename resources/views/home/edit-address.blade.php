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
                    <h3 class="fw-normal mb-0 text-black">Your delivery details</h3>
                  </div>
                {{-- Start alert and session message partials --}}
                  @include('home.errors-session-message')
                  {{-- End alert and session message partials --}}
                  

                  {{-- Customer Delivery Details --}}
                  <form action="{{ route('user.update.address', $cart->user_id) }}" method="post">
                    @csrf
                    @method('PATCH')
                    <div class="card mb-4">
                        <div class="card-body d-flex flex-row">
                          <div class="d-flex flex-column">
                            <p class="card-text">
                                Address:  <input type="text" class="form-control" 
                                value="{{ $cart->user_address }}" name="address">
                                <br>Email:  <input type="email" class="form-control" 
                                value="{{ $cart->user_email }}" name="email">
                                <br>Phone Number:  <input type="number" class="form-control"
                                value="{{ $cart->user_phone }}" name="phone">
                            </p>
                            
                          </div>
                        </div>
                      </div>
    
                      {{-- Submit button --}}
                      <div class="card">
                        <div class="card-body">
                          <input type="submit" value="Submit" class="btn btn-primary">
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