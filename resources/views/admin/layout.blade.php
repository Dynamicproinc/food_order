<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>M Brothers - Food - Admin Panel</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('ico/apple-touch-icon.png')}} }}">
<link rel="icon" type="image/png" sizes="32x32" href="{{asset('ico/favicon-32x32.png')}} }}">
<link rel="icon" type="image/png" sizes="16x16" href="{{asset('ico/favicon-16x16.png')}} }}">
<link href="https://getbootstrap.com/docs/5.3/examples/sidebars/sidebars.css" rel="stylesheet" />
    <style>
        body{
            background: #DFDFDF;
            /* overflow-x: hidden; */
        }
        #product_description {
  height: 150px !important; /* or any height you want */
  resize: both; /* allow user to drag to resize */
}
.xs-avatar{
    width:40px;
    height:40px;
    border-radius:50%;
    object-fit:cover;
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
.white-box{
    position: fixed;
    top:0;
    left: 0;
    display: none;
    align-items: center;
    justify-content: center;  
    background: #fff;
    width: 100%;
    height: 100%;
    z-index: 10000;
    box-shadow: 0 0 10px rgba(0,0,0,  0.5);
}
.white-box img{
    width: 150px;
    height: 150px;
    object-fit: contain;
    margin-bottom: 20px;
}

  .center {
    position: absolute;
    top: 50%;
    left: 50%;
    transform: translate(-50%, -50%);
}
    .pulse {
    width: 150px;
    height: 150px;
    background: rgb(255, 0, 64);
    border-radius: 50%;
    color: #fff;
    font-size: 20px;
    text-align: center;
    line-height: 150px;
    font-family: Verdana, Geneva, Tahoma, sans-serif;
    animation: animate 2s linear infinite;
}
@keyframes animate {
    0% {
        box-shadow: 0 0 0 0 rgba(255, 0, 64, 0.7), 0 0 0 0 rgba(255, 0, 64, 0.7);
    }

    40% {
        box-shadow: 0 0 0 50px rgba(255, 0, 64, 0), 0 0 0 0 rgba(255, 0, 64, 0.7);
    }

    80% {
        box-shadow: 0 0 0 50px rgba(255, 0, 64, 0), 0 0 0 30px rgba(255, 0, 64, 0);
    }

    100% {
        box-shadow: 0 0 0 0 rgba(255, 0, 64, 0), 0 0 0 30px rgba(255, 0, 64, 0);
    }
}

.sidebar-wrap{
  height: 100vh;
  overflow-y: hidden;
  /* background:#001d3d; */
  color: #fff !important;
}
.position-sticky {
  top: 80px; /* adjust if needed */
}

    </style>
</head>
  <body>
    {{-- <nav class="navbar navbar-expand-lg bg-body-tertiary  bg-dark border-bottom border-body" data-bs-theme="dark">
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
            
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            {{ __('Orders')}}
          </a>
          <ul class="dropdown-menu">
            <li><a class="dropdown-item" href="{{ route('admin.orders.index')}}">{{ __('Orders')}}</a></li>
            <li><a class="dropdown-item" href="{{ route('admin.orders.notification')}}">{{ __('Order Notification')}}</a></li>
            
          </ul>
        </li>
       <li class="nav-item">
          <a class="nav-link" href="{{route('admin.kitchen')}}">{{ __('Kitchen Orders')}}</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="{{route('admin.users.users')}}">{{ __('Users')}}</a>
       <li class="nav-item">
        
          <a class="nav-link" href="{{route('admin.point.pointmanager')}}">{{ __('Point Manager')}}</a>
        </li>
        
      </ul>
      
    </div>
  </div>
</nav> --}}
<div class="">
  <div class="row">
    <div class="col-md-2">
      <div class="position-sticky top-0 sidebar-wrap" style="z-index: 1;">
        {{-- <ul class="sidebar">
          <li><a href="#">{{__('Home')}}</a></li>
          <li><a href="#">{{__('Users')}}</a></li>
          <li>
            <a href="#">{{__('Orders')}}</a>
            <ul>
              <li>{{__('Order Notification')}}</li>
            </ul>
          </li>
          <li><a href="#">{{__('Point Manager')}}</a></li>
          <li><a href="#" target="_blank">{{__('Kitchen Orders')}} <i class="bi bi-box-arrow-up-right"></i></a></li>
          
          
        </ul> --}}
        <div class="flex-shrink-0 p-3" style="width: 280px">
                <a
                    href="/"
                    class="d-flex align-items-center pb-3 mb-3 link-body-emphasis text-decoration-none border-bottom"
                >
                   
                    <span class="fs-5 fw-semibold">ADMIN</span>
                </a>
                <ul class="list-unstyled ps-0">
                    <li class="mb-1">
                        <button
                            class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#home-collapse"
                            aria-expanded="true"
                        >
                            {{__('Users')}}
                        </button>
                        <div class="collapse" id="home-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li>
                                    <a href="{{ route('admin.users.users')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                        >{{__('All Users')}}</a
                                    >
                                </li>
                                <li>
                                    <a href="{{ route('admin.point.pointmanager')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                        >{{__('Point Manager')}}</a
                                    >
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button
                            class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#dashboard-collapse"
                            aria-expanded="false"
                        >
                            {{__('Products')}}
                        </button>
                        <div class="collapse" id="dashboard-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li>
                                    <a href="{{ route('admin.products.index')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                        >{{__('All Products')}}</a
                                    >
                                </li>
                                <li>
                                    <a href="{{ route('admin.addproduct')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                        >{{__('New Product')}}</a
                                    >
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <li class="mb-1">
                        <button
                            class="btn btn-toggle d-inline-flex align-items-center rounded border-0 collapsed"
                            data-bs-toggle="collapse"
                            data-bs-target="#orders-collapse"
                            aria-expanded="false"
                        >
                              {{__('Orders')}}
                        </button>
                        <div class="collapse" id="orders-collapse">
                            <ul class="btn-toggle-nav list-unstyled fw-normal pb-1 small">
                                <li>
                                    <a href="{{ route('admin.orders.index')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                        >{{__('All Orders')}}</a
                                    >
                                </li>
                                <li>
                                    <a href="{{ route('admin.kitchen')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                        >{{__('Kitchen Orders')}}</a
                                    >
                                </li>
                                <li>
                                    <a href="{{ route('admin.orders.notification')}}" class="link-body-emphasis d-inline-flex text-decoration-none rounded"
                                        >{{__('Order Notification')}}</a
                                    >
                                </li>
                               
                            </ul>
                        </div>
                    </li>
                    <li class="border-top my-3"></li>
                    
                </ul>
            </div>
      </div>
    </div>

    <div class="col-md-10">
      <main class="container-fluid">
        @yield('content')
      </main>
    </div>
  </div>
</div>



@stack('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>