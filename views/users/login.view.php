<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-page">
  <div class="create-wrap">
    <div class="form-shell">
      <div class="form-hero">
        <span class="form-badge">Welcome Back</span>
        <h1>Login</h1>
        <p>Sign in to manage your job listings.</p>
      </div>

      <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

      <form method="POST" action="/WS03/public/login" class="job-form">
        <div class="form-section">
          <div class="form-grid">
            <div class="form-group full">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="john@example.com" class="form-input" value="<?= htmlspecialchars($user['email'] ?? '') ?>" />
            </div>

            <div class="form-group full">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" class="form-input" />
            </div>
          </div>
        </div>

        <div class="action-row">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-right-to-bracket"></i>
            Login
          </button>
        </div>

        <p style="text-align:center; margin: 1rem 0;">
          Don't have an account? <a href="/WS03/public/register">Register</a>
        </p>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>