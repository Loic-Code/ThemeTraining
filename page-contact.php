   <?php
    /**
     * Template Name: Page Contact
     * Template Post Type: page
     */
    ?>
   <!-- Container -->
   <?php
    get_header();

    // On récupère les differents champs ACF
    $contactForm = get_field('formulaire_de_contact');
    $description = get_theme_mod("Description");
    $adresse = get_theme_mod("Adresse");
    $telephone = get_theme_mod("Telephone");
    $email = get_theme_mod("Mail");
    $horaire = get_theme_mod("Horaire");
    $social = get_field('reseaux_sociaux');

    ?>
   <div class="embed-responsive embed-responsive-16by9">
       <iframe class="embed-responsive-item google_maps mt-3" style="border: 0;" src="https://www.google.com/maps/embed/v1/place?q=<?= $adresse ?>&key=AIzaSyBFw0Qbyq9zTFTd-tUY6dZWTgaQzuU17R8" frameborder="0"></iframe>
   </div>
   <hr>

   <div class="row">
       <div class="col-md-6 d-flex justify-content-center" data-aos="fade-right">
           <div>
               <h3 class="text-center"> Nous contacter </h3>
               <div>
                   <?php
                   // On affiche le formulaire
                    if ($contactForm) {
                        echo $contactForm;
                    }
                    ?>
               </div>
           </div>
       </div>
       <div class="col-md-6" data-aos="fade-left">
           <div class="row">
               <div class="col-md-12 px-5">
                   <h3 class="text-center"> Information de contact </h3>
                   <?php
                   // On affiche la description
                    if ($description) {
                        echo $description;
                    }
                    ?>
               </div>
           </div>
           <hr>
           <div class="row">
               <div class="col-md-12 px-5">
                   <ul class="p-0 m-0">
                       <div class="my-2">
                           <i class="fas fa-map-marker-alt"></i> <span class="m-4"> <?= $adresse ?> </span>
                       </div>
                       <div class="my-2">
                           <i class="fas fa-phone-alt"></i> <span class="m-4"> <?= $telephone ?> </span>
                       </div>
                       <div class="my-2">
                           <i class="fas fa-envelope"></i> <span class="m-4"> <?= $email ?> </span>
                       </div>
                       <div class="my-2">
                           <i class="fas fa-clock"></i> <span class="m-4"> <?= $horaire ?> </span>
                       </div>
                   </ul>
               </div>
           </div>
           <hr>
           <div class="row">
               <div class="col-md-12 px-5">
                   <h4> Restons connectés : </h4>
                   <div class="d-flex justify-content-around pt-3 social_logo">
                       <?php
                       // On affiche les réseaux sociaux
                        if ($social) {
                            foreach ($social as $row) {
                                switch ($row['title']) {
                                    case 'twitter':
                        ?>
                                       <a href="<?= $row['url'] ?>" target="_blank"><i class="fab fa-twitter"></i></a>
                                   <?php
                                        break;
                                    case 'facebook':
                                    ?>
                                       <a href="<?= $row['url'] ?>" target="_blank"><i class="fab fa-facebook"></i></a>
                                   <?php
                                        break;
                                    case 'instagram':
                                    ?>
                                       <a href="<?= $row['url'] ?>" target="_blank"><i class="fab fa-instagram"></i></a>
                                   <?php
                                        break;
                                    case 'linkedin':
                                    ?>
                                       <a href="<?= $row['url'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                       <?php
                                        break;

                                    default:
                                        echo '<a href="' . $row['url'] . '" target="_blank"><i class="fab fa-'.$row['title'].'"></i></a>';
                                        break;
                                }
                            }
                        }
                        ?>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <?php get_footer(); ?>
