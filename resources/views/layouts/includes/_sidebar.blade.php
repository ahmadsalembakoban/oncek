<div id="sidebar-nav" class="sidebar">
    <div class="sidebar-scroll">
        <nav>
            <ul class="nav">
                <li><a href="/pswcase" class=""><i class="lnr lnr-home"></i> <span>Dashboard</span></a></li>
                <li><a href="/pswcase" class="{{ Request::is('pswcase') ? 'active' : ''}}"><i class="fa fa-database"></i> <span>Problem Case</span></a></li>
                <li><a href="/pswiplist" class="{{ Request::is('pswiplist') ? 'active' : '' }}"><i class="fa fa-database"></i> <span>IP Lists</span></a></li>
            </ul>
        </nav>
    </div>
</div>