<?php
if (!isset($params['escape']) || $params['escape'] !== false) {
    $message = h($message);
}
?>
<div class="alert alert-success">
    <p class="lead"><?= $message ?></p>
</div>
