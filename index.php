<?php get_header() ?>
    <h1>page d'accueil</h1>
    <div class="d-flex">
  <div class="d-flex flex-lg-column m-2">
    <label> Votre nom :
        [text* your-name] </label>
    <label> Votre e-mail
        [email* your-email] </label>
  </div>
  <label> Objet
      [text* your-subject] </label>
  <label> Votre message (facultatif)
      [textarea your-message] </label>
  [submit "Envoyer"]
</div>
<?php get_footer() ?>

