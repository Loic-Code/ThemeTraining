<div class="card mb-12 m-3">
    <div class="row g-0">
        <div class="col-md-4">
            <img src="https://images.unsplash.com/photo-1497911174120-042e550e7e0a?ixid=MnwxMjA3fDB8MHxzZWFyY2h8MjN8fGZlc3RpdmFsfGVufDB8fDB8fA%3D%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=500&q=60" class="img-fluid rounded-start" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php the_title() ?></h5>
                <p class="card-text"><?php the_excerpt() ?></p>
            </div>
            <div class="d-flex justify-content-center">
                <button type="button" class="btn btn-outline-primary"><a href="<?php the_permalink() ?>">Voir l'article</a></button>
            </div>
        </div>
    </div>
</div>