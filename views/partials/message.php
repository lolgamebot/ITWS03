<?php use Framework\Session; ?>

<?php $successMessage = Session::getFlash('success_message'); ?>
<?php if ($successMessage !== null): ?>
<div class="bg-green-100 p-3 m-3">
    <p><?= htmlspecialchars($successMessage) ?></p>
</div>
<?php endif; ?>

<?php $errorMessage = Session::getFlash('error_message'); ?>
<?php if ($errorMessage !== null): ?>
<div class="bg-red-100 p-3 m-3">
    <p><?= htmlspecialchars($errorMessage) ?></p>
</div>
<?php endif; ?>