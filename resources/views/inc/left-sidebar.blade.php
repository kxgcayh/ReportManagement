<aside class="left-sidebar">
    {{-- Sidebar scroll --}}
    <div class="scroll-sidebar">
        {{-- Sidebar navigation --}}
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">ReportMan</li>
                <li>
                    {{-- <a class="has-arrow" href="{{route('home') }}" aria-expanded="false"><i class="mdi mdi-gauge"></i>Home</a> --}}
                </li>
                <li>
                    <a class="has-arrow " href="#" aria-expanded="false">
                        <i class="mdi mdi-bullseye"></i>
                        <span class="hide-menu">Data Master</span>
                    </a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('location.index')  }}">Location</a></li>
                        {{-- <li><a href="{{ route('roles.index') }}">Role</a></li> --}}
                        {{-- <li><a href="{{ route('products.index') }}">Product</a></li> --}}
                    </ul>
                </li>
            </ul>
        </nav>
        {{-- End Sidebar navigation --}}
    </div>
    {{-- End Sidebar scroll --}}
</aside>
