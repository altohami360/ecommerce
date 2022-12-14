<header class="section-header">	
	<section class="header-main bg-white">
		<div class="container">
			<div class="row gy-3 align-items-center">
				<div class="col-lg-2 col-sm-4 col-4">
					<a href="{{ route('home') }}" class="navbar-brand">
						<h2>Laravel</h2>
					</a> 
				</div>
				<div class="order-lg-last col-lg-5 col-sm-8 col-8">
					<div class="float-end">
						@guest
							<a href="{{ route('login') }}" class="btn btn-light"> 
								<i class="fa fa-user"></i>  <span class="ms-1 d-none d-sm-inline-block">Login  </span> 
							</a>
							<a href="{{ route('register') }}" class="btn btn-light"> 
								<i class="fa fa-user"></i>  <span class="ms-1 d-none d-sm-inline-block">Register  </span> 
							</a>
						@endguest
						@auth
							<form action="{{ route('logout') }}" method="post" style="display: inline">
								@csrf
								<button type="submit" class="btn btn-light"> 
									<i class="fa fa-user"></i>  <span class="ms-1 d-none d-sm-inline-block">Logout  </span> 
								</button>
							</form>
						@endauth
						<a data-bs-toggle="offcanvas" href="#offcanvas_cart" class="btn btn-light"> 
							<i class="fa fa-shopping-cart"></i> <span class="ms-1">My cart </span> 
						</a>
			        </div>
				</div> 
				<div class="col-lg-5 col-md-12 col-12">
					<form action="#" class="">
		              <div class="input-group">
		                <input type="search" class="form-control" style="width:55%" placeholder="Search">
		                <select class="form-select">
		                  <option value="">All type</option>
		                  <option value="codex">Special</option>
		                  <option value="comments">Only best</option>
		                  <option value="content">Latest</option>
		                </select>
		                <button class="btn btn-primary">
		                  <i class="fa fa-search"></i> 
						  Search
		                </button>
		              </div> <!-- input-group end.// -->
		            </form>
				</div> 
				
			</div> 
		</div> 
	</section> 

	<nav class="navbar navbar-dark bg-primary navbar-expand-lg">
		<div class="container">
			<button class="navbar-toggler border" type="button" data-bs-toggle="collapse" data-bs-target="#navbar_main" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse" id="navbar_main">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link ps-0" href="#"> Categories </a>
					</li>
					<li class="nav-item dropdown">
						<a class="dropdown-toggle nav-link" href="#" data-bs-toggle="dropdown">
							Others
						</a>
						<ul class="dropdown-menu">
							<li> <a class="dropdown-item" href="#">Submenu one </a> </li>
							<li> <a class="dropdown-item" href="#">Submenu two</a> </li>
							<li> <a class="dropdown-item" href="#">Submenu three</a> </li>
						</ul>
					</li>
				</ul>
			</div> 
		</div> 
	</nav> 
</header> 