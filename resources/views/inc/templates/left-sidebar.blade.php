<aside class="left-sidebar">
    {{-- Sidebar scroll --}}
    <div class="scroll-sidebar">
        {{-- Sidebar navigation --}}
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <li class="nav-small-cap">ReportMan</li>
                <li>
                    <a class="has-arrow" href="{{route('home') }}" aria-expanded="false"><i
                            class="mdi mdi-home-variant"></i>Beranda</a>
                </li>
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-bullseye" flo></i><span
                            class="hide-menu">Data User</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('users.index')  }}">User</a></li>
                        <li><a href="{{ route('roles.index') }}">Role</a></li>
                    </ul>
                </li>
                @unlessrole('User')
                <li>
                    <a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-bullseye" flo></i><span
                            class="hide-menu">Data Master</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ route('brands.index') }}">Brand</a></li>
                        <li><a href="{{ route('productions.index') }}">Production</a></li>
                        <li><a href="{{ route('departements.index') }}">Departement</a></li>
                        <li><a href="{{ route('locations.index') }}">Location</a></li>
                        <li><a href="{{ route('types.index') }}">Type</a></li>
                        <li><a href="{{ route('categories.index') }}">Category</a></li>
                        <li><a href="{{ route('projects.index') }}">Project</a></li>
                        <li><a href="{{ route('reports.index') }}">Report</a></li>
                    </ul>
                </li>
                @endunlessrole
            </ul>
        </nav>
        {{-- End Sidebar navigation --}}
    </div>
    {{-- End Sidebar scroll --}}
</aside>
