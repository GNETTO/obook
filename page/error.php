<?php ob_start()  ?>

<div class="bg-danger text-light p-3">
    <?php  echo $data['message']?>
</div>

<?php $content=ob_get_clean();  ?>