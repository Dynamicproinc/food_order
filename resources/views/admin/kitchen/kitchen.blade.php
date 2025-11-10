<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>My Kitchen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <style>
        @import url("https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css");
        body{
          background: #dfdfdf !important;
        }
        .order-card{
            min-height:100px;
            background:#fff;
            box-shadow: rgba(0, 0, 0, 0.16) 0px 3px 6px, rgba(0, 0, 0, 0.23) 0px 3px 6px;
            border-radius: 8px;
            overflow: hidden;
            font-size: 14px
        }
        ul{
            list-style: none;
            padding:0;
            margin: 0
        }
        .bg-pending{
            background: #dae2e7 !important;
        }

        .choices{
          display:flexbox;
          
        }
        .choices li{
          padding: 0 16px;
          background: #eee;
          font-weight: 500;
          /* width: 100%; */
          margin: 4px;
          border-radius: 4px;
          
        }
        .mid-cont{
          display: flex;
          align-items: center;
          justify-content: center;
          width: 60px;
          min-height: 100px;
          font-weight: 900;
          font-size: 32px;
        }
        .ready-items{
          background: #fff;
          box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px, rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
          min-height: 100px;
          overflow: hidden;
          
        }
        .ready-orders-list{
          height: 100vh;
          overflow-y: auto;
          padding-bottom: 16px;
          width: 100%;
        }
        
    </style>
     @livewireStyles
</head>
  <body>
    <main>
        @livewire('admin.kitchen')
    </main>
     @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js" integrity="sha384-FKyoEForCGlyvwx9Hj09JcYn3nv7wiPVlz7YYwJrWVcXK/BmnVDxM+D2scQbITxI" crossorigin="anonymous"></script>
  </body>
</html>