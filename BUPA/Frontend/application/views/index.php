

 <!-- ======= hero Section ======= -->
  <section id="hero">

    <div class="hero-content" >
      <h3>WELCOME TO BUSIA PROFESSIONALS ASSOCIATION!</h3>
      <div>
        <a href="<?= base_url().'Welcome/about' ?>" class="btn-get-started scrollto">What We Do</a>
        <a href="#contact" class="btn-projects scrollto">Contact Us</a>
      </div>
    </div>

    <div class="hero-slider swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide" style="background-image: url('assets/img/background.jpeg');"></div>

      </div>
    </div>

  </section><!-- End Hero Section -->

  <main id="main">
      
      
      
    <!-- ======= Call To Action Section ======= -->
    <section id="call-to-action">
      <div>
        <div class="row">
          <div class="col-lg-9 text-center text-lg-start">
             <center><h3 class="cta-title">Our Reputation is Proof</h3></center>

          </div>
          
        </div>
      </div>
    </section><!-- End Call To Action Section -->
      
      
          <!-- ======= Services Section ======= -->
    <section id="services">
      <div>
        <div class="section-header">
          <center><h3>Our Services</h3></center>
  
        </div>

        <div class="row gy-4">

          <div class="col-lg-6"  data-aos-delay="100">
            <div class="box">
              <div class="icon">
                  <img src="<?= base_url().'assets/img/professional.jpeg' ?>" width="50"/><br>
                  <!--<i class="bi bi-briefcase"></i>-->
                  </div>
              <h4 class="title"><a href="">Proffesional Guidance</a></h4>
              <p class="description">Identification And Proper Utilization Of Resources For Successful Implementation Of Project.</p>
            </div>
          </div>

          <div class="col-lg-6"  data-aos-delay="200">
            <div class="box">
              <div class="icon">
                   <img src="<?= base_url().'assets/img/strength.jpeg' ?>" width="50"/><br>
                  <!--<i class="bi bi-card-checklist"></i>-->
                  </div>
              <h4 class="title"><a href="">Strengthen Development Projects</a></h4>
              <p class="description">For The Full Benefit Of The People Of The County.</p>
            </div>
          </div>

          <div class="col-lg-6" data-aos-delay="300">
            <div class="box">
              <div class="icon">
                  <img src="<?= base_url().'assets/img/bupa.jpeg' ?>" width="50"/><br>
                  <!--<i class="bi bi-bar-chart"></i>-->
                  </div>
              <h4 class="title"><a href="">BUPA Investments</a></h4>
              <p class="description">Enable BUPA Members Participate In Investment Activities Within The County Or Elsewhere.</p>
            </div>
          </div>

          <div class="col-lg-6"  data-aos-delay="400">
            <div class="box">
              <div class="icon">
                     <img src="<?= base_url().'assets/img/promote.jpeg' ?>" width="50"/><br>
                  <!--<i class="bi bi-binoculars"></i>-->
                  </div>
              <h4 class="title"><a href="">Promote Development Ideas</a></h4>
              <p class="description">Through Dialogue With The Public And Leaders.</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Services Section -->


    <!-- ======= About Section ======= -->
    <section id="about">
      <div>
          <div class="section-header">
          <center><h3>JOIN BUSIA PROFESSIONALS ASSOCIATION (BUPA)</h3></center>
  
        </div>
        <div class="row">
          <div class="col-lg-6 about-img">
            <img src="<?= base_url().'assets/img/busia.jpeg' ?>" alt="">
          </div>

          <div class="col-lg-6 content">
            <h2>Why Work With Us</h2>
            <h3>Join Us Today And Become A Part Of Our Growing Community Of Professionals Committed To The Development Of Busia County. By Joining BUPA You Will:</h3>

            <ul>
              <li><i class="bi bi-check-circle"></i>Get The Opportunity To Contribute Your Ideas And Professional Knowledge And Skills To The Socio-Economic Development Of Busia.</li>
              <li><i class="bi bi-check-circle"></i> Access Instant Connections To Our Growing Community Of Members.</li>
              <li><i class="bi bi-check-circle"></i>Access Member Only Activities And Events And Much More….</li>
              <li><a class="btn-projects scrollto" href="#contact"><button>Make Appointment</button></a></li>
            </ul>

          </div>
        </div>

      </div>
    </section>
    <!-- End About Section -->

 

   



    <!-- ======= Contact Section ======= -->
    <section id="contact">
      <!--<div class="container" data-aos="fade-up">-->
        <div class="section-header">
          <center><h3>Contact</h3></center>
          <p></p>
        </div>

      </div>


      <div class="container">
        <div class="form">
          <form action="<?= base_url().'Welcome/ContactUs'?>" method="post" role="form" >
            <div class="row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="form-group col-md-6 mt-3 mt-md-0">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group mt-3">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group mt-3">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>

        

            
                <button>Send Message</button>
          </form>
        </div>

      <!--</div>-->
    </section><!-- End Contact Section -->

  </main><!-- End #main -->