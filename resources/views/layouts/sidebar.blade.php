<div class="sidebar" data-color="purple" data-background-color="white" data-image="../assets/img/sidebar-1.jpg">
    <!--
Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

Tip 2: you can also add an image using data-image tag-->
    <div class="logo">
        <a href="http://www.creative-tim.com" class="simple-text logo-normal">
            Creative Tim
        </a>
    </div>
    <div class="sidebar-wrapper">
        <ul class="nav">
            <li class="nav-item active ">
                <a class="nav-link" href="{{route('customAdmin.index')}}">
                    <i class="material-icons">dashboard</i>
                    <p>Dashboard</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('customAdmin.yayinevi.index')}}">
                    <i class="material-icons">person</i>
                    <p>Publishers</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('customAdmin.yazar.index')}}">
                    <i class="material-icons">content_paste</i>
                    <p>Authors</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('customAdmin.kateqori.index')}}">
                    <i class="material-icons">library_books</i>
                    <p>Categories</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('customAdmin.kitab.index')}}">
                    <i class="material-icons">bubble_chart</i>
                    <p>Books</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="{{route('customAdmin.slider.index')}}">
                    <i class="material-icons">location_ons</i>
                    <p>Sliders</p>
                </a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="../examples/notifications.html">
                    <i class="material-icons">notifications</i>
                    <p>Notifications</p>
                </a>
            </li>
            <li class="nav-item active-pro">
                <a class="nav-link" href="../examples/upgrade.html">
                    <i class="material-icons">unarchive</i>
                    <p>Upgrade to PRO</p>
                </a>
            </li>
        </ul>
    </div>
</div>