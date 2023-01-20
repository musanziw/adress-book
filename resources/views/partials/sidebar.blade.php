<div class="nk-sidebar nk-sidebar-fixed " data-content="sidebarMenu">
    <div class="nk-sidebar-element">
        <div class="nk-sidebar-body" data-simplebar>
            <div class="nk-sidebar-content">
                <div class="nk-sidebar-menu">
                    <ul class="nk-menu">
                        <li class="nk-menu-heading">
                            <h6 class="overline-title text-primary-alt">Maadini carnet d'adresse</h6>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('dashboard') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-grid-alt"></em></span>
                                <span class="nk-menu-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('contacts.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-user"></em></span>
                                <span class="nk-menu-text">Gérer mes contacts</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{ route('groups.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-users"></em></span>
                                <span class="nk-menu-text">Gérer mes groupes</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{ route('messages.index') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-file-docs"></em></span>
                                <span class="nk-menu-text">Mes messages</span>
                            </a>
                        </li>

                        <li class="nk-menu-item">
                            <a href="{{ route('message.send-group-message') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-emails"></em></span>
                                <span class="nk-menu-text">Message de groupe</span>
                            </a>
                        </li>
                        <li class="nk-menu-item">
                            <a href="{{ route('message.send-contact-message') }}" class="nk-menu-link">
                                <span class="nk-menu-icon"><em class="icon ni ni-mail"></em></span>
                                <span class="nk-menu-text">Message privé</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>