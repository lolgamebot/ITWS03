<?php if (!empty($errors)): ?>
    <?php foreach ($errors as $error): ?>
        <div class="bg-red-100 my-3 p-3">
            <p><?= htmlspecialchars($error) ?></p>
        </div>
    <?php endforeach; ?>
<?php endif; ?>