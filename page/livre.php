<?php ob_start()  ?>
<div class="w-75 m-auto">
    <div class="bg-success p-1 text-center text-light  mb-3 mt-3"> Vision  d' un livre</div>
   
    <?php
         echo   '
         <table class="tabl m-auto w-75">
         <tr>
             <td> Auteur</td>
             <td class="h4 text-primary"> '.$data['auteur'].'</td>
             <td rowspan=6><img src="'.$data['photo'].'" width=160> </td>
         </tr>
         <tr>
             <td> Titre</td>
             <td class="h3 text-danger">'.$data['titre'].' </td>
            
         </tr>
         <tr>
             <td> Nationalit√©</td>
             <td> '.$data['nationalite'].'</td>
            
         </tr>
         <tr>
             <td> Nombre de page</td>
             <td> '.$data['page'].'</td>
            
         </tr>
         <tr>
             <td> Parution</td>
             <td>'.$data['parution'].' </td>
            
         </tr>
     
         <tr>
             <td> Prix</td>
             <td class="text-success bolder"> '.$data['prix'].' FCFA</td>
             
         </tr>
         <tr>
             <td> Courant</td>
             <td  class="h5"> '.$data['courant'].'</td>
            
         </tr>
         <tr>
             <td> Description</td>
             <td class="text-dark"> '.$data['description'].'</td>
           
         </tr>
     </table>

         ';
    ?>

    <div class="d-flex justify-content-center mt-3 bg-light">
        <a href="acceuil" class="btn btn-dark m-2" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_livre"    id="btn_retour_livre">Retour</a>
        
    </div>
    </div>
    </form>
</div>
<?php $content=ob_get_clean();  ?>