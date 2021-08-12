<?php

?>
<div class="row">
    <div class="col-md-5"> <?php
                            $testimonies = get_fields();

                            foreach ($testimonies as $testimony) {
                                $nom = $testimony['nom'];
                                $message = $testimony['message'];
                                
                            }
                            ?>
    </div>
    <div class="col-md-5">
        <img src="" alt="">
    </div>
</div>