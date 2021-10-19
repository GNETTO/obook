<?php ob_start()  ?>
   

<?php 

//$book = $data
require("page/partial/fiche_book.php") ;
//echo var_dump($data) . "<br>";

?>   

         
<?php $content=ob_get_clean();  ?>