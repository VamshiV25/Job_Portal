<div class="header_main">
            <div class="container-fluid">
               <div class="logo"><a href="index.html"><img src=""></a></div>
               <div class="menu_main">
                  <ul>
                     <li class="active"><a href="index.html">Home</a></li>
                     <li><a href="about.html">About</a></li>
                     @if(Route::has('login'))
                        @auth
                           <li>
                              <x-app-layout>
                              </x-app-layout>
                           </li>
                           <li>
                              <a href="{{url('create_post')}}">Create Post</a>
                           </li>
                           <li>
                              <a href="{{url('my_post')}}">My Post</a>
                           </li>
                           @else
                           <li><a href="{{route('login')}}">Login</a></li>
                           <li><a href="{{route('register')}}">Register</a></li>
                        @endauth
                     @endif
                  </ul>
               </div>
            </div>
         </div>