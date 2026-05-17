<?php
loadPartial('head');
loadPartial('navbar');
loadPartial('showcase');
?>

<section class="availableJobsBanner">
    <div class="container mx-auto max-w-6xl px-4">
        <h2>Available Opportunities</h2>
        <p>Explore job openings from different categories and companies.</p>
    </div>
</section>

<section class="listingsSection">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="listingsSectionHeader">
            <span class="listingsSectionLabel">Latest Jobs</span>
            <h2 class="listingsSectionTitle">Recent Listings</h2>
            <p class="listingsSectionSubtitle">
                Here are some of the recently posted job opportunities.
            </p>
        </div>

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

        <div class="showAllListingsWrap">
            <a href="/WS03/public/listings" class="showAllListingsLink">
                <span>Show All Jobs</span>
                <i class="fa fa-arrow-right"></i>
            </a>
        </div>
    </div>
</section>

<section class="container mx-auto max-w-6xl px-4 mb-16">
    <div class="postJobBanner">
        <div>
            <h2>Post a Job Opening</h2>
            <p>Share your job listing and reach more applicants.</p>
        </div>
        <a href="/WS03/public/listings/create" class="btn btnPrimary">
            <i class="fa fa-edit"></i>
            Post a Job
        </a>
    </div>
</section>

<?php loadPartial('footer'); ?>
