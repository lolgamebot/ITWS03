<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="formPage">
  <div class="formPageWrapper">
    <div class="formCard">
      <div class="formCardHeader">
        <span class="formCardHeaderLabel">Employer Portal</span>
        <h1>Create Job Listing</h1>
        <p>Post a new opportunity and reach the right candidates faster.</p>
      </div>

      <?php if (!empty($errors)): ?>
      <div class="bg-red-50 mx-6 mt-6 rounded-lg p-4 border border-red-200">
        <?php foreach ($errors as $error): ?>
          <p class="text-red-600 text-sm"><?= htmlspecialchars($error) ?></p>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <form method="POST" action="/WS03/public/listings" class="formBody">
        <div class="formFieldGroup">
          <h2>Job Information</h2>

          <div class="formFieldGrid">
            <div class="formField fullWidth">
              <label for="title">Job Title</label>
              <input type="text" id="title" name="title" placeholder="Frontend Developer" class="formTextInput" value="<?= htmlspecialchars($listing['title'] ?? '') ?>" />
            </div>

            <div class="formField fullWidth">
              <label for="description">Job Description</label>
              <textarea id="description" name="description" rows="5" placeholder="Describe the role..." class="formTextInput"><?= htmlspecialchars($listing['description'] ?? '') ?></textarea>
            </div>

            <div class="formField">
              <label for="salary">Annual Salary</label>
              <input type="text" id="salary" name="salary" placeholder="₱500,000" class="formTextInput" value="<?= htmlspecialchars($listing['salary'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="requirements">Requirements</label>
              <input type="text" id="requirements" name="requirements" placeholder="React, Tailwind, PHP" class="formTextInput" value="<?= htmlspecialchars($listing['requirements'] ?? '') ?>" />
            </div>

            <div class="formField fullWidth">
              <label for="benefits">Benefits</label>
              <input type="text" id="benefits" name="benefits" placeholder="Health insurance, remote work" class="formTextInput" value="<?= htmlspecialchars($listing['benefits'] ?? '') ?>" />
            </div>

            <div class="formField fullWidth">
              <label for="tags">Tags</label>
              <input type="text" id="tags" name="tags" placeholder="Sales, Lady, Conductor" class="formTextInput" value="<?= htmlspecialchars($listing['tags'] ?? '') ?>" />
            </div>
          </div>
        </div>

        <div class="formFieldGroup">
          <h2>Company Information & Location</h2>

          <div class="formFieldGrid">
            <div class="formField fullWidth">
              <label for="company">Company Name</label>
              <input type="text" id="company" name="company" placeholder="Prosple Inc." class="formTextInput" value="<?= htmlspecialchars($listing['company'] ?? '') ?>" />
            </div>

            <div class="formField fullWidth">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" placeholder="123 Business Ave" class="formTextInput" value="<?= htmlspecialchars($listing['address'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="city">City</label>
              <input type="text" id="city" name="city" placeholder="Manila" class="formTextInput" value="<?= htmlspecialchars($listing['city'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="state">State / Province</label>
              <input type="text" id="state" name="state" placeholder="Metro Manila" class="formTextInput" value="<?= htmlspecialchars($listing['state'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="phone">Phone</label>
              <input type="text" id="phone" name="phone" placeholder="+63 912 345 6789" class="formTextInput" value="<?= htmlspecialchars($listing['phone'] ?? '') ?>" />
            </div>

            <div class="formField">
              <label for="email">Application Email</label>
              <input type="email" id="email" name="email" placeholder="jobs@company.com" class="formTextInput" value="<?= htmlspecialchars($listing['email'] ?? '') ?>" />
            </div>
          </div>
        </div>

        <div class="formActions">
          <button type="submit" class="btn btnPrimary">
            <i class="fa fa-floppy-disk"></i>
            Save Job
          </button>

          <a href="/WS03/public/" class="btn btnSecondary">
            <i class="fa fa-xmark"></i>
            Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>
