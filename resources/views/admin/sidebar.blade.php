 <aside class="main-sidebar sidebar-dark-primary elevation-4">

     <a href="index3.html" class="brand-link">
         <span class="brand-text font-weight-light">Data Pasien</span>
     </a>

     <div class="sidebar">
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
             <div class="image">
             <svg class="w-6 h-6" style='width:35px;height;35px;color:white'
             fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 13v-1m4 1v-3m4 3V8M8 21l4-4 4 4M3 4h18M4 4h16v12a1 1 0 01-1 1H5a1 1 0 01-1-1V4z"></path></svg>
     
             </div>
             <div class="info">
                 <a href="#" class="d-block">Puskesmas</a>
             </div>
         </div>

         <nav class="mt-2">
             <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
              data-accordion="false">
              <li class="nav-item">
                <a href="{{ route('dashboard.index')}}" class="nav-link{{ (request()->segment(1) == "admin") ? "active" : "" }}">
                    <i class="nav-icon fas fa-th"></i>
                    <p>
                        Graphic Perkembangan
                        
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{route('tambah.data')}}" class="nav-link{{ (request()->segment(1) == "category") ? "active" : "" }}">
                    <i class="nav-icon fas fa-tags"></i>
                    <p>
                        Input Data Kehamilan
                        
                    </p>
                </a>
            </li>
               
            <li class="nav-header">Setting</li>
            <li class="nav-item">
                <a href="{{ URL::to('logout') }}" class="nav-link">
                    <i class="nav-icon fas fa-circle text-danger"></i>
                    <p>
                        Logout
                        
                    </p>
                </a>
            </li>
                 
             </ul>
         </nav>         
     </div>
 </aside>