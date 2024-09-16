<!doctype html>
<html class="no-js" lang="zxx">
@include('home.head')
<body>
    <!-- ? Preloader Start -->
   @include('home.preloader')
    <!-- Preloader Start -->
    
        <!-- Header Start -->
        @include('home.header')
        <!-- Header End -->
    
    <main>
        
        
        <section style="background-color: #eee;">
            <div class="container py-5">

                {{-- alert message --}}
                    @if (session()->has('message'))
            <div class="col-sm-12 col-xl-6 offset-3 py-5">
                <div class="alert alert-primary">
                    {{ session('message') }}
                    
                </div>
            </div>
            @endif
            {{-- end alert message --}}
            @forelse ($services as $service)
              <div class="row justify-content-center mb-3">
                <div class="col-md-12 col-xl-10">
                  <div class="card shadow-0 border rounded-3">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12 col-lg-3 col-xl-3 mb-4 mb-lg-0">
                          <div class="bg-image hover-zoom ripple rounded ripple-surface">
                            <img src="{{ $service->image_filename }}"
                              class="w-100" />
                            <a href="#!">
                              <div class="hover-overlay">
                                <div class="mask" style="background-color: rgba(253, 253, 253, 0.15);"></div>
                              </div>
                            </a>
                          </div>
                        </div>
                        <div class="col-md-6 col-lg-6 col-xl-6">
                          <h5>{{ $service->title }}</h5>
                          <div class="d-flex flex-row">
                            <div class="text-danger mb-1 me-2">
                             
                            </div>
                            <span>310</span>
                          </div>
                          <div class="mt-1 mb-0 text-muted small">
                            <span>100% cotton</span>
                            <span class="text-primary"> • </span>
                            <span>Light weight</span>
                            <span class="text-primary"> • </span>
                            <span>Best finish<br /></span>
                          </div>
                          <div class="mb-2 text-muted small">
                            <span>Unique design</span>
                            <span class="text-primary"> • </span>
                            <span>For men</span>
                            <span class="text-primary"> • </span>
                            <span>Casual<br /></span>
                          </div>
                          <p class=" mb-4 mb-md-0">
                            {{ $service->description }}
                          </p>
                        </div>
                        <div class="col-md-6 col-lg-3 col-xl-3 border-sm-start-none border-start">
                          <div class="d-flex flex-row align-items-center mb-1">
                            <h4 class="mb-1 me-1">₦{{ $service->price }}</h4>
                            <span class="text-danger"><s>$20.99</s></span>
                          </div>
                          <h6 class="text-success">Free shipping</h6>
                          <div class="text-center">
                            <form action="{{ route('user.add.cart', $service->id) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity"></label>
                                    <input type="number" min="1" class="form-control form-control-lg cart-btn-m" name="quantity" placeholder="Quantity">
                                </div>
                                <input type="submit" value="Add to Cart" class="btn btn-outline-primary btn-sm mt-2">
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                @empty
                <h1>Our services are currently down. We are working hard to restore it...</h1>
            @endforelse
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