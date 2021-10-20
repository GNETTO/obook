<?php ob_start()  ?>

<section class="content-section" id="portfolio">

    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
            <h3 class="text-secondary mb-0">Bienvenue</h3>
            <h2 class="mb-5">Nos Recents Livres</h2>
        </div>

        <div class="row gx-0">
            <?php 
                while($book = $data->fetch()){
                    
                  echo '  <div class="col-lg-6">
                        <a class="portfolio-item" href="#!">
                            <div class="caption">
                                <div class="caption-content">
                                    <div class="h2">"'.$book['titre'].'"</div>
                                    <p class="mb-0">"'.$book['auteur'].'"</p>
                                </div>
                            </div>
                            <img class="img-fluid" src="'.$book['photo'].'" alt="..." />
                        </a>
                    </div>';
                }
        ?>
        </div>
    </div>

</section>

<?php $content=ob_get_clean();  ?>