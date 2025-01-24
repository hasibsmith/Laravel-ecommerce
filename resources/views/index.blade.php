@include('backup.topbar')
@include('backup.navbar')
@include('backup.Carousel')
@include('backup.Categories')
@include('backup.Featured')
@include('backup.Products')
@include('backup.Products_2')




    <!-- Vendor Start -->
    <div class="container-fluid py-5">
        <div class="row px-xl-5">
            <div class="col">
                <div class="owl-carousel vendor-carousel">
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-1.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-2.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-3.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-4.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-6.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-7.jpg')}}" alt="">
                    </div>
                    <div class="bg-light p-4">
                        <img src="{{asset('assets/img/vendor-8.jpg')}}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor End -->
    @include('backup.Footer')


  