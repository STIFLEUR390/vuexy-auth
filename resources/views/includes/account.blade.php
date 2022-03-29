<ul class="nav nav-pills mb-2">
    <!-- account -->
    <li class="nav-item">
        <a class="nav-link {{ currentRouteActive('profile') }}" href="{{ route('profile') }}">
            {{-- <i data-feather="user" class="font-medium-3 me-50"></i> --}}
            <i data-feather='user-check' class="font-medium-3 me-50"></i>
            <span class="fw-bold">@lang("Profile")</span>
        </a>
    </li>
    <!-- security -->
    <li class="nav-item">
        <a class="nav-link {{ currentRouteActive('profile.password') }}" href="{{ route('profile.password') }}">
            <i data-feather='key' class="font-medium-3 me-50"></i>
            <span class="fw-bold">@lang("Update Password")</span>
        </a>
    </li>
    <!-- billing and plans -->
    <li class="nav-item">
        <a class="nav-link {{ currentRouteActive('profile.f2A') }}" href="{{ route('profile.f2A') }}">
            <i data-feather="lock" class="font-medium-3 me-50"></i>
            <span class="fw-bold">@lang("Two Factor Authentication")</span>
        </a>
    </li>
    <!-- notification -->
    <li class="nav-item {{ currentRouteActive('profile.delete.account') }}">
        <a class="nav-link" href="{{ route('profile.delete.account') }}">
            <i data-feather='user-x' class="font-medium-3 me-50"></i>
            <span class="fw-bold">@lang("Delete Account")</span>
        </a>
    </li>
    {{-- <!-- connection -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('profile') }}">
            <i data-feather="link" class="font-medium-3 me-50"></i>
            <span class="fw-bold">Connections</span>
        </a>
    </li> --}}
</ul>
