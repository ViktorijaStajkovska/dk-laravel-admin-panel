
<button data-drawer-target="separator-sidebar" data-drawer-toggle="separator-sidebar" aria-controls="separator-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ml-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
   <span class="sr-only">Open sidebar</span>
   <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
      <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
   </svg>
</button>
           <aside id="separator-sidebar"
               class="fixed top-0 left-0 z-40 h-screen transition-transform -translate-x-full sm:translate-x-0"
               aria-label="Sidebar">
               <div class="h-full pl-3 pr-10 py-4 overflow-y-auto bg-zinc-900 ">
                   <ul class="space-y-2 font-medium text-zinc-50">
                       <li>
                           <a href="{{route('dashboard')}}"
                               class="flex items-center p-2 text-zinc-50 rounded-lg  hover:bg-gray-100 hover:text-gray-700 ">
                               <i class="fa-solid fa-house"></i>
                               <span class="ml-3">Dashboard</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('blogs.index')}}" id="blog-posts"
                               class="flex items-center p-2 text-zinc-50 rounded-lg  hover:bg-gray-100 hover:text-gray-700 ">
                               <i class="fa-solid fa-address-card"></i>
                               <span class="flex-1 ml-3 whitespace-nowrap">Blog posts</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('videos.index')}}"
                               class="flex items-center p-2 text-zinc-50 rounded-lg  hover:bg-gray-100 hover:text-gray-700 ">
                               <i class="fa-solid fa-photo-film"></i>
                               <span class="flex-1 ml-3 whitespace-nowrap">Videos</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('partners.index')}}"
                               class="flex items-center p-2 text-zinc-50 rounded-lg  hover:bg-gray-100 hover:text-gray-700 ">
                               <i class="fa-solid fa-handshake"></i>
                               <span class="flex-1 ml-3 whitespace-nowrap">Partners</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('applications.index')}}"
                               class="flex items-center p-2 text-zinc-50 rounded-lg hover:bg-gray-100 hover:text-gray-700">
                               <i class="fa-solid fa-chalkboard-user"></i>
                               <span class="flex-1 ml-3 whitespace-nowrap">Applications</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('volunteers.index')}}"
                               class="flex items-center p-2 text-zinc-50 rounded-lg hover:bg-gray-100 hover:text-gray-700 ">
                               <i class="fa-solid fa-handshake-angle"></i>
                               <span class="flex-1 ml-3 whitespace-nowrap">Volunteer</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('contacts.index')}}"
                               class="flex items-center p-2 text-zinc-50 rounded-lg  hover:text-gray-700 hover:bg-gray-100 ">
                               <i class="fa-solid fa-square-phone"></i>
                               <span class="flex-1 ml-3 whitespace-nowrap">Contacts</span>
                           </a>
                       </li>
                       <li>
                           <a href="{{route('donations.index')}}"
                               class="flex items-center p-2 text-zinc-50 rounded-lg  hover:text-gray-700 hover:bg-gray-100 ">
                               <i class="fa-solid fa-hand-holding-medical"></i>
                               <span class="flex-1 ml-3 whitespace-nowrap">Donations</span>
                           </a>
                       </li>
                   </ul>
                   <nav x-data="{ open: false }" >
                       <!-- Primary Navigation Menu -->
                   
                               
                                   <x-profile-logout align="right" width="48" >
                                       <x-slot name="content" >
                                           <x-dropdown-link :href="route('profile.edit')"
                                           class="flex items-center p-2 text-zinc-50 rounded-lg  hover:text-gray-700 hover:bg-gray-100 ">
                                           <i class="fa-solid fa-user pr-2"></i>
                                               {{ __('Profile') }}
                                           </x-dropdown-link>
    
                                           <!-- Authentication -->
                                           <form method="POST" action="{{ route('logout') }}">
                                               @csrf
    
                                               <x-dropdown-link :href="route('logout')" onclick="event.preventDefault();
                                                    this.closest('form').submit();"
                                                   class="flex items-center p-2 text-zinc-50 rounded-lg  hover:text-gray-700 hover:bg-gray-100 ">
                                                   <i class="fa-solid fa-right-from-bracket pr-2"></i>
                                                   {{ __('Log Out') }}
                                               </x-dropdown-link>
                                           </form>
                                       </x-slot>
                                   </x-profile-logout>
                               
                     
    
                       <!-- Responsive Navigation Menu -->
                       <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
                           <div class="pt-2 pb-3 space-y-1">
                               <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                                   {{ __('Dashboard') }}
                               </x-responsive-nav-link>
                           </div>
    
                           <!-- Responsive Settings Options -->
                           <div class="pt-4 pb-1 border-t border-gray-200">
                               <div class="px-4">
                                   <div class="font-medium text-base text-gray-800">{{ Auth::user()->name }}</div>
                                   <div class="font-medium text-sm text-gray-500">{{ Auth::user()->email }}</div>
                               </div>
    
                               <div class="mt-3 space-y-1">
                                   <x-responsive-nav-link :href="route('profile.edit')">
                                       {{ __('Profile') }}
                                   </x-responsive-nav-link>
    
                                   <!-- Authentication -->
                                   <form method="POST" action="{{ route('logout') }}">
                                       @csrf
    
                                       <x-responsive-nav-link :href="route('logout')" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                                           {{ __('Log Out') }}
                                       </x-responsive-nav-link>
                                   </form>
                               </div>
                           </div>
                       </div>
                   </nav>
               </div>
           </aside>

     