<?php
    if(isset($params) && isset($params['errors'])):
        ?>

<div class="alert alert-danger">
    <p class="lead"><?= __('OOps, alguns erros ocorreram!')?></p>
    <?php foreach($params['errors'] as $errors){ ?>
    <ul>
        <?php foreach ($errors as $error): ?>
            <li><?= __($error) ?></li>
        <?php endforeach;?>
    </ul>
    <?php }?>

</div>
<?php else: ?>
        <div class="alert alert-danger">
            <p class="lead"><?= __('Oops, um erro ocorreu')?></p>
            <p><?= h($message) ?></p>
        </div>

<?php endif;?>


