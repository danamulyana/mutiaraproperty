<nav class="side-nav">
    <a href="" class="intro-x flex items-center pl-5 pt-4">
        <img alt="Rubick Tailwind HTML Admin Template" class="w-40" src="{{ asset('assets/img/Mutiara Property Putih.png') }}">
    </a>
    <div class="side-nav__devider my-6"></div>
    <ul>
        <li>
            <a href="{{ route('dashboard') }}" class="side-menu {{ request()->routeIs('dashboard') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="home"></i> </div>
                <div class="side-menu__title"> Dashboard </div>
            </a>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{ request()->routeIs('home.edit') || request()->routeIs('home.slider') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Home
                    <div class="side-menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{ request()->routeIs('home.edit') || request()->routeIs('home.slider') ? 'side-menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('home.edit') }}" class="side-menu {{ request()->routeIs('home.edit') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Home edit</div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('home.slider') }}" class="side-menu {{ request()->routeIs('home.slider') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="layers"></i> </div>
                        <div class="side-menu__title"> Home slider </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{request()->routeIs('posts') || request()->routeIs('category')  || request()->routeIs('category.add') || request()->routeIs('category.edit') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="file-text"></i> </div>
                <div class="side-menu__title">
                    News
                    <div class="side-menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('posts') || request()->routeIs('category') || request()->routeIs('category.add') || request()->routeIs('category.edit') ? 'side-menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('posts') }}" class="side-menu {{ request()->routeIs('posts') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> News </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('category') }}" class="side-menu {{ request()->routeIs('category') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Category </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('promos') }}" class="side-menu {{ request()->routeIs('promos') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="volume-2"></i> </div>
                <div class="side-menu__title"> Promo </div>
            </a>
        </li> 
        <li>
            <a href="javascript:;" class="side-menu {{request()->routeIs('discovers') || request()->routeIs('discovers.list') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="box"></i> </div>
                <div class="side-menu__title">
                    Discovers
                    <div class="side-menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('discovers') || request()->routeIs('discovers.list') ? 'side-menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('discovers') }}" class="side-menu {{ request()->routeIs('discovers') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Discover </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('discovers.list') }}" class="side-menu {{ request()->routeIs('discovers.list') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> discover List </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="javascript:;" class="side-menu {{request()->routeIs('explores') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="globe"></i> </div>
                <div class="side-menu__title">
                    Explore Products
                    <div class="side-menu__sub-icon "> <i data-feather="chevron-down"></i> </div>
                </div>
            </a>
            <ul class="{{request()->routeIs('explores') ||  request()->routeIs('products') ? 'side-menu__sub-open' : ''}}">
                <li>
                    <a href="{{ route('explores') }}" class="side-menu {{ request()->routeIs('explores') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Explore </div>
                    </a>
                </li>
                <li>
                    <a href="{{ route('products') }}" class="side-menu {{ request()->routeIs('products') ? 'side-menu--active' : '' }}">
                        <div class="side-menu__icon"> <i data-feather="activity"></i> </div>
                        <div class="side-menu__title"> Product </div>
                    </a>
                </li>
            </ul>
        </li>
        <li>
            <a href="{{ route('chat.admin') }}" class="side-menu {{ request()->routeIs('chat.admin') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="message-square"></i> </div>
                <div class="side-menu__title"> Chat </div>
            </a>
        </li> 
        <li>
            <a href="{{ route('datapengunjung') }}" class="side-menu {{ request()->routeIs('datapengunjung') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="users"></i> </div>
                <div class="side-menu__title"> Data Pengunjung </div>
            </a>
        </li> 
        <li>
            <a href="{{ route('datasubscribers') }}" class="side-menu {{ request()->routeIs('datasubscribers') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="mail"></i> </div>
                <div class="side-menu__title"> Subscriber </div>
            </a>
        </li> 
        {{-- admin menus add --}}
        @if (Auth::user()->role_id === 1)
        <li>
            <a href="{{ route('setting') }}" class="side-menu {{ request()->routeIs('setting') ? 'side-menu--active' : '' }}">
                <div class="side-menu__icon"> <i data-feather="settings"></i> </div>
                <div class="side-menu__title"> Settings Site </div>
            </a>
        </li>
        <li>
            <a href="{{ route('admin.users') }}" class="side-menu">
                <div class="side-menu__icon"> <i data-feather="hard-drive"></i> </div>
                <div class="side-menu__title"> Users </div> 
            </a>
        </li>  
        @endif
    </ul>
</nav>