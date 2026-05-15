<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-page">
  <div class="create-wrap">
    <div class="form-shell">
      <div class="form-hero">
        <span class="form-badge"><?= htmlspecialchars($listing['company']) ?></span>
        <h1><?= htmlspecialchars($listing['title']) ?></h1>
        <p><?= htmlspecialchars($listing['city']) ?>, <?= htmlspecialchars($listing['state']) ?></p>
      </div>

      <div class="job-form">
        <div class="form-section">
          <h2>Job Details</h2>
          <div class="job-card-meta">
            <div class="job-meta-row">
              <span class="job-meta-label">Salary</span>
              <span class="job-salary"><?= htmlspecialchars($listing['salary']) ?></span>
            </div>
            <div class="job-meta-row">
              <span class="job-meta-label">Location</span>
              <span class="job-location"><?= htmlspecialchars($listing['city']) ?>, <?= htmlspecialchars($listing['state']) ?></span>
            </div>
            <div class="job-meta-row">
              <span class="job-meta-label">Phone</span>
              <span><?= htmlspecialchars($listing['phone']) ?></span>
            </div>
            <div class="job-meta-row">
              <span class="job-meta-label">Email</span>
              <span><?= htmlspecialchars($listing['email']) ?></span>
            </div>
            <div class="job-meta-row">
              <span class="job-meta-label">Requirements</span>
              <span><?= htmlspecialchars($listing['requirements']) ?></span>
            </div>
            <div class="job-meta-row">
              <span class="job-meta-label">Benefits</span>
              <span><?= htmlspecialchars($listing['benefits']) ?></span>
            </div>
          </div>
        </div>

        <div class="form-section">
          <h2>Description</h2>
          <p><?= htmlspecialchars($listing['description']) ?></p>
        </div>

        <div class="action-row">
          <a href="/WS03/Public/listings" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>
            Back to Listings
          </a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>