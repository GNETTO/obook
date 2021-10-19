
<?php ob_start()  ?>

<?php 
echo "##### test #########";
$uri = "dashboard_updatebook?id=10";
    $path = preg_split( '/\?/',$uri);
    //echo $path;
    echo var_dump($path);

?>
<?php $content=ob_get_clean();  ?>
