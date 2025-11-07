<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Control Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
 

    <style>
        body{
            background: #DFDFDF;
        }
        #product_description {
  height: 150px !important; /* or any height you want */
  resize: both; /* allow user to drag to resize */
}

.light-modal {
    top: 0;
    left: 0;
    position: fixed;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.5);
    z-index: 9999;
    /* backdrop-filter: blur(5px); */
}
.light-modal-content {
    width: 100%;
    height: 100%;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 16px !important;
}
.light-dialog-box{
  width: 400px;
  height: 400px;
  background: #fff;
  border-radius: 8px;
  position: relative;
  overflow: hidden;
}
.lm-dialog-footer{
  height: 50px;
  width: 100%;
  position: absolute;
  bottom: 0;
  left: 0;
  

}
    </style>
</head>
  <body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">{{ __('Admin Panel')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
       
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('Products')}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('admin.products.index')}}">{{ __('Products')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.addproduct')}}">{{ __('Add Products')}}</a></li>
            {{-- <li><a class="dropdown-item" href="#">Another action</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="#">Something else here</a></li> --}}
          </ul>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="{{route('admin.kitchen')}}">{{ __('Kitchen Orders')}}</a>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="{{route('admin.point.pointmanager')}}">{{ __('Point Manager')}}</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav>
<main class="container-fluid">

    @yield('content')
</main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>