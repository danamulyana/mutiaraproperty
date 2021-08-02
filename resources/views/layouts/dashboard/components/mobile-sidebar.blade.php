<div class="mobile-menu md:hidden">
    <div class="mobile-menu-bar">
        <a href="" class="flex mr-auto">
            <img alt="" class="w-40" src="{{ asset('assets/img/Mutiara Property Putih.png') }}">
        </a>
        <a href="javascript:;" id="mobile-menu-toggler"> <i data-feather="bar-chart-2" class="w-8 h-8 text-white transform -rotate-90"></i> </a>
    </div>
    {{-- <ul class="border-t border-theme-29 py-5 hidden">
        <li>
            <a href="{{ route('dashboard') }}" class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu {{ request()->routeIs('home.edit') || request()->routeIs('home.slider') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title">
                    Home
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ request()->routeIs('home.edit') || request()->routeIs('home.slider') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('home.edit') }}" class="menu {{ request()->routeIs('home.edit') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Home edit</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.slider') }}" class="menu {{ request()->routeIs('home.slider') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="layers"></i> </div>
                        <div class="menu__title"> Home slider </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu {{request()->routeIs('posts') || request()->routeIs('category')  || request()->routeIs('category.add') || request()->routeIs('category.edit') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="menu__title">
                    News
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('posts') || request()->routeIs('category') || request()->routeIs('category.add') || request()->routeIs('category.edit') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('posts') }}" class="menu {{ request()->routeIs('posts') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> News </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category') }}" class="menu {{ request()->routeIs('category') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Category </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu {{request()->routeIs('discovers') || request()->routeIs('discovers.list') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title">
                    Discovers
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('discovers') || request()->routeIs('discovers.list') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('discovers') }}" class="menu {{ request()->routeIs('discovers') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Discover </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('discovers.list') }}" class="menu {{ request()->routeIs('discovers.list') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> discover List </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu {{request()->routeIs('explores') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="globe"></i> </div>
                <div class="menu__title">
                    Explore Products
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('explores') ||  request()->routeIs('products') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('explores') }}" class="menu {{ request()->routeIs('explores') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Explore </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}" class="menu {{ request()->routeIs('products') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Product </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('chat.admin') }}" class="menu {{ request()->routeIs('chat.admin') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="menu__title"> Chat </div>
            </a>
        </li> 
        admin menus add
        @if (Auth::user()->role_id === 1)
        <li>
            <a href="{{ route('setting') }}" class="menu {{ request()->routeIs('setting') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="settings"></i> </div>
                <div class="menu__title"> Settings Site </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Users </div> 
            </a>
        </li>  
        @endif
    </ul> --}}
    <ul class="border-t border-theme-29 py-5 hidden">
        <li>
            <a href="{{ route('dashboard') }}" class="menu {{ request()->routeIs('dashboard') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="home"></i> </div>
                <div class="menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="menu {{ request()->routeIs('home.edit') || request()->routeIs('home.slider') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title">
                    Home
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ request()->routeIs('home.edit') || request()->routeIs('home.slider') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('home.edit') }}" class="menu {{ request()->routeIs('home.edit') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Home edit</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.slider') }}" class="menu {{ request()->routeIs('home.slider') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="layers"></i> </div>
                        <div class="menu__title"> Home slider </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu {{request()->routeIs('posts') || request()->routeIs('category')  || request()->routeIs('category.add') || request()->routeIs('category.edit') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="menu__title">
                    News
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('posts') || request()->routeIs('category') || request()->routeIs('category.add') || request()->routeIs('category.edit') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('posts') }}" class="menu {{ request()->routeIs('posts') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> News </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category') }}" class="menu {{ request()->routeIs('category') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Category </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('promos') }}" class="menu {{ request()->routeIs('promos') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="volume-2"></i> </div>
                <div class="menu__title"> Promo </div>
            </a>
        </li> 
        <li>
            <a href="javascript:;" class="menu {{request()->routeIs('discovers') || request()->routeIs('discovers.list') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="box"></i> </div>
                <div class="menu__title">
                    Discovers
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('discovers') || request()->routeIs('discovers.list') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('discovers') }}" class="menu {{ request()->routeIs('discovers') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Discover </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('discovers.list') }}" class="menu {{ request()->routeIs('discovers.list') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> discover List </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="menu {{request()->routeIs('explores') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="globe"></i> </div>
                <div class="menu__title">
                    Explore Products
                    <div class="menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('explores') ||  request()->routeIs('products') ? 'menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('explores') }}" class="menu {{ request()->routeIs('explores') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Explore </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}" class="menu {{ request()->routeIs('products') ? 'menu--active' : '' }}">
                        <div class="menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="menu__title"> Product </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('chat.admin') }}" class="menu {{ request()->routeIs('chat.admin') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="menu__title"> Chat </div>
            </a>
        </li> 
        <li>
            <a href="{{ route('datapengunjung') }}" class="menu {{ request()->routeIs('datapengunjung') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="users"></i> </div>
                <div class="menu__title"> Data Pengunjung </div>
            </a>
        </li> 
        <li>
            <a href="{{ route('datasubscribers') }}" class="menu {{ request()->routeIs('datasubscribers') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="mail"></i> </div>
                <div class="menu__title"> Subscriber </div>
            </a>
        </li> 
        {{-- admin menus add --}}
        @if (Auth::user()->role_id === 1)
        <li>
            <a href="{{ route('setting') }}" class="menu {{ request()->routeIs('setting') ? 'menu--active' : '' }}">
                <div class="menu__icon"> <i data-feather="settings"></i> </div>
                <div class="menu__title"> Settings Site </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}" class="menu">
                <div class="menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="menu__title"> Users </div> 
            </a>
        </li>  
        @endif
    </ul>
</div>