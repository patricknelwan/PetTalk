<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
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
    <link rel="stylesheet" href="{{'css/style.css'}}" />
    <!-- ./assets/css/style.css -->
  </head>
  @include('sweetalert::alert')

  <body data-bs-spy="scroll" data-bs-target=".navbar">
    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg bg-white sticky-top shadow-lg">
      <div class="container">
        <a data-aos="fade-right" class="navbar-brand" href="#">
          <span><strong>Pet</strong></span
          >Talk
        </a>
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="collapse"
          data-bs-target="#navbarNav"
          aria-controls="navbarNav"
          aria-expanded="false"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          data-aos="fade-left"
          class="collapse navbar-collapse"
          id="navbarNav"
        >
          <ul class="navbar-nav ms-auto">
            <li class="nav-item">
              <a class="nav-link" href="#hero">Home </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#about">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#team">Team</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#contact">Contact</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#blog">Blog</a>
            </li>
          </ul>
          <a href="{{ route('signin') }}" class="btn btn-brand ms-lg-3">Sign in</a>
          <!-- SignIN.html -->
        </div>
      </div>
    </nav>

    <!-- HERO -->
    <section id="hero" class="min-vh-100 d-flex align-items-center text-center">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <h1
              data-aos="fade-left"
              class="text-uppercase text-white fw-semibold display-1"
            >
              Welcome to <span>PET</span>TALK
            </h1>
            <h5 class="text-white mt-3 mb-4 text" data-aos="fade-right">
              Caring for Your Pet is Easier than Ever and Get Professional
              Advice for Your Pet at Pettalk
            </h5>
            <div data-aos="fade-up" data-aos-delay="50">
              <a href="{{ route('signin') }}" class="btn btn-brand me-2">Sign in</a>
              <!-- SignIN.html -->
              <a href="{{ route('signup') }}" class="btn btn-light ms-2">sign Up</a>
              <!-- SignUp.html -->
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- ABOUT -->
   <!-- ABOUT -->
<section id="about" class="section-padding">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <!-- Image Column -->
            <div class="col-lg-6" data-aos="fade-right" data-aos-delay="100">
                <div class="about-image-wrapper">
                    <img src="{{'images/about2.jpg'}}" alt="About PetTalk" />
                    <div class="image-overlay"></div>
                </div>
            </div>

            <!-- Content Column -->
            <div class="col-lg-6" data-aos="fade-left" data-aos-delay="200">
                <div class="about-content">
                    <!-- Title -->
                    <h1 class="mb-4">
                        About 
                        <span class="highlight">PetTalk</span>
                    </h1>

                    <!-- Description -->
                    <p class="lead mb-5">
                        PetTalk adalah platform inovatif untuk pecinta hewan peliharaan. Kami menyediakan layanan konsultasi kesehatan hewan, informasi adopsi, dan forum komunitas untuk berbagi pengalaman.
                    </p>

                    <!-- Feature Boxes -->
                    <div class="feature-box mb-4" data-aos="zoom-in" data-aos-delay="300">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-circle">
                                <i class="ri-newspaper-fill"></i>
x
                            </div>
                            <!-- Text -->
                            <div>
                                <h5>Articles</h5>
                                <p>Memberikan informasi Mengenai Hewawn Peliharaan</p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-box mb-4" data-aos="zoom-in-up" data-aos-delay="400">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-circle">
                                <i class="ri-user-5-fill"></i>
                            </div>
                            <!-- Text -->
                            <div>
                                <h5>Adopsi</h5>
                                <p>Informasi hewan yang tersedia untuk diadopsi dari shelter atau pengguna lain.</p>
                            </div>
                        </div>
                    </div>

                    <div class="feature-box" data-aos="zoom-in-up" data-aos-delay="500">
                        <div class="d-flex align-items-center">
                            <!-- Icon -->
                            <div class="icon-circle">
                                <i class="ri-rocket-2-fill"></i>
                            </div>
                            <!-- Text -->
                            <div>
                                <h5>Forum Chat</h5>
                                <p>Wadah diskusi bagi pengguna untuk berbagi informasi dan pengalaman.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</section>
<style>
  /* General Section Styling */
.section-padding {
    padding: 80px 0;
}

.about-image-wrapper {
    position: relative;
    border-radius: 20px;
    overflow: hidden;
    box-shadow: 0 20px 40px rgba(114, 4, 85, 0.15);
}

