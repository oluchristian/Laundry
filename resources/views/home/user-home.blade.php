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
        <!--? slider Area Start-->
        @include('home.slider')
        <!-- slider Area End-->
        <!--? Services Area Start -->
        @include('home.services')
        <!-- Services End -->
        <!--? Offer-services Start  -->
        @include('home.errors-session-message')
        @include('home.offer-services')
        <!-- Offer-services End  -->

        <div class="text-center my-2">
            <a href="{{ route('user.view.services') }}" class="btn btn-outline-primary">View more Services</a>
        </div>

        <!--? Want To work -->
        @include('home.call')
        <!-- Want To work End -->
        <!-- Testimonials_start -->
        @include('home.testimonials')
        <!-- Testimonials_end -->
        <!--? Company achievement Start -->
        @include('home.achievment')
        <!-- Company achievement End -->
        <!--? About Area  -->
       @include('home.about')
        <!-- About Area End -->
        <!--?  Map Area start  -->
       
        <!-- Map Area End -->
    </main>
   @include('home.footer')
<!-- Scroll Up -->
<div id="back-top" >
    <a title="Go to Top" href="#"> <i class="fas fa-level-up-alt"></i></a>
</div>

<!-- JS here -->

<script>

   document.addEventListener("DOMContentLoaded", function(event) { 
       var scrollpos = localStorage.getItem('scrollpos');
       if (scrollpos) window.scrollTo(0, scrollpos);
   });

   window.onbeforeunload = function(e) {
       localStorage.setItem('scrollpos', window.scrollY);
   };

</script>

@include('home.js')

</body>
</html>