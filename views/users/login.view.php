<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="formPage">
  <div class="formPageWrapper">
    <div class="formCard">
      <div class="formCardHeader">
        <span class="formCardHeaderLabel">Welcome Back</span>
        <h1>Login</h1>
        <p>Sign in to manage your job listings.</p>
      </div>

      <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

      <form method="POST" action="/WS03/public/login" class="formBody">
        <div class="formFieldGroup">
          <div class="formFieldGrid">
            <div class="formField fullWidth">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="john@example.com" class="formTextInput" value="<?= htmlspecialchars($user['email'] ?? '') ?>" />
            </div>

            <div class="formField fullWidth">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Enter your password" class="formTextInput" />
            </div>
          </div>
        </div>

        <div class="formActions">
          <button type="submit" class="btn btnPrimary">
            <i class="fa fa-right-to-bracket"></i>
            Login
          </button>
        </div>

        <p class="text-center text-sm mt-4 pb-6">
          Don't have an account? <a href="/WS03/public/register" class="text-purple-700 font-semibold">Register</a>
        </p>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>
