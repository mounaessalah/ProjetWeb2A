<?php
include 'C:\xampp\htdocs\MindFullPaths\Controller\CoursC.php';
require_once 'C:\xampp\htdocs\MindFullPaths\Model\Cours.php';

$CoursC = new CoursC();

// If 'edit' parameter is set in the URL, fetch the course to edit
if (isset($_GET['edit'])) {
    $idToEdit = $_GET['edit'];
    $CoursToEdit = $CoursC->getCourseById($idToEdit);
}

// If 'delete' parameter is set in the URL, delete the corresponding course
if (isset($_GET['delete'])) {
    $idToDelete = $_GET['delete'];
    // Implement course deletion logic here using $idToDelete
}

// Fetch list of courses
$listCours = $CoursC->listCourses();
?>




<!DOCTYPE html>
<html lang="en">

  <head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Template Mo">
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,300,400,500,600,700,800,900" rel="stylesheet">

    <title>Education - List of Meetings</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">


    <!-- Additional CSS Files -->
    <link rel="stylesheet" href="assets/css/fontawesome.css">
    <link rel="stylesheet" href="assets/css/templatemo-edu-meeting.css">
    <link rel="stylesheet" href="assets/css/owl.css">
    <link rel="stylesheet" href="assets/css/lightbox.css">







    <style>
        /* Custom CSS for card design */
        .meetings-page {
            padding: 80px 0;
            background-color: #f8f9fa;
        }

        .meetings-page .container {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-wrap: wrap;
        }

        .meetings-page .card {
            width: 320px;
            height: 440px;
            margin: 30px;
            border-radius: 15px;
            box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
            overflow: hidden;
            background: #ffffff;
            transition: transform 0.3s ease;
        }

        .meetings-page .card:hover {
            transform: translateY(-5px);
        }

        .meetings-page .card .box {
            padding: 20px;
        }

        .meetings-page .card .box h3 {
            font-size: 1.8rem;
            color: #333333;
            margin-bottom: 15px;
        }

        .meetings-page .card .box p {
            font-size: 1rem;
            color: #666666;
        }

        .meetings-page .card .box a {
            display: inline-block;
            margin-top: 20px;
            padding: 8px 20px;
            background: #2196f3;
            color: #ffffff;
            border-radius: 5px;
            text-decoration: none;
            transition: background 0.3s ease;
        }

        .meetings-page .card .box a:hover {
            background: #0e83cd;
        }
    </style>









<!---

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

   

  <!-- Sub Header -->
  <div class="sub-header">
    <div class="container">
      <div class="row">
        <div class="col-lg-8 col-sm-8">
          <div class="left-content">
            <p>This is an educational <em>HTML CSS</em> template by TemplateMo website.</p>
          </div>
        </div>
        <div class="col-lg-4 col-sm-4">
          <div class="right-icons">
            <ul>
              <li><a href="#"><i class="fa fa-facebook"></i></a></li>
              <li><a href="#"><i class="fa fa-twitter"></i></a></li>
              <li><a href="#"><i class="fa fa-behance"></i></a></li>
              <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      <a href="index.html" class="logo">
                          Edu Meeting
                      </a>
                      <!-- ***** Logo End ***** -->
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="index.html">Home</a></li>
                          <li><a href="meetings.html" class="active">Courses</a></li>
                          <li><a href="index.html">Apply Now</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Upcoming Courses</a></li>
                                  <li><a href="meeting-details.html">Courses Details</a></li>
                              </ul>
                          </li>
                          <li><a href="Cours.php">Courses</a></li> 
                          <li><a href="index.html">Contact Us</a></li> 
                      </ul>        
                      <a class='menu-trigger'>
                          <span>Menu</span>
                      </a>
                      <!-- ***** Menu End ***** -->
                  </nav>
              </div>
          </div>
      </div>
  </header>
  <!-- ***** Header Area End ***** -->

  <section class="heading-page header-text" id="top">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <h6>Here are our upcoming Courses</h6>
          <h2>Courses </h2>
        </div>
      </div>
    </div>
  </section>


  <section class="meetings-page" id="meetings">
    <div class="container">
    <?php foreach ($listCours as $cours): ?>
            <div class="card">
                <div class="box">
                    <h3>     <?php echo $cours['Titre']; ?>  </h3>
                    <p><    <?php echo $cours['Prerequis']; ?> </p>
                    <p>Nombre des videos:     <?php echo $cours['Nombre']; ?> </p>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
</section>


  <!-- Scripts -->
  <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <script src="assets/js/isotope.min.js"></script>
    <script src="assets/js/owl-carousel.js"></script>
    <script src="assets/js/lightbox.js"></script>
    <script src="assets/js/tabs.js"></script>
    <script src="assets/js/isotope.js"></script>
    <script src="assets/js/video.js"></script>
    <script src="assets/js/slick-slider.js"></script>
    <script src="assets/js/custom.js"></script>
    <script>
        //according to loftblog tut
        $('.nav li:first').addClass('active');

        var showSection = function showSection(section, isAnimate) {
          var
          direction = section.replace(/#/, ''),
          reqSection = $('.section').filter('[data-section="' + direction + '"]'),
          reqSectionPos = reqSection.offset().top - 0;

          if (isAnimate) {
            $('body, html').animate({
              scrollTop: reqSectionPos },
            800);
          } else {
            $('body, html').scrollTop(reqSectionPos);
          }

        };

        var checkSection = function checkSection() {
          $('.section').each(function () {
            var
            $this = $(this),
            topEdge = $this.offset().top - 80,
            bottomEdge = topEdge + $this.height(),
            wScroll = $(window).scrollTop();
            if (topEdge < wScroll && bottomEdge > wScroll) {
              var
              currentId = $this.data('section'),
              reqLink = $('a').filter('[href*=\\#' + currentId + ']');
              reqLink.closest('li').addClass('active').
              siblings().removeClass('active');
            }
          });
        };

        $('.main-menu, .responsive-menu, .scroll-to-section').on('click', 'a', function (e) {
          e.preventDefault();
          showSection($(this).attr('href'), true);
        });

        $(window).scroll(function () {
          checkSection();
        });
    </script>
</body>


  </body>

</html>
