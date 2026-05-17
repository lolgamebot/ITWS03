<?php use Framework\Session; ?>

<header class="navHeader">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="navHeaderInner">
            <h1 class="siteLogo">
                <a href="/WS03/public/">
                    <span class="siteLogoText">Prosple</span>
                </a>
            </h1>

            <nav class="navLinks">
                <?php if (Session::has('user')): ?>
                <div style="display:flex; align-items:center; gap:1rem;">
                    <span class="navLink">Welcome, <?= htmlspecialchars(Session::get('user')['name']) ?></span>
                    <a href="/WS03/public/listings/create" class="btn btnPrimary postJobBtn">
                        <i class="fa fa-edit"></i>
                        <span>Post a Job</span>
                    </a>
                    <form method="POST" action="/WS03/public/logout">
                        <button type="submit" class="navLink" style="background:none; border:none; cursor:pointer; color:white;">
                            Logout
                        </button>
                    </form>
                </div>
                <?php else: ?>
                <a href="/WS03/public/login" class="navLink">Login</a>
                <a href="/WS03/public/register" class="navLink">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>
