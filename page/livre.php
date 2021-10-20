<?php ob_start()  ?>
<div class="w-50">
    <div class="bg-success p-1 text-center text-light  mb-3 mt-3"> Vision  d' un livre</div>
   
    <?php
         echo   '
         <table class="table m-auto w-75">
         <tr>
             <td> Auteur</td>
             <td> '.$data['auteur'].'</td>
             <td rowspan=6><img src='.$data['photo'].'> </td>
         </tr>
         <tr>
             <td> Titre</td>
             <td>'.$data['titre'].' </td>
            
         </tr>
         <tr>
             <td> Nationalité</td>
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
             <td> '.$data['prix'].'</td>
             
         </tr>
         <tr>
             <td> Courant</td>
             <td> '.$data['courant'].'</td>
            
         </tr>
         <tr>
             <td> Description</td>
             <td> '.$data['description'].'</td>
           
         </tr>
     </table>

         ';
    ?>

    <div class="d-flex justify-content-center mt-3 bg-light">
        <button type="button" class="btn btn-dark m-2" type="button"   data-bs-dismiss="modal" aria-label="Close"  name="btn_retour_livre"    id="btn_retour_livre">Retour</button>
        <button type="button" class="btn btn-success m-2" type="button" name="btn_ajouter_livre"   id="btn_ajouter_livre">Ajouter</button>
        
    </div>
    </div>
    </form>
</div>
<?php $content=ob_get_clean();  ?>