<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EstudyanTipid</title>

    <!-- Bootstrap CSS -->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">
    <!-- External Css File -->
    <link rel="stylesheet" href="IndexStyle.css">
    <!-- Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
</head>
<body>
    <!-- Start of Navbar -->

      <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="https://i.ibb.co/frnvN8c/Estudyan-Tipid-logo-llls-black.png" >
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto ">
              <li class="nav-item mx-3">
                <a class="nav-link " aria-current="page" href="#home">Home</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="#hero-carousel">Features</a>
              </li>
              <!-- <li class="nav-item mx-3">
                <a class="nav-link" href="#faqs">FAQs</a>
              </li> -->
              <li class="nav-item mx-3">
                <a class="nav-link" href="#contact">Contact Us</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="#about_us">About Us</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="..\login\Login.php">Log In</a>
              </li>
            </ul>
          </div>
        </div>
      </nav>
      
      <!-- End of Navbar -->
        <!-- START OF HOME SECTION -->
    <div class="container-fluid">
    <section class="" id="home">
        <!-- <img src="https://i.ibb.co/tH2Nyz4/mainpage-banner.png" class="homepic img-fluid"> -->
        <img src="https://i.ibb.co/tH2Nyz4/mainpage-banner.png" class="homepic img-fluid">
        <a href="..\login\Login.php"><button class="btn btn-primary">Getting Started</button></a>
	</section>
        <!-- END OF HOME SECTION -->
  <br/>
        <!-- START OF FEATURES SECTION -->
        
        <div id="hero-carousel" class="carousel slide" data-bs-ride="carousel">
          
          <div class="carousel-inner">
            <div class="carousel-item active c-item">
              <img src="https://i.ibb.co/dB0MMmk/budget-allowance-carousel.png" class="d-block w-100 c-img" alt="Slide 1">
              <div class="carousel-caption d-none d-md-block">
                <h5>Budget your Allowance</h5>
                <p>Manage the allowance with ease.</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://i.ibb.co/48gg6Sf/track-wallet-carousel.png" class="d-block w-100 c-img" alt="Slide 2">
              <div class="carousel-caption d-none d-md-block">
                <h5>Track Your Wallet</h5>
                <p>Easily monitor the details of your budget</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://i.ibb.co/611Mh7J/save-goals-carousel.png" class="d-block w-100 c-img" alt="Slide 3">
              <div class="carousel-caption d-none d-md-block">
                <h5>Save your Planned Goals</h5>
                <p>Save money to future use!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://i.ibb.co/tLg5Tb7/record-stats-carousel.png" class="d-block w-100 c-img" alt="Slide 4">
              <div class="carousel-caption d-none d-md-block">
                <h5>Track your Records</h5>
                <p>Easily track your records on expenses and savings!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://i.ibb.co/dkv5jwq/plan-payment-carousel.png" class="d-block w-100 c-img" alt="Slide 5">
              <div class="carousel-caption d-none d-md-block">
                <h5>Planned Payments</h5>
                <p>Strategically plan your payments!</p>
              </div>
            </div>
            <div class="carousel-item">
              <img src="https://i.ibb.co/ZM0mSFz/profile-carousel.jpg" class="d-block w-100 c-img" alt="Slide 6">
              <div class="carousel-caption d-none d-md-block">
                <h5>Custom Profile</h5>
                <p>Modify your profile, Change your picture and more!</p>
              </div>
            </div>
          </div>
          <button class="carousel-control-prev" type="button" data-bs-target="#hero-carousel" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            
          </button>
          <button class="carousel-control-next" type="button" data-bs-target="#hero-carousel" data-bs-slide="next">
            
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
          </button>
        </div>
        <!-- END OF FEATURES SECTION -->
  <br>
  <!-- START OF FAQS SECTION -->
    <!-- <section class="py-md-5 " id="faqs">
        <h2 class="header my-5 text-center">Frequenty Asked Questions</h2>
        <div class="container">
        <div class="accordion w-75 mx-auto" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                How can this website help me in terms of budgetting?
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                </svg>
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>Wala pa bawi next life.</strong> hahahahahah.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Can i avail e-wallet in Estudyantipid website?
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                </svg>
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                Can i use the website without logging in?
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-chevron-compact-down" viewBox="0 0 16 16">
                  <path fill-rule="evenodd" d="M1.553 6.776a.5.5 0 0 1 .67-.223L8 9.44l5.776-2.888a.5.5 0 1 1 .448.894l-6 3a.5.5 0 0 1-.448 0l-6-3a.5.5 0 0 1-.223-.67z"/>
                </svg>
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
              </div>
            </div>
          </div>
        </div>
      </div>
	</section>
  <br> -->
  <!-- END OF FAQS SECTION -->
    <!-- START OF CONTACT SECTION -->
    <div class="form-area" id="contact">
      <div class="container">
          <div class="row single-form g-0">
              <div class="col-sm-12 col-lg-6">
                  <div class="left">
                      <h2><span>Contact Us</span> <br>EstudyanTipid</h2>
                  </div>
              </div>
              <div class="col-sm-12 col-lg-6">
                  <div class="right">
                     <i class="fa fa-caret-left"></i>
                      <form>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Your Name</label>
                          <input type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputEmail1" class="form-label">Email address</label>
                          <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                        </div>
                        <div class="mb-3">
                          <label for="exampleInputPassword1" class="form-label">Message</label>
                            <textarea type="password" class="form-control" id="exampleInputPassword1"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                      </form>
                  </div>
              </div>
          </div>
      </div>
  </div>
      <!-- END OF FAQS SECTION -->
      <br>
    <!-- START OF ABOUT US SECTION -->
    <section class="" id="about_us">
      <br>
            <img src="https://i.ibb.co/bRMh9Kv/Estudyan-Tipid-logo-white.png" class="aboutpic mx-5">
            <br>
            <h4>About Us</h4>
          <p id="ap1">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
          quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
          quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
          </p>
            <h4>About the Website</h4>
          <p id="ap2">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
          quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa
          quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit
          </p>
      <!-- <table>
        <tr>
          <th>
            <img src="https://i.ibb.co/bRMh9Kv/Estudyan-Tipid-logo-white.png" class="aboutpic mx-5">
          </th>
          <td>
            <h4>About Us</h4>
          <p>
            Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa<br>
          quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit<br>
          Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa<br>
          quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit<br>
          </p>
          </td>
        </tr>
      </table> -->
	</section>
      <!-- END OF ABOUT US SECTION -->


      </div>

    <!-- Bootstrap Javascript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>

</body>
</html>