<?php loadPartial('head'); ?>
<?php loadPartial('navbar'); ?>

<section class="errorPage">
    <div class="errorPageWrapper">
        <div class="errorCard">
            <div class="errorIconWrapper">
                <div class="errorIconPulse">
                    <i class="fa fa-lock"></i>
                </div>
            </div>

            <span class="errorCodeBadge">
                <i class="fa fa-ban"></i>
                Error 403
            </span>

            <h1 class="errorTitle">Access Denied</h1>

            <p class="errorMessage">
                You do not have permission to access this page. It may be restricted,
                require authentication, or need additional privileges.
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
