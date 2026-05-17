<section class="heroSection">
    <div class="overlay"></div>

    <div class="container mx-auto heroContent">
        <div class="heroLabel">
            <i class="fa fa-briefcase"></i>
            Career Portal
        </div>

        <h2>Find a Job That Matches Your Skills</h2>
        <p>
            Browse opportunities from different companies and take the next step in your career journey.
        </p>

        <form method="GET" action="/WS03/public/listings/search" class="searchForm">
            <div class="searchInputGroup">
                <i class="fa fa-search"></i>
                <input type="text" name="keywords" placeholder="Job title or keyword" value="<?= htmlspecialchars($_GET['keywords'] ?? '') ?>" />
            </div>

            <div class="searchInputGroup">
                <i class="fa fa-location-dot"></i>
                <input type="text" name="location" placeholder="Location" value="<?= htmlspecialchars($_GET['location'] ?? '') ?>" />
            </div>

            <button class="btn btnPrimary searchSubmitBtn">
                <i class="fa fa-search"></i>
                Search Jobs
            </button>
        </form>

        <div class="heroStatsRow">
            <div class="heroStatCard">
                <strong>300+</strong>
                <span>Open Jobs</span>
            </div>
            <div class="heroStatCard">
                <strong>80+</strong>
                <span>Employers</span>
            </div>
            <div class="heroStatCard">
                <strong>5k+</strong>
                <span>Applicants</span>
            </div>
        </div>
    </div>
</section>
