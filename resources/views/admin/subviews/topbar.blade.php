<div class="top-bar color-scheme-light">
    {{-- START - Top Menu Controls  --}}
    <div class="top-menu-controls">
        <div class="element-search autosuggest-search-activator">
            <input placeholder="Start typing to search..." type="text" />
        </div>

        {{-- START - User avatar and menu in secondary top menu --}}
        <div class="logged-user-w">
            <div class="logged-user-i">
                <div class="avatar-w">
                    @if (Auth::check())
                    @if (Auth::user()->avatar)
                    <img src="{{ asset("uploads/".Auth::user()->avatar) }}" class="input-preview img-responsive">
                    @else
                    <img src="{{ asset('images/default/no-image.jpg') }}" class="input-preview img-responsive">
                    @endif
                    @endif
                </div>
                <div class="logged-user-menu color-style-bright">
                    <div class="logged-user-avatar-info">
                        <div class="avatar-w">
                            @if (Auth::check())
                            @if (Auth::user()->avatar)
                            <img src="{{ asset("uploads/".Auth::user()->avatar) }}"
                                class="input-preview img-responsive">
                            @else
                            <img src="{{ asset('images/default/no-image.jpg') }}" class="input-preview img-responsive">
                            @endif
                            @endif
                        </div>
                        <div class="logged-user-info-w">
                            @if (Auth::check())
                            <div class="logged-user-name">
                                @if (Auth::check())
                                {{ Auth::user()->name }}
                                @endif
                            </div>
                            @endif
                            @if (Auth::check())
                            <div class="logged-user-role">
                                @if (Auth::check())
                                @if (Auth::user()->role == "admin")
                                Admin
                                @elseif (Auth::user()->role == "super_admin")
                                Super Admin
                                @endif
                                @endif
                            </div>
                            @endif
                        </div>
                    </div>
                    <div class="bg-icon">
                        <i class="os-icon os-icon-wallet-loaded"></i>
                    </div>
                    <ul>
                        @if (Auth::check())
                            <li>
                                @if (Auth::check())
                                    <a href="{{url('admin/user',Auth::user()->id)}}">
                                        <i class="os-icon os-icon-user-male-circle2"></i><span>Profile</span>
                                    </a>
                                @endif
                            </li>
                            <li>
                                <a href="{{ url('/logout') }}">
                                    <i class="os-icon os-icon-signs-11"></i><span>Logout</span>
                                </a>
                            </li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
        {{-- END - User avatar and menu in secondary top menu --}}
    </div>
    {{-- END - Top Menu Controls --}}
</div>
