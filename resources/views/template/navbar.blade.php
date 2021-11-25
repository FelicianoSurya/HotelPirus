<div class="container-fluid" style="background-color:#e6370b;">
    <nav class="navbar">
    <nav class="navbar navbar-expand-lg navbar-light navbar-layer">
        <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0">
            <ul class="navbar-nav ml-auto text-center d-flex align-items-center">
                <li class="nav-item nav-item-left mx-5">
                    <a id="home" class="nav-link h3" href="{{ route('home') }}">Hotel Pirus</a>
                </li>
                <li class="nav-item nav-item-left mx-5 {{ Request::segment(1) === 'inventory' ? 'active' : '' }}">
                    <a id="inventory" class="nav-link h5" href="{{ route('inventory') }}">Inventory</a>
                </li>
                <li class="nav-item nav-item-right mx-5 {{ Request::segment(1) === 'purchasing' ? 'active' : '' }}">
                    <a id="purchasing" class="nav-link h5" href="{{ route('purchasing') }}">Purchasing</a>
                </li>
                <li class="nav-item nav-item-right mx-5 {{ Request::segment(1) === 'supplier' ? 'active' : '' }}">
                    <a id="supplier" class="nav-link h5" href="{{ route('supplier') }}">Supplier</a>
                </li>
            </ul>
        </div>  
    </nav>
    </nav>
</div>