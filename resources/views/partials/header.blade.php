<div class="nk-header nk-header-fixed is-light">
    <div class="container-fluid">
        <div class="nk-header-wrap">
            <div class="nk-header-tools">
                <ul class="nk-quick-nav">

                    <li class="dropdown user-dropdown">
                        <a href="#" class="dropdown-toggle" data-bs-toggle="dropdown">
                            <div class="user-toggle">
                                <div class="user-info d-none d-md-block">
                                    <div class="user-status">{{ auth()->user()->firstname }}</div>
                                    <div class="user-name dropdown-indicator">{{ auth()->user()->email }}</div>
                                </div>
                            </div>
                        </a>

                        <div class="dropdown-menu dropdown-menu-md dropdown-menu-end dropdown-menu-s1">
                            <div class="dropdown-inner user-card-wrap bg-lighter d-none d-md-block">
                                <div class="user-card">
                                    <div class="user-info">
                                        <span class="lead-text">{{ auth()->user()->name }}</span>
                                        <span class="sub-text">{{ auth()->user()->email }}</span>
                                    </div>
                                </div>
                            </div>

                            <div class="dropdown-inner">
                                <ul class="link-list">
                                    <li><a href=""><em class="icon ni ni-user-alt"></em><span>View Profile</span></a></li>
                                </ul>
                                <ul class="link-list">
                                    <form action="" method="post">
                                        <button type="submit" class="btn btn-success">Deconnexion</button>
                                    </form>
                                </ul>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>