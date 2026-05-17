<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="errorPage">
    <div class="errorPageWrapper">
        <div class="errorCard">
            <div class="errorIconWrapper">
                <div class="errorIconPulse">
                    <i class="fa fa-exclamation-circle"></i>
                </div>
            </div>

            <span class="errorCodeBadge">Error 404</span>
            <h1 class="errorTitle">Page Not Found</h1>
            <p class="errorMessage">
                Sorry, the page you are looking for could not be found.
            </p>

            <div class="errorButtons">
                <a href="/WS03/public/" class="btn btnPrimary">
                    <i class="fa fa-house"></i>
                    Back to Home
                </a>

                <a href="/WS03/public/listings" class="btn btnSecondary">
                    <i class="fa fa-briefcase"></i>
                    Browse Jobs
                </a>
            </div>
        </div>
    </div>
</section>

<?php loadPartial('footer'); ?>
