<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-page">
  <div class="create-wrap">
    <div class="form-shell">
      <div class="form-hero">
        <span class="form-badge">Join Us</span>
        <h1>Create Account</h1>
        <p>Register to post and manage job listings.</p>
      </div>

      <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

      <form method="POST" action="/WS03/public/register" class="job-form">
        <div class="form-section">
          <div class="form-grid">
            <div class="form-group full">
              <label for="name">Full Name</label>
              <input type="text" id="name" name="name" placeholder="John Doe" class="form-input" value="<?= htmlspecialchars($user['name'] ?? '') ?>" />
            </div>

            <div class="form-group full">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="john@example.com" class="form-input" value="<?= htmlspecialchars($user['email'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="city">City</label>
              <input type="text" id="city" name="city" placeholder="Manila" class="form-input" value="<?= htmlspecialchars($user['city'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="state">State / Province</label>
              <input type="text" id="state" name="state" placeholder="Metro Manila" class="form-input" value="<?= htmlspecialchars($user['state'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Min. 6 characters" class="form-input" />
            </div>

            <div class="form-group">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" class="form-input" />
            </div>
          </div>
        </div>

        <div class="action-row">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-user-plus"></i>
            Register
          </button>
        </div>

        <p style="text-align:center; margin: 1rem 0;">
          Already have an account? <a href="/WS03/public/login">Login</a>
        </p>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>