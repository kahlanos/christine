<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
 <div class="container-fluid">
 <a class="navbar-brand" href="home">
      <img
        src="../view/img/logo.png"
        class="rounded-circle"
        height="50"
        alt="MDB Logo"
        loading="lazy"
      />
    </a>
  <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#main_nav"  aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
  <div class="collapse navbar-collapse" id="main_nav">
	

	<ul class="navbar-nav">
		<li class="nav-item active"> <a class="nav-link" href="home">Home </a> </li>
		<li class="nav-item"><a class="nav-link" href="contact"> Contacto </a></li>
		<li class="nav-item"><a class="nav-link" href="list"> Items </a></li>
		<li class="nav-item dropdown">
			<a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown">  Categorías  </a>
		    <ul class="dropdown-menu dropdown-menu-dark">
			  <li><a class="dropdown-item" href="#"> Dropdown item 1 </a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 2 &raquo; </a>
			  	 <ul class="submenu dropdown-menu dropdown-menu-dark">
				    <li><a class="dropdown-item" href="#">Submenu item 1</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 2</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 3 &raquo; </a>
				    	<ul class="submenu dropdown-menu dropdown-menu-dark">
						    <li><a class="dropdown-item" href="#">Multi level 1</a></li>
						    <li><a class="dropdown-item" href="#">Multi level 2</a></li>
						</ul>
				    </li>
				    <li><a class="dropdown-item" href="#">Submenu item 4</a></li>
				    <li><a class="dropdown-item" href="#">Submenu item 5</a></li>
				 </ul>
			  </li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 3 </a></li>
			  <li><a class="dropdown-item" href="#"> Dropdown item 4 </a>
		    </ul>
		</li>
	</ul>

	<ul class="navbar-nav ms-auto">
  <form class="d-flex input-group w-auto">
      <input
        type="search"
        class="form-control rounded"
        placeholder="Search"
        aria-label="Search"
        aria-describedby="search-addon"
      />
      <span class="input-group-text text-white border-0" id="search-addon">
        <i class="fas fa-search"></i>
      </span>
    </form>
		<li class="nav-item"><a class="nav-link" href="login"> Log in </a></li>
		<li class="nav-item"><a class="nav-link" href="signin"> Sign in </a></li>
		<li class="nav-item"><a class="nav-link" href="profile"> Profile </a></li>
	</ul>

  </div> <!-- navbar-collapse.// -->
 </div> <!-- container-fluid.// -->
</nav>