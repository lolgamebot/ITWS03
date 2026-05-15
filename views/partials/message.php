<?php if (isset($_SESSION['success_message'])): ?>
<div class="bg-green-100 p-3 m-3">
    <p><?= htmlspecialchars($_SESSION['success_message']) ?></p>
</div>
<?php unset($_SESSION['success_message']); ?>
<?php endif; ?>

<?php if (isset($_SESSION['error_message'])): ?>
<div class="bg-red-100 p-3 m-3">
    <p><?= htmlspecialchars($_SESSION['error_message']) ?></p>
</div>
<?php unset($_SESSION['error_message']); ?>
<?php endif; ?>