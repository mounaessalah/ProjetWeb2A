<?php
include '../Controller/evenementC.php';
include '../Controller/categorieC.php';

$evenementC = new evenementC();
$error = "";
$list = $evenementC->listevenements();
// Créez une instance de la classe CategorieC
$categorieC = new CategorieC();

// Appelez la méthode listCategories pour récupérer toutes les catégories
$listeCategories = $categorieC->listCategories();

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
<!--

TemplateMo 569 Edu Meeting

https://templatemo.com/tm-569-edu-meeting

-->
  </head>

<body>

   

  <!-- Sub Header -->
  

  <!-- ***** Header Area Start ***** -->
  <header class="header-area header-sticky">
      <div class="container">
          <div class="row">
              <div class="col-12">
                  <nav class="main-nav">
                      <!-- ***** Logo Start ***** -->
                      
                      <a href="index.html" class="logo">

                          MINDFULLPATHS
                      </a>     
                      <!-- ***** Logo End ***** -->
                      
                      <!-- ***** Menu Start ***** -->
                      <ul class="nav">
                          <li><a href="index.html">Home</a></li>
                          <li><a href="meetings.html" class="active">event</a></li>
                          <li><a href="index.html">Apply Now</a></li>
                          <li class="has-sub">
                              <a href="javascript:void(0)">Pages</a>
                              <ul class="sub-menu">
                                  <li><a href="meetings.html">Upcoming Meetings</a></li>
                                  <li><a href="meeting-details.html">Meeting Details</a></li>
                              </ul>
                          </li>
                          <li><a href="index.html">Courses</a></li> 
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
          <h6>Here are our upcoming meetings</h6>
          <h2>Upcoming Meetings</h2>
        </div>
      </div>
    </div>
  </section>

  <section class="meetings-page" id="meetings">
    <div class="container">
      <div class="row">
        <div class="col-lg-12">
          <div class="row">
            <div class="col-lg-12">
              <div class="filters">
                <ul>
                  <li data-filter="*"  class="active">All Meetings</li>
                  <li data-filter=".soon">Soon</li>
                  <li data-filter=".imp">Important</li>
                  <li data-filter=".att">Attractive</li>
                </ul>
              </div>
            </div>
            <div class="row grid">
   
        <?php foreach ($list as $evenement) : ?>
            <div class="col-lg-4 templatemo-item-col all <?php echo $evenement['idCategorie']; ?>">
                <div class="meeting-item">
                    <div class="thumb">
                        <div class="prix">
                            <span>DT<?php echo $evenement['prix_evenement']; ?></span>
                        </div>
                        
                        <a href="meeting-details.html"><img src="assets/images/meeting-01.jpg" alt=""></a>
                    </div>
                    
                    <div class="down-content">
                       
                        <p> <h4> catégories :</h4> </p>
                        <a href="meeting-details.html"><h6><?php 
            // Afficher le nom de la catégorie en utilisant la méthode getCategorieNameById
                      echo $categorieC->getCategorieNameById($evenement['idCategorie']);
            ?></a>
                        <br>

                        <p><h4> titre :</h4> <h4><?php echo $evenement['titre_evenement']; ?></h4></p>
                       
                         <h4> date debut :</h4> <h4><?php echo $evenement['date_debut']; ?></h4>
                       
                        <h4>heure debut :</h4> <h4><?php echo $evenement['heure_debut']; ?> </h4>
                        <br>
                         <h4>date fin :</h4>  <h4> <?php echo $evenement['date_fin']; ?> </h4>
                         
                      
                        <br>
                        <h4>heure fin :</h4>  <h4> <?php echo $evenement['heure_fin']; ?> </h4>
                        <br>
                        <h4>description :</h4>  <h4> <?php echo $evenement['description_evenement']; ?> </h4>
                        <br>
                        <button>s'inscrire</button>

                    </div>
                </div>
                
            </div>
        <?php endforeach; ?>
   
    </div>
          </div>
        </div>
      </div>
    </div>
    <div class="footer">
      <p>Copyright © 2022 Edu Meeting Co., Ltd. All Rights Reserved. 
          <br>Design: <a href="https://templatemo.com/page/1" target="_parent" title="website templates">TemplateMo</a></p>
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