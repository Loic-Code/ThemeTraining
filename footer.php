  <?php

    ?>

  </div>

  <footer class="text-center pt-5 text-lg-start text-muted footer">
      <section class="">
          <div class="container-fluid text-center text-md-start">
              <div class="row">
                  <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
                      <?php
                        if (function_exists('the_custom_logo')) {
                            the_custom_logo();
                        }
                        ?>
                      <div class="d-flex justify-content-around pt-3 social_logo">
                          <?php
                            $social = [
                                [
                                    'title' => 'facebook',
                                    'url' => get_theme_mod("Facebook"),
                                ],
                                [
                                    'title' => 'twitter',
                                    'url' => get_theme_mod("Twitter"),
                                ],
                                [
                                    'title' => 'instagram',
                                    'url' => get_theme_mod("Instagram"),
                                ],
                                [
                                    'title' => 'linkedin',
                                    'url' => get_theme_mod("Linkedin"),
                                ],
                            ];
                            // On affiche les réseaux sociaux

                            foreach ($social as $row) {
                                
                                switch ($row['title']) {
                                    case 'twitter':
                            ?>
                            
                                      <a href="<?= $row['url'] ?>"><i class="fab fa-twitter"></i></a>
                                  <?php
                                        break;
                                    case 'facebook':
                                    ?>
                                      <a href="<?= $row['url'] ?>"><i class="fab fa-facebook"></i></a>
                                  <?php
                                        break;
                                    case 'instagram':
                                    ?>
                                      <a href="<?= $row['url'] ?>"><i class="fab fa-instagram"></i></a>
                                  <?php
                                        break;
                                    case 'linkedin':
                                    ?>
                                      <a href="<?= $row['url'] ?>" target="_blank"><i class="fab fa-linkedin"></i></a>
                          <?php
                                        break;

                                    default:
                                        echo '<a href="' . $row['url'] . '" target="_blank"><i class="fab fa-' . $row['title'] . '"></i></a>';
                                        break;
                                }
                            }
                            ?>
                      </div>
                  </div>
                  <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
                      <h6 class="text-uppercase fw-bold mb-4">
                          Contact
                      </h6>
                      <?php
                        if (get_theme_mod("Adresse")) :
                        ?>
                          <p><i class="fas fa-map-marker-alt me-3"></i> <?= get_theme_mod("Adresse") ?></p>
                      <?php endif; ?>

                      <?php if (get_theme_mod("Mail")) : ?>
                          <p>
                              <i class="fas fa-envelope me-3"></i>
                              <?= get_theme_mod("Mail") ?>
                          </p>
                      <?php endif; ?>
                      <?php if (get_theme_mod("Telephone")) : ?>
                          <p><i class="fas fa-phone me-3"></i> <?= get_theme_mod("Telephone") ?> </p>
                      <?php endif; ?>
                      <?php if (get_theme_mod("Horaire")) : ?>
                          <p><i class="fas fa-clock me-3"></i> <?= get_theme_mod("Horaire") ?> </p>
                      <?php endif; ?>
                  </div>
                  <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">

                      <h6 class="text-uppercase fw-bold mb-4">
                          <?php
                            //Site title (set in Settings > General)
                            bloginfo('name'); ?>
                      </h6>

                      <?php if (get_theme_mod("Description")) : ?>
                          <p> <?= get_theme_mod("Description"); ?> </p>
                      <?php endif; ?>
                  </div>
              </div>
          </div>
      </section>
      <div class="text-center p-4" style="background-color: rgba(0, 0, 0, 0.05);">
          © 2021 Copyright:
          <a class="text-reset fw-bold" href=""><?php
                                                //Site title (set in Settings > General)
                                                bloginfo('name'); ?></a>
      </div>

  </footer>
  <?php wp_footer() ?>
  </body>
  <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
  <script>
      AOS.init();
  </script>

  </html>