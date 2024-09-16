<section class="offer-services pb-bottom2">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-7 col-lg-8">
                <div class="section-tittle text-center mb-55">
                    <span class="element">Services</span>
                    <h2>Services we offer</h2>
                </div>
            </div>
        </div>
        <div class="row no-gutters">

            {{-- Second Image Column --}}

            <div class="col-lg-6 col-md-6">
                <div class="single-offers">
                    <img src="home/assets/img/gallery/offers1.png" alt="" class=" w-100">
                </div>
            </div>

            {{-- Place Order --}}

            <div class="col-lg-6 col-md-6">
                <div class="single-offers">
                    <img src="home/assets/img/gallery/offers2.png" alt="" class=" w-100">
                    <div class="offers-caption text-center">
                        <div class="cat-icon">
                            <img src="home/assets/img/icon/offers-icon1.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Cloth laundry</a></h5>
                            <p>The automated process starts as soon as your clothes go into the machine. The outcome is gleaming clothes!!</p>

                            <form action="{{ route('user.add.cart', ['id' => '2fc5ee4f-5118-47eb-89d8-89994c4448da']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity"></label>
                                    <input type="number" min="1" class="form-control form-control-lg cart-btn-m" name="quantity" placeholder="Quantity">
                                </div>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>

                        
                    </div>
                </div>
            </div>

            {{-- Second Image Column --}}
            
            <div class="col-lg-6 col-md-6">
                <div class="single-offers">
                    <img src="home/assets/img/gallery/offers1.png" alt="" class=" w-100">
                </div>
            </div>

            {{-- Place Order --}}

            <div class="col-lg-6 col-md-6">
                <div class="single-offers">
                    <img src="home/assets/img/gallery/offers2.png" alt="" class=" w-100">
                    <div class="offers-caption text-center">
                        <div class="cat-icon">
                            <img src="home/assets/img/icon/offers-icon1.png" alt="">
                        </div>
                        <div class="cat-cap">
                            <h5><a href="services.html">Cloth Ironing</a></h5>
                            <p>The automated process starts as soon as your clothes go into the machine. The outcome is gleaming clothes!!</p>

                            <form action="{{ route('user.add.cart', ['id' => '61513c30-58f6-4c79-b688-d312653b6f70']) }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="quantity"></label>
                                    <input type="number" min="1" class="form-control form-control-lg cart-btn-m" name="quantity" placeholder="Quantity">
                                </div>
                                <button type="submit" class="btn btn-primary">Add to Cart</button>
                            </form>
                        </div>

                        
                    </div>
                </div>
            </div>

            </div>
        </div>
    </div>
</section>


{{-- <div class="col-lg-6 col-md-6">
    <div class="single-offers">
        <img src="home/assets/img/gallery/offers2.png" alt="" class=" w-100">
        <div class="offers-caption text-center">
            <div class="cat-icon">
                <img src="home/assets/img/icon/offers-icon1.png" alt="">
            </div>
            <div class="cat-cap">
                <h5><a href="services.html">Cloth ironing</a></h5>
                <p>The automated process starts as soon as your clothes go into the machine. The outcome is gleaming clothes!!</p>
            </div>
        </div>
    </div>
</div>
<div class="col-lg-6 col-md-6">
    <div class="single-offers">
        <img src="home/assets/img/gallery/offers4.png" alt="" class=" w-100">

        <div class="offers-caption text-center">
            
            <div class="cat-cap">

                <form action="">
                    <div class="form-group">
                        <label for="quantity"></label>
                        <input type="number" min="1" class="form-control form-control-lg cart-btn-m" name="quantity" placeholder="Quantity">
                    </div>
                    <button type="submit" class="btn btn-primary">Add to Cart</button>
                </form>
            </div>

            
        </div>

    </div> --}}