.about-image-wrapper img {
    width: 100%;
    height: 550px;
    object-fit: cover;
    transform: scale(1);
    transition: transform 0.5s ease-in-out;
}

.about-image-wrapper img:hover {
    transform: scale(1.1);
}

.image-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: linear-gradient(45deg, rgba(114, 4, 85, 0.2), rgba(156, 16, 118, 0.2));
    pointer-events: none;
}

.about-content h1 {
    font-size: 2.8rem;
    font-weight: bold;
    color: #333;
}

.about-content .highlight {
    background: linear-gradient(90deg, #720455, #9c1076);
    -webkit-background-clip: text;
    -webkit-text-fill-color: transparent;
}

.about-content p.lead {
    color: #555;
    font-size: 1.15rem;
    line-height: 1.8;
    text-align: justify;
}

.feature-box {
    background: white;
    padding: 20px;
    border-radius: 15px;
    transition: all 0.3s ease-in-out;
    box-shadow: 0px 5px 10px rgba(0, 0, 0, 0.08);
}

.feature-box:hover {
    transform: translateY(-10px);
    box-shadow: 0px 10px 20px rgba(114, 4, 85, 0.2);
}

.icon-circle {
    width: 50px;
    height: 50px;
    min-width: 50px;
    border-radius: 50%;
    background-image: linear-gradient(135deg, #720455, #9c1076);
    display: flex;
    align-items: center;
    justify-content: center;
    margin-right: 20px;
}

.icon-circle i {
    color: white;
    font-size: 24px;
}

.feature-box h5 {
    color: #720455;
    margin-bottom: 5px;
}

.feature-box p {
    color: #666;
}
</style>
    <!-- TEAM -->
  <section id="team" class="section-padding border-top">
      <div class="container">
        <div class="row">
          <div
            class="col-12 text-center"
            data-aos="fade-down"
            data-aos-delay="150"
          >
            <div class="section-title">
              <h1 class="display-4 fw-semibold">Team <span>Members</span></h1>

              <p>
                Kami berkolaborasi untuk menciptakan solusi digital inovatif dan pengalaman terbaik untuk Anda.
              </p>
            </div>
          </div>
        </div>
        <div class="row justify-content-center text-center">
          <div data-aos="fade-up" 
     data-aos-delay="100" class="col-md-4 col-sm-6">
            
            <div class="team-box">
                <img class="member-img" src="{{'images/1.jpeg'}}">
                <div class="overlay-effect"></div>
                <div class="box-content">
                  <h3 class="member-name">Kenny Ryanta</h3>
                  <h5 class="member-name">2602146172</h5>  
                  <div class="social-links">
                    <span class="member-role">Web Developer</span>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                  </div>
                </div>
            </div>
      </div>
      <div class="col-md-4 col-sm-6"
      data-aos="fade-up" 
     data-aos-delay="200">
            <div class="team-box">
                <img class="member-img" src="{{'images/2.jpeg'}}">
                <div class="overlay-effect"></div>
                <div class="box-content">
                  <h3 class="member-name">Patrick Adrian</h3>
                  <h5 class="member-name">2602128176</h5>  
                  <div class="social-links">
                    <span class="member-role">Web Developer</span>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                  </div>
                </div>
            </div>
      </div>
      <div  data-aos="fade-up" 
     data-aos-delay="300" class="col-md-4 col-sm-6">
            <div class="team-box">
                <img class="member-img" src="{{'images/3.jpeg'}}">
                <div class="overlay-effect"></div>
                <div class="box-content">
                  <h3 class="member-name">Andika Rizky</h3>
                  <h5 class="member-name">2602109832</h5>  
                  <div class="social-links">
                    <span class="member-role">Web Developer</span>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                  </div>
                </div>
            </div>
      </div>
      <div  data-aos="fade-up" 
     data-aos-delay="400" class="col-md-4 col-sm-6">
            <div class="team-box">
                <img class="member-img" src="{{'images/4.jpeg'}}">
                <div class="overlay-effect"></div>
                <div class="box-content">
                  <h3 class="member-name">Christopher Parulian</h3>
                  <h5 class="member-name">2602231993</h5>  
                  <div class="social-links">
                    <span class="member-role">Web Developer</span>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                  </div>
                </div>
            </div>
      </div>
      <div  data-aos="fade-up" 
     data-aos-delay="500" class="col-md-4 col-sm-6">
            <div class="team-box">
                <img class="member-img" src="{{'images/5.jpeg'}}">
                <div class="overlay-effect"></div>
                <div class="box-content">
                  <h3 class="member-name">Owen Kartolo</h3>
                  <h5 class="member-name">2602140345</h5>  
                  <div class="social-links">
                    <span class="member-role">Web Developer</span>
                    <a href="#"><i class="bx bxl-facebook"></i></a>
                    <a href="#"><i class="bx bxl-twitter"></i></a>
                    <a href="#"><i class="bx bxl-linkedin"></i></a>
                  </div>
                </div>
            </div>
      </div>
        </div>
      </div>
  </section>

    <section id="contact" class="section-padding border-top">
      <div class="container">
        <div class="row">
          <div class="col-lg-12">

            <form action="{{ route('indext-create-contact') }}" class="p-lg-5 row g-3 bg-white text-dark opacity-75" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="text-center">
                <h1><span>Contact Us</span></h1>
                <p>
                  Jangan ragu untuk menghubungi kami dan kami akan segera menghubungi Anda kembali
                </p>
              </div>
              <div class="col-lg-6">
                <label for="first_name" class="form-label">First name</label>
                <input type="string" class="form-control" id="first_name" name="first_name" required/>
              </div>
              <div class="col-lg-6">
                <label for="last_name" class="form-label">Last name</label>
                <input type="string" class="form-control" id="last_name" name="last_name" required/>
              </div>
              <div class="col-12">
                <label for="email" class="form-label">Email address</label>
                <input type="email" class="form-control" id="email" name="email" required/>
              </div>
              <div class="col-12">
                <label for="message" class="form-label"
                  >Enter Message</label
                >
                <textarea
                  name="message"
                  class="form-control"
                  id="message"
                  rows="4"
                  required
                ></textarea>
              </div>

              <div class="col-12">
                <button type="submit" class="btn btn-brand">
                  Send Message
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section id="blog" class="section-padding border-top">
    <div class="container">
        <!-- Section Title -->
        <div class="row">
            <div class="col-12 text-center" data-aos="fade-down" data-aos-delay="100">
                <div class="section-title">
                    <h1 class="display-4 fw-semibold">
                        Blog Posts <span class="text-gradient">& Articles</span>
                    </h1>
                    <div class="line my-4"></div>
                    <p class="text-muted">
                    bukan sekadar tulisan kosong atau karya bias ini dapat memberikan solusi untuk anda
                    </p>
                </div>
            </div>
        </div>

        <!-- Blog Cards -->
        <div class="row justify-content-center mt-5">
            @foreach ($blogs->take(3) as $key => $blog)
                <div class="col-md-4 mb-4" 
                     data-aos="fade-up" 
                     data-aos-delay="{{ $key * 100 + 200 }}">
                    <div class="card blog-card h-100">
                        <div class="card-img-wrapper">
                            <img src="{{ asset('storage/image_blog/' . $blog->images) }}" 
                                 class="card-img-top" 
                                 alt="{{ $blog->title }}">
                            <div class="card-img-overlay">
                                <div class="overlay-content">
                                    <a href="{{ url('/blog-guest/' . $blog->id) }}" 
                                       class="btn btn-light btn-sm">Read More</a>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold mb-3">{{ $blog->title }}</h5>
                            <p class="card-text text-muted">
                                {{ Str::words($blog->description, 20) }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-0">
                            <a href="{{ url('/blog-guest/' . $blog->id) }}" 
                               class="btn btn-link text-primary p-0">
                                Read Full Article 
                                <i class="ri-arrow-right-line"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>

    <!-- footer -->
    <footer>
      <div class="footer-top text-center text-white">
        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 text-center">
              <h3 class="navbar-brand">Pet<span>Talk</span></h3>
              <p>
                Contrary to popular belief, Lorem Ipsum is not simply random
                text. It has roots in a piece of classical Latin literature from
              </p>
              <div class="social-icons">
                <a href="#"><i class="bx bxl-facebook icon-box3"></i></a>
                <a href="#"><i class="bx bxl-twitter icon-box3"></i></a>
                <a href="#"><i class="bx bxl-instagram icon-box3"></i></a>
                <a href="#"><i class="bx bxl-linkedin icon-box3"></i></a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="footer-bottom text-center text-white">
        <p class="mb-0">Copyright@2024. All rights Reserved</p>
      </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@fancyapps/ui@4.0/dist/fancybox.umd.js"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script src="{{'js/main.js'}}"></script>
    <!-- ./assets/js/main.js -->
  </body>
</html>
