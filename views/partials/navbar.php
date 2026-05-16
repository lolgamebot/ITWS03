<?php use Framework\Session; ?>

<header class="site-header">
    <div class="container mx-auto max-w-6xl px-4">
        <div class="header-inner">
            <h1 class="brand">
                <a href="/WS03/public/">
                    <span class="brand-text">Prosple</span>
                </a>
            </h1>

            <nav class="main-nav">
                <?php if (Session::has('user')): ?>
                <div style="display:flex; align-items:center; gap:1rem;">
                    <span class="nav-link">Welcome, <?= htmlspecialchars(Session::get('user')['name']) ?></span>
                    <a href="/WS03/public/listings/create" class="btn btn-primary nav-cta">
                        <i class="fa fa-edit"></i>
                        <span>Post a Job</span>
                    </a>
                    <form method="POST" action="/WS03/public/logout">
                        <button type="submit" class="nav-link" style="background:none; border:none; cursor:pointer; color:white;">
                            Logout
                        </button>
                    </form>
                </div>
                <?php else: ?>
                <a href="/WS03/public/login" class="nav-link">Login</a>
                <a href="/WS03/public/register" class="nav-link">Register</a>
                <?php endif; ?>
            </nav>
        </div>
    </div>
</header>