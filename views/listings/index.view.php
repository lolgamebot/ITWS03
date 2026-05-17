<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="listingsSection">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="listingsSectionHeader">
            <span class="listingsSectionLabel">All Opportunities</span>
            <h1 class="listingsSectionTitle">
                <?php if (isset($keywords) && $keywords !== ''): ?>
                    Search Results for "<?= htmlspecialchars($keywords) ?>"
                <?php else: ?>
                    All Jobs
                <?php endif; ?>
            </h1>
            <p class="listingsSectionSubtitle">
                Explore available openings across engineering, design, marketing, and data roles.
            </p>
        </div>

        <form method="GET" action="/WS03/public/listings/search" class="searchForm" style="margin-bottom: 2rem;">
            <div class="searchInputGroup">
                <i class="fa fa-search"></i>
                <input type="text" name="keywords" placeholder="Job title or keyword" value="<?= htmlspecialchars($keywords ?? '') ?>" />
            </div>
            <div class="searchInputGroup">
                <i class="fa fa-location-dot"></i>
                <input type="text" name="location" placeholder="Location" value="<?= htmlspecialchars($location ?? '') ?>" />
            </div>
            <button class="btn btnPrimary searchSubmitBtn">
                <i class="fa fa-search"></i>
                Search Jobs
            </button>
        </form>

        <?php loadPartial('message'); ?>

        <div class="listingsGrid">
            <?php foreach ($listings as $listing): ?>
            <article class="listingCard">
                <div class="listingCardBody">
                    <div class="listingCardHeader">
                        <span class="listingCompanyBadge"><?= htmlspecialchars($listing['company']) ?></span>
                        <span class="listingLocationBadge"><?= htmlspecialchars($listing['city']) ?></span>
                    </div>

                    <h3 class="listingTitle"><?= htmlspecialchars($listing['title']) ?></h3>
                    <p class="listingDescription"><?= htmlspecialchars($listing['description']) ?></p>

                    <div class="listingMetaBox">
                        <div class="listingMetaRow">
                            <span class="listingMetaKey">Salary</span>
                            <span class="listingSalary"><?= htmlspecialchars($listing['salary']) ?></span>
                        </div>
                        <div class="listingMetaRow">
                            <span class="listingMetaKey">Location</span>
                            <span class="listingLocation"><?= htmlspecialchars($listing['city']) ?>, <?= htmlspecialchars($listing['state']) ?></span>
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

                    <a href="/WS03/public/listings/<?= $listing['id'] ?>" class="viewDetailsBtn">View Details</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="backToListingsWrap">
            <a href="/WS03/public/" class="backToListingsLink">
                <i class="fa fa-arrow-left"></i>
                <span>Back to Home</span>
            </a>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>
