<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-page">
  <div class="create-wrap">
    <div class="form-shell">
      <div class="form-hero">
        <span class="form-badge">Employer Portal</span>
        <h1>Edit Job Listing</h1>
        <p>Update the details of this job opportunity.</p>
      </div>

      <?php if (!empty($errors)): ?>
      <div class="form-errors">
        <?php foreach ($errors as $error): ?>
          <div class="bg-red-100 m-3">
            <p><?= htmlspecialchars($error) ?></p>
          </div>
        <?php endforeach; ?>
      </div>
      <?php endif; ?>

      <form method="POST" action="/WS03/Public/listings/<?= $listing['id'] ?>" class="job-form">
        <input type="hidden" name="_method" value="PUT">

        <div class="form-section">
          <h2>Job Information</h2>

          <div class="form-grid">
            <div class="form-group full">
              <label for="title">Job Title</label>
              <input type="text" id="title" name="title" placeholder="Frontend Developer" class="form-input" value="<?= htmlspecialchars($listing['title'] ?? '') ?>" />
            </div>

            <div class="form-group full">
              <label for="description">Job Description</label>
              <textarea id="description" name="description" rows="5" placeholder="Describe the role..." class="form-input"><?= htmlspecialchars($listing['description'] ?? '') ?></textarea>
            </div>

            <div class="form-group">
              <label for="salary">Annual Salary</label>
              <input type="text" id="salary" name="salary" placeholder="₱500,000" class="form-input" value="<?= htmlspecialchars($listing['salary'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="requirements">Requirements</label>
              <input type="text" id="requirements" name="requirements" placeholder="React, Tailwind, PHP" class="form-input" value="<?= htmlspecialchars($listing['requirements'] ?? '') ?>" />
            </div>

            <div class="form-group full">
              <label for="benefits">Benefits</label>
              <input type="text" id="benefits" name="benefits" placeholder="Health insurance, remote work" class="form-input" value="<?= htmlspecialchars($listing['benefits'] ?? '') ?>" />
            </div>

            <div class="form-group full">
              <label for="tags">Tags</label>
              <input type="text" id="tags" name="tags" placeholder="Sales, Lady, Conductor" class="form-input" value="<?= htmlspecialchars($listing['tags'] ?? '') ?>" />
            </div>
          </div>
        </div>

        <div class="form-section">
          <h2>Company Information & Location</h2>

          <div class="form-grid">
            <div class="form-group full">
              <label for="company">Company Name</label>
              <input type="text" id="company" name="company" placeholder="Prosple Inc." class="form-input" value="<?= htmlspecialchars($listing['company'] ?? '') ?>" />
            </div>

            <div class="form-group full">
              <label for="address">Address</label>
              <input type="text" id="address" name="address" placeholder="123 Business Ave" class="form-input" value="<?= htmlspecialchars($listing['address'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="city">City</label>
              <input type="text" id="city" name="city" placeholder="Manila" class="form-input" value="<?= htmlspecialchars($listing['city'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="state">State / Province</label>
              <input type="text" id="state" name="state" placeholder="Metro Manila" class="form-input" value="<?= htmlspecialchars($listing['state'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="phone">Phone</label>
              <input type="text" id="phone" name="phone" placeholder="+63 912 345 6789" class="form-input" value="<?= htmlspecialchars($listing['phone'] ?? '') ?>" />
            </div>

            <div class="form-group">
              <label for="email">Application Email</label>
              <input type="email" id="email" name="email" placeholder="jobs@company.com" class="form-input" value="<?= htmlspecialchars($listing['email'] ?? '') ?>" />
            </div>
          </div>
        </div>

        <div class="action-row">
          <button type="submit" class="btn btn-primary">
            <i class="fa fa-floppy-disk"></i>
            Update Job
          </button>

          <a href="/WS03/Public/listings/<?= $listing['id'] ?>" class="btn btn-secondary">
            <i class="fa fa-xmark"></i>
            Cancel
          </a>
        </div>
      </form>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>