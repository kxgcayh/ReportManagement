<aside class="left-sidebar">
    {{-- Sidebar scroll --}}
    <div class="scroll-sidebar">
        {{-- Sidebar navigation --}}
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">ReportMan</li>
                <li>
                    <a class="has-arrow" href="{{route('home') }}" aria-expanded="false"><i
                            class="mdi mdi-home-variant"></i>Dashboard</a>
                </li>
                <li>
                    <a class="has-arrow" href="{{route('reports.create') }}" aria-expanded="false"><i
                            class="mdi mdi-server-plus"></i>Create Report</a>
                </li>
                @role('Admin|Manager')
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-briefcase" flo></i><span
                            class="hide-menu">Data Master</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('brands.index') }}">Brand</a></li>
                        <li><a href="{{ route('categories.index') }}">Category</a></li>
                        <li><a href="{{ route('departements.index') }}">Departement</a></li>
                        <li><a href="{{ route('locations.index') }}">Location</a></li>
                        <li><a href="{{ route('machines.index') }}">Machine</a></li>
                        <li><a href="{{ route('products.index') }}">Product</a></li>
                        <li><a href="{{ route('productions.index') }}">Production</a></li>
                        <li><a href="{{ route('types.index') }}">Type</a></li>
                    </ul>
                </li>
                @endrole
                <li>
                    <a class="has-arrow" href="{{route('projects.index') }}" aria-expanded="false"><i
                            class="mdi mdi-folder-multiple"></i>Data Project</a>
                </li>
                <li>
                    <a class="has-arrow" href="{{route('reports.index') }}" aria-expanded="false"><i
                            class="mdi mdi-server-network"></i>Data Report</a>
                </li>
                <li>
                    <a href="#" aria-expanded="false"><i class="mdi mdi-account-settings-variant"></i>Account
                        Setting</a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('roles.index') }}">Role</a></li>
                        <li><a href="{{ route('users.index') }}">User</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
        {{-- End Sidebar navigation --}}
    </div>
    {{-- End Sidebar scroll --}}
</aside>
