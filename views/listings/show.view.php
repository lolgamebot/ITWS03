<?php use Framework\Authorization; ?>
<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="formPage">
  <div class="formPageWrapper">
    <div class="formCard">

      <?php loadPartial('message'); ?>

      <div class="formCardHeader">
        <span class="formCardHeaderLabel"><?= htmlspecialchars($listing['company']) ?></span>
        <h1><?= htmlspecialchars($listing['title']) ?></h1>
        <p><?= htmlspecialchars($listing['city']) ?>, <?= htmlspecialchars($listing['state']) ?></p>
      </div>

      <div class="formBody">
        <div class="formFieldGroup">
          <h2>Job Details</h2>
          <div class="listingMetaBox">
            <div class="listingMetaRow">
              <span class="listingMetaKey">Salary</span>
              <span class="listingSalary"><?= htmlspecialchars($listing['salary']) ?></span>
            </div>
            <div class="listingMetaRow">
              <span class="listingMetaKey">Location</span>
              <span class="listingLocation"><?= htmlspecialchars($listing['city']) ?>, <?= htmlspecialchars($listing['state']) ?></span>
            </div>
            <div class="listingMetaRow">
              <span class="listingMetaKey">Phone</span>
              <span><?= htmlspecialchars($listing['phone']) ?></span>
            </div>
            <div class="listingMetaRow">
              <span class="listingMetaKey">Email</span>
              <span><?= htmlspecialchars($listing['email']) ?></span>
            </div>
            <div class="listingMetaRow">
              <span class="listingMetaKey">Requirements</span>
              <span><?= htmlspecialchars($listing['requirements']) ?></span>
            </div>
            <div class="listingMetaRow">
              <span class="listingMetaKey">Benefits</span>
              <span><?= htmlspecialchars($listing['benefits']) ?></span>
            </div>
            <?php if (!empty($listing['tags'])): ?>
            <div class="listingMetaRow">
              <span class="listingMetaKey">Tags</span>
              <div class="listingTagsRow">
                <span class="listingTag"><?= htmlspecialchars($listing['tags']) ?></span>
              </div>
            </div>
            <?php endif; ?>
          </div>
        </div>

        <div class="formFieldGroup">
          <h2>Description</h2>
          <p><?= htmlspecialchars($listing['description']) ?></p>
        </div>

        <div class="formActions">
          <a href="/WS03/public/listings" class="btn btnSecondary">
            <i class="fa fa-arrow-left"></i>
            Back to Listings
          </a>

          <?php if (Authorization::isOwner($listing['user_id'])): ?>
          <a href="/WS03/public/listings/<?= $listing['id'] ?>/edit" class="btn btnPrimary">
            <i class="fa fa-pen"></i>
            Edit
          </a>

          <form method="POST" action="/WS03/public/listings/<?= $listing['id'] ?>">
            <input type="hidden" name="_method" value="DELETE">
            <button type="submit" class="btn btnPrimary" onclick="return confirm('Are you sure you want to delete this listing?')">
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
