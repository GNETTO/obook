<?php ob_start()  ?>

<section class="content-section" id="portfolio">

    <div class="container px-4 px-lg-5">
        <div class="content-section-heading text-center">
            <h3 class="text-secondary mb-0">Bienvenue</h3>
            <h2 class="mb-5">Nos Recents Livres</h2>
        </div>

        <div class="row gx-0 w-50 border">
            <?php 
                while($book = $data->fetch()){
                    
                  echo ' <div class="col-lg-6 mb-5" style="height:250px">
                            <a class="portfolio-item" href="livre?id='.$book['id'].'&titre='.$book['titre'].'">
                                <div class="caption">
                                    <div class="caption-content">
                                        <div class="h5">'.$book['titre'].'</div>
                                        <p class="mb-0">'.$book['auteur'].'</p>
                                    </div>
                                </div>
                                <img class="img-fluid" src="'.$book['photo'].'" alt="..." / style="height:70%;width:60%">
                            </a>
                            
                            <div class="mt-2">
                                <span class="like-icon m-1 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="15" fill="black" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg></span>
                                <span class="like-icon m-1 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="15" fill="black" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg></span>
                                <span class="like-icon m-1 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="15" fill="black" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg></span>
                                <span class="like-icon m-1 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="15" fill="black" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg></span>
                                <span class="like-icon m-1 p-1"><svg xmlns="http://www.w3.org/2000/svg" width="15" fill="black" viewBox="0 0 576 512"><!-- Font Awesome Free 5.15.3 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free (Icons: CC BY 4.0, Fonts: SIL OFL 1.1, Code: MIT License) --><path d="M259.3 17.8L194 150.2 47.9 171.5c-26.2 3.8-36.7 36.1-17.7 54.6l105.7 103-25 145.5c-4.5 26.3 23.2 46 46.4 33.7L288 439.6l130.7 68.7c23.2 12.2 50.9-7.4 46.4-33.7l-25-145.5 105.7-103c19-18.5 8.5-50.8-17.7-54.6L382 150.2 316.7 17.8c-11.7-23.6-45.6-23.9-57.4 0z"/></svg></span>
                                
                            </div>
                        </div>';
                }
        ?>
        </div>
    </div>

</section>


<script>
  
    like_icon = document.querySelectorAll(".like-icon");

    Array.prototype.map.call(like_icon , icon=>{
        icon.addEventListener("click", event=>{
            if( event.currentTarget.children[0].getAttribute('fill') =="black"){
                event.currentTarget.children[0].setAttribute('fill',"red") ;
            }else {
                event.currentTarget.children[0].setAttribute('fill',"black") ;
            }
            
           
        })
    })
</script>

<?php $content=ob_get_clean();  ?>

