<nav class="navbar navbar-expand-sm bg-light">
    <div class="container-fluid">
       <ul class="navbar-nav">
          <li class="nav-item">
            <a 
            class="nav-link {{ request()->is('/') ? 'active' : '' }}"
            href="/">Home</a>
          </li>
          <li class="nav-item">
            <a 
            class="nav-link {{ request()->is('about') ? 'active' : '' }}"
            href="/about">About</a>
          </li>
          <li class="nav-item">
            <a 
            class="nav-link {{ request()->is('Porfolio') ? 'active' : '' }}"
            href="/Porfolio">Porfolio</a>
          </li>
          <li class="nav-item">
            <a 
            class="nav-link {{ request()->is('Contact') ? 'active' : '' }}"
            href="/Contact">Contact</a>
          </li>
       </ul>
    </div>
</nav>
