 <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
     <div class="app-brand demo mb-3">
         <a href="./" class="app-brand-link">
             <span class="app-brand-logo demo">
                 <img src="../static/images/logo/logo.png" alt="" width="70px" height="50px">
             </span>
             <span class="app-brand-text demo menu-text fw-bolder ms-2">Al-Huda</span>
         </a>

         <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
             <i class="bx bx-chevron-left bx-sm align-middle"></i>
         </a>
     </div>

     <div class="menu-inner-shadow"></div>

     <ul class="menu-inner py-1">
         <!-- Dashboard -->
         <li class="menu-item <?= basename($_SERVER['REQUEST_URI']) === "administrator" ? "active" : null ?>">
             <a href="./" class="menu-link">
                 <i class="menu-icon tf-icons bx bx-home-circle"></i>
                 <div data-i18n="Analytics">Dashboard</div>
             </a>
         </li>
         <li class="menu-header small text-uppercase">
             <span class="menu-header-text">Pages</span>
         </li>
         <li class="menu-item <?= (basename($_SERVER['REQUEST_URI']) === "banners") || (basename($_SERVER['REQUEST_URI']) === "management") || (basename($_SERVER['REQUEST_URI']) === "testimonials") ? "active open" : null ?>">
             <a href="javascript:void(0);" class="menu-link menu-toggle">
                 <i class="menu-icon tf-icons bx bxs-cog"></i>
                 <div data-i18n="Account Settings">Settings</div>
             </a>
             <ul class="menu-sub ">
                 <li class="menu-item <?= (basename($_SERVER['REQUEST_URI']) === "banners") ? "active" : null ?>">
                     <a href="./banners" class="menu-link">
                         <div data-i18n="Account">Banners</div>
                     </a>
                 </li>
                 <li class="menu-item <?= (basename($_SERVER['REQUEST_URI']) === "management") ? "active" : null ?>">
                     <a href="./management" class="menu-link">
                         <div data-i18n="Notifications">Management</div>
                     </a>
                 </li>
                 <li class="menu-item <?= (basename($_SERVER['REQUEST_URI']) === "testimonials") ? "active" : null ?>">
                     <a href="./testimonials.php" class="menu-link">
                         <div data-i18n="Connections">Testimonials</div>
                     </a>
                 </li>
             </ul>
         </li>
     </ul>
 </aside>