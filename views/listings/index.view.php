<?php
loadPartial('head');
loadPartial('navbar');
?>

<section class="jobs-section">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="jobs-section-header">
            <span class="jobs-section-badge">All Opportunities</span>
            <h1 class="jobs-section-title">Browse All Jobs</h1>
            <p class="jobs-section-subtitle">
                Explore available openings across engineering, design, marketing, and data roles.
            </p>
        </div>

        <div class="jobs-grid">
            <?php foreach ($listings as $listing): ?>
            <article class="job-card">
                <div class="job-card-content">
                    <div class="job-card-top">
                        <span class="job-card-category"><?= htmlspecialchars($listing['company']) ?></span>
                        <span class="job-badge"><?= htmlspecialchars($listing['city']) ?></span>
                    </div>

                    <h3 class="job-card-title"><?= htmlspecialchars($listing['title']) ?></h3>
                    <p class="job-card-description"><?= htmlspecialchars($listing['description']) ?></p>

                    <div class="job-card-meta">
                        <div class="job-meta-row">
                            <span class="job-meta-label">Salary</span>
                            <span class="job-salary"><?= htmlspecialchars($listing['salary']) ?></span>
                        </div>
                        <div class="job-meta-row">
                            <span class="job-meta-label">Location</span>
                            <span class="job-location"><?= htmlspecialchars($listing['city']) ?>, <?= htmlspecialchars($listing['state']) ?></span>
                        </div>
                        <div class="job-meta-row job-tags-row">
                            <span class="job-meta-label">Tags</span>
                            <div class="job-tags">
                                <span class="job-tag"><?= htmlspecialchars($listing['requirements']) ?></span>
                            </div>
                        </div>
                    </div>

                    <a href="/WS03/Public/listings/<?= $listing['id'] ?>" class="job-details-btn">View Details</a>
                </div>
            </article>
            <?php endforeach; ?>
        </div>

        <div class="back-link-wrap">
            <a href="/WS03/Public/" class="back-link">
                <i class="fa fa-arrow-left"></i>
                <span>Back to Home</span>
            </a>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>