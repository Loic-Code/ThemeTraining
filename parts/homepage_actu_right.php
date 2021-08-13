<div class="card mb-3 m-3">
    <div class="d-flex flex-row-reverse g-0">
        <div class="col-md-4">
            <img src="https://images.unsplash.com/photo-1520483691742-bada60a1edd6?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1950&q=80" class="img-fluid rounded-end" alt="...">
        </div>
        <div class="col-md-8">
            <div class="card-body">
                <h5 class="card-title"><?php the_title() ?></h5>
                <p class="card-text"><?php the_excerpt() ?></p>
            </div>
            <div class="d-flex justify-content-center">
                <a href="<?php the_permalink() ?>"><button type="button" class="btn btn-outline-primary">Voir l'article</button></a>
            </div>
        </div>
    </div>
</div>