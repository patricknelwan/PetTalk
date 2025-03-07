<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">

        <!-- !!! THE LINE BELOW IS REQUIRED SO YOU CAN USE BOOTSTRAP !!! -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
        <!-- !!! THE LINE ABOVE IS REQUIRED SO YOU CAN USE BOOTSTRAP !!! -->
        <title>PetTalk</title>
        <link rel="icon" href="{{'images/logo.jpg'}}" />
        <!-- ./assets/images/logo.jpg -->
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css"
        />
        <link
        href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css"
        rel="stylesheet"
        />
        <link
        rel="stylesheet"
        href="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.css"
        />
        <link
        href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
        rel="stylesheet"
        />
        <link rel="stylesheet" href="https://unpkg.com/aos@next/dist/aos.css" />
        <link rel="stylesheet" href="{{'../../css/style.css'}}" />
        <link rel="stylesheet" href="{{ asset('css/sweetalert2.min.css') }}">
       
    </head>
    <body>
      <script src="{{ asset('js/sweetalert2.all.min.js') }}"></script>
      @include('layout.nav')
      @include('sweetalert::alert')
        <section id="hero_B" class="min-vh-100 d-flex align-items-center justify-content-center text-center">
 <div class="container bg-white p-5 rounded shadow-lg" data-aos="fade-up" data-aos-duration="1000">
    <h1 class="mb-4 fw-bold text-center" data-aos="fade-down">
        Welcome to <span class="text-highlight gradient-text">PetTalk</span>
    </h1>
    <p class="mb-5 text-muted text-center" data-aos="fade-up" data-aos-delay="200">
        Explore blogs, connect in forums, and adopt your favorite pets!
    </p>
    
    <div class="row justify-content-center gy-4">
        @auth
            @if(auth()->user()->role === 'admin')
                <!-- Show Contact -->
                <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="100">
                    <div class="card2 border-0 text-center mx-auto p-4 shadow-hover glass-effect">
                        <a href="{{ route('show-contacts') }}" class="d-flex flex-column align-items-center text-decoration-none text-dark">
                            <div class="icon-wrapper">
                                <i class="bx bxs-contact display-4 icon-highlight pulse-animation"></i>
                            </div>
                            <span class="mt-3 fw-semibold">Show Contact</span>
                        </a>
                    </div>
                </div>

                <!-- Blogs Admin -->
                <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="200">
                    <div class="card2 border-0 text-center mx-auto p-4 shadow-hover glass-effect">
                        <a href="{{ route('crud-blog') }}" class="d-flex flex-column align-items-center text-decoration-none text-dark">
                            <div class="icon-wrapper">
                                <i class="bx bxs-cat display-4 icon-highlight bounce-animation"></i>
                            </div>
                            <span class="mt-3 fw-semibold">Blogs Pet</span>
                        </a>
                    </div>
                </div>
            @endif

            @if(auth()->user()->role === 'customer')
                <!-- Blogs Customer -->
                <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="300">
                    <div class="card2 border-0 text-center mx-auto p-4 shadow-hover glass-effect">
                        <a href="/blogs" class="d-flex flex-column align-items-center text-decoration-none text-dark">
                            <div class="icon-wrapper">
                                <i class="bx bxs-cat display-4 icon-highlight bounce-animation"></i>
                            </div>
                            <span class="mt-3 fw-semibold">Blogs Pet</span>
                        </a>
                    </div>
                </div>
            @endif
        @endauth

        <!-- Forum -->
        <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="400">
            <div class="card2 border-0 text-center mx-auto p-4 shadow-hover glass-effect">
                <a href="/forums" class="d-flex flex-column align-items-center text-decoration-none text-dark">
                    <div class="icon-wrapper">
                        <i class="bx bxs-message-dots display-4 icon-highlight float-animation"></i>
                    </div>
                    <span class="mt-3 fw-semibold">Forum Chat</span>
                </a>
            </div>
        </div>

        <!-- Animal Adoption -->
        <div class="col-6 col-md-3" data-aos="zoom-in" data-aos-delay="500">
            <div class="card2 border-0 text-center mx-auto p-4 shadow-hover glass-effect">
                <a href="/adopsi" class="d-flex flex-column align-items-center text-decoration-none text-dark">
                    <div class="icon-wrapper">
                        <i class="bx bxs-heart display-4 icon-highlight beat-animation"></i>
                    </div>
                    <span class="mt-3 fw-semibold">Adopt Animal</span>
                </a>
            </div>
        </div>
    </div>
</div>
</section>

<style>
  span{
    color: #df5399
  }
  .text-highlight {
    color: #df5399;
  }
  
  .icon-highlight {
    color: #df5399;
    transition: transform 0.3s ease-in-out, color 0.3s ease-in-out;
  }

  .hover-effect:hover .icon-highlight {
    transform: scale(1.2);
    color: #ffffff; 
  }
  .hover-effect {
    transition: transform 0.3s ease-in-out, box-shadow 0.3s ease-in-out;
  }

  .hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0px 8px 20px rgba(0, 0, 0, 0.2);
    background-color: #720455; 
    color: white;
  }

  .card2 {
    border-radius: 15px; 
    overflow: hidden;
    background-color: #f8f9fa; 
    transition: background-color 0.3s ease-in-out;
  }

  .card2:hover {
    background-color: #48002b; 
    color: whitel
  }
</style>

        @yield('content')
        <!-- footer -->
        @include('layout.footer')
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
        <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
        <script src="{{'../../../js/main.js'}}"></script>
    </body>
</html>
