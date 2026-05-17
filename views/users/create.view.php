<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="formPage">
  <div class="formPageWrapper">
    <div class="formCard">
      <div class="formCardHeader">
        <span class="formCardHeaderLabel">Join Us</span>
        <h1>Create Account</h1>
        <p>Register to post and manage job listings.</p>
      </div>

      <?php loadPartial('errors', ['errors' => $errors ?? []]); ?>

      <form method="POST" action="/WS03/public/register" class="formBody">
        <div class="formFieldGroup">
          <div class="formFieldGrid">
            <div class="formField fullWidth">
              <label for="name">Full Name</label>
              <input type="text" id="name" name="name" placeholder="John Doe" class="formTextInput" value="<?= htmlspecialchars($user['name'] ?? '') ?>" />
            </div>

            <div class="formField fullWidth">
              <label for="email">Email Address</label>
              <input type="email" id="email" name="email" placeholder="john@example.com" class="formTextInput" value="<?= htmlspecialchars($user['email'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="city">City</label>
              <input type="text" id="city" name="city" placeholder="Manila" class="formTextInput" value="<?= htmlspecialchars($user['city'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="state">State / Province</label>
              <input type="text" id="state" name="state" placeholder="Metro Manila" class="formTextInput" value="<?= htmlspecialchars($user['state'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="password">Password</label>
              <input type="password" id="password" name="password" placeholder="Min. 6 characters" class="formTextInput" />
            </div>

            <div class="formField">
              <label for="password_confirmation">Confirm Password</label>
              <input type="password" id="password_confirmation" name="password_confirmation" placeholder="Repeat password" class="formTextInput" />
            </div>
          </div>
        </div>

        <div class="formActions">
          <button type="submit" class="btn btnPrimary">
            <i class="fa fa-user-plus"></i>
            Register
          </button>
        </div>

        <p class="text-center text-sm mt-4 pb-6">
          Already have an account? <a href="/WS03/public/login" class="text-purple-700 font-semibold">Login</a>
        </p>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>
