<nav class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu" aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu" aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }} d-flex align-items-center gap-2" aria-current="page" href="/">
                        <svg class="bi"><use xlink:href="#house-fill"/></svg>
                        Dashboard
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/user*') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard/user">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Master User
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/kategori*') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard/kategori">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Master Kategori
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/produk*') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard/produk">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Master Produk
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/order*') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard/order">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Master Order
                    </a>
                </li>
                {{-- <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/contact*') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard/contact">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Master Contact
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/address*') ? 'active' : '' }} d-flex align-items-center gap-2" href="/dashboard/address">
                        <svg class="bi"><use xlink:href="#file-earmark"/></svg>
                        Master Address
                    </a>
                </li> --}}
            </ul>
        </div>
    </div>
</nav>