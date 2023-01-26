<header class='p-3 bg-dark text-white'>
  <div class='container'>
    <div class='d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start'>
      <a class='navbar-brand' href='home'>
        <img src='../view/img/logo.png' alt='' width='50' height='50'>
      </a>

      <ul class='nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0'>
        <li><a href='#' class='nav-link px-2 text-secondary'>Home</a></li>
        <li><a href='#' class='nav-link px-2 text-white'>Features</a></li>
        <li><a href='#' class='nav-link px-2 text-white'>Pricing</a></li>
        <li><a href='#' class='nav-link px-2 text-white'>FAQs</a></li>
        <li><a href='#' class='nav-link px-2 text-white'>About</a></li>
      </ul>

      <form class='col-12 col-lg-auto mb-3 mb-lg-0 me-lg-3'>
        <input type='search' class='form-control form-control-dark' placeholder='Search...' aria-label='Search'>
      </form>

      <div class='text-end'>
        <button type='button' class='btn btn-outline-light me-2'>Login</button>
        <button type='button' class='btn btn-warning'>Sign-up</button>
      </div>
    </div>
  </div>
</header>


<div id='carouselMaterialStyle' class='carousel slide carousel-fade' data-mdb-ride='carousel'>

  <div class='carousel-indicators'>
    <button type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide-to='0' class='active' aria-current='true' aria-label='Slide 1'></button>
    <button type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide-to='1' aria-label='Slide 2'></button>
    <button type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide-to='2' aria-label='Slide 3'></button>
  </div>


  <div class='carousel-inner rounded-5 shadow-4-strong'>

    <div class='carousel-item active'>
      <img src='https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(15).webp' class='d-block w-100' alt='Sunset Over the City' />
      <div class='carousel-caption d-none d-md-block'>
        <h5>First slide label</h5>
        <p>Nulla vitae elit libero, a pharetra augue mollis interdum.</p>
      </div>
    </div>


    <div class='carousel-item'>
      <img src='https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(22).webp' class='d-block w-100' alt='Canyon at Nigh' />
      <div class='carousel-caption d-none d-md-block'>
        <h5>Second slide label</h5>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
    </div>


    <div class='carousel-item'>
      <img src='https://mdbcdn.b-cdn.net/img/Photos/Slides/img%20(23).webp' class='d-block w-100' alt='Cliff Above a Stormy Sea' />
      <div class='carousel-caption d-none d-md-block'>
        <h5>Third slide label</h5>
        <p>Praesent commodo cursus magna, vel scelerisque nisl consectetur.</p>
      </div>
    </div>
  </div>

  <button class='carousel-control-prev' type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide='prev'>
    <span class='carousel-control-prev-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Previous</span>
  </button>
  <button class='carousel-control-next' type='button' data-mdb-target='#carouselMaterialStyle' data-mdb-slide='next'>
    <span class='carousel-control-next-icon' aria-hidden='true'></span>
    <span class='visually-hidden'>Next</span>
  </button>
</div>