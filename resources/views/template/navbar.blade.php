<div class="container-fluid" style="background-color:#e6370b;">
    <nav class="navbar p-0">
        <nav class="navbar navbar-expand-lg navbar-light navbar-layer p-0">
            <div class="navbar-collapse collapse w-100 dual-collapse2 order-1 order-md-0 d-flex justify-content-between">
                <ul class="navbar-nav text-center d-flex align-items-center">
                    <li class="nav-item nav-item-left px-2 my-0 d-flex align-items-center">
                        <a id="home" class="nav-link m-0 h3" href="{{ route('home') }}">Hotel Pirus</a>
                    </li>
                    <li class="nav-item nav-item-left px-2 my-0 d-flex align-items-center {{ Request::segment(1) === 'inventory' ? 'active' : '' }}">
                        <a id="inventory" class="nav-link m-0 h5" href="{{ route('inventory') }}">Inventory</a>
                    </li>
                    <li class="nav-item nav-item-right px-2 my-0 d-flex align-items-center {{ Request::segment(1) === 'purchasing' ? 'active' : '' }}">
                        <a id="purchasing" class="nav-link m-0 h5" href="{{ route('purchasing') }}">Purchasing</a>
                    </li>
                    <li class="nav-item nav-item-right px-2 my-0 d-flex align-items-center {{ Request::segment(1) === 'supplier' ? 'active' : '' }}">
                        <a id="supplier" class="nav-link m-0 h5" href="{{ route('supplier') }}">Supplier</a>
                    </li>
                    <li class="nav-item nav-item-right px-2 my-0 d-flex align-items-center {{ Request::segment(1) === 'supplier' ? 'active' : '' }}">
                        <a id="supplier" class="nav-link m-0 h5" href="{{ route('kategori') }}">Kode Kategori</a>
                    </li>
                </ul>
                <ul class="nav navbar-nav navbar-right d-flex align-items-center p-0 pr-3">
                    <li class="nav-item not-active nav-item-right mx-2 my-0 h5 px-2 my-0 d-flex align-items-center">{{ session('user')['name'] }}</li>
                    <li class="nav-item nav-item-right mx-4 my-0 h5 px-2 my-0 d-flex align-items-center">
                        <div class="dropdown"> 
                            <div id="dropdownToggle" class="js-scroll-trigger" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <a id="admin" class="nav-link">Admin</a>
                            </div>
                            <div id="dropdownMenu" class="dropdown-menu py-0" aria-labelledby="dropdownMenuButton">
                                <a class="dropdown-item py-3" href="{{ route('pageEdit') }}">Edit</a>
                                <a class="dropdown-item py-3" href="{{ route('pageAdd') }}">Tambah</a>
                                <a class="dropdown-item py-3" href="{{ route('logout') }}">Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
            </div> 
        </nav>
    </nav>
</div>