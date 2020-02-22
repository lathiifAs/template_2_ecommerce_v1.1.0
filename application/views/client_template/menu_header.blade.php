<!-- <nav class="navbar navbar-expand-lg navbar-dark bg-dark ftco-navbar-light" id="ftco-navbar">
	    <div class="container d-flex align-items-center">
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav" aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
	        <span class="oi oi-menu"></span> Menu
	      </button>
	      <div class="collapse navbar-collapse" id="ftco-nav">
	        <ul class="navbar-nav m-auto">
				{!! $list_navbar !!}
	        </ul>
	      </div>
	    </div>
	  </nav> -->
	<!-- END nav -->    
	
	<!--::header part start::-->
    <header class="main_menu home_menu">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-center">
                <div class="col-lg-11">
                    <nav class="navbar navbar-expand-lg navbar-light">
                        <!-- tampilan mobile -->
                        <div class="d-lg-none d-block" style="margin-left:9%;margin-top:1%">
                            <a class="navbar-brand" href="{{ site_url('client/beranda/') }}"> <h3><b> GPMC Sabdaguru </b></h3> </a>
                        </div>
                        <!-- tampilan websute -->
                        <div class="d-none d-lg-block">
                            <a class="navbar-brand" href="{{ site_url('client/beranda/') }}"> <h2><b> GPMC Sabdaguru </b></h2> </a>
                        </div>
                        <button class="navbar-toggler" type="button" data-toggle="collapse"
                            data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                            aria-expanded="false" aria-label="Toggle navigation">
                            <span class="menu_icon"><i class="fas fa-bars"></i></span>
                        </button>

                        <div class="collapse navbar-collapse main-menu-item" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                {!! $list_navbar !!}
                            </ul>
                        </div>
                        <div class="hearer_icon d-flex">
                        </div>
                    </nav>
                </div>
            </div>
        </div>
        <div class="search_input" id="search_input_box">
            <div class="container ">
                <form class="d-flex justify-content-between search-inner">
                    <input type="text" class="form-control" id="search_input" placeholder="Search Here">
                    <button type="submit" class="btn"></button>
                    <span class="ti-close" id="close_search" title="Close Search"></span>
                </form>
            </div>
        </div>
    </header>
    <!-- Header part end-->
