<?php use Framework\Authorization; ?>
<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="create-page">
  <div class="create-wrap">
    <div class="form-shell">

      <?php loadPartial('message'); ?>

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
            <?php if (!empty($listing['tags'])): ?>
            <div class="job-meta-row">
              <span class="job-meta-label">Tags</span>
              <span><?= htmlspecialchars($listing['tags']) ?></span>
            </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="form-section">
          <h2>Description</h2>
          <p><?= htmlspecialchars($listing['description']) ?></p>
        </div>

        <div class="action-row">
          <a href="/WS03/public/listings" class="btn btn-secondary">
            <i class="fa fa-arrow-left"></i>
            Back to Listings
          </a>

          <?php if (Authorization::isOwner($listing['user_id'])): ?>
          <a href="/WS03/public/listings/<?= $listing['id'] ?>/edit" class="btn btn-primary">
            <i class="fa fa-pen"></i>
            Edit
          </a>

          <form method="POST" action="/WS03/public/listings/<?= $listing['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btn-primary" onclick="return confirm('Are you sure you want to delete this listing?')">
              <i class="fa fa-trash"></i>
              Delete
            </button>
          </form>
          <?php endif; ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php loadPartial('footer'); ?>