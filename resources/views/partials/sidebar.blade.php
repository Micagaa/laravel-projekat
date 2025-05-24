<!-- Sidebar meni (Bootstrap 5 offcanvas) -->
<div class="offcanvas offcanvas-start" tabindex="-1" id="sidebarNav" aria-labelledby="sidebarNavLabel">
    <div class="offcanvas-header">
        <h5 class="offcanvas-title" id="sidebarNavLabel">Navigacija</h5>
        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Zatvori"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="list-unstyled">
            <li><a href="{{ route('home') }}" class="nav-link">Početna</a></li>
            <li><a href="{{ route('katalog') }}" class="nav-link">Katalog</a></li>
            <li><a href="{{ route('lokacije') }}" class="nav-link">Lokacije</a></li>
            <li><a href="{{ route('kontakt') }}" class="nav-link">Kontakt</a></li>
        </ul>
    </div>
</div>
