<!doctype html>
<html lang="<?php echo e(app()->getLocale()); ?>">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <!-- Raleway Font -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Font Awesome icons -->
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">

        <!-- Bootstrap 4 styles -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <!-- Javascript: jQuery, Popper and Bootstrap -->
        <script src="https://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
        <title>Laravel</title>
</head>
  <body>
    
<header>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">Navbar</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link active" aria-current="page" href="<?php echo e(url('/')); ?>">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/produk/list')); ?>">Catalog Buku</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/pengguna/transaksi/')); ?>">Transaksi Saya</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Transaksi / Administrasi
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo e(url('/pesanan/list')); ?>">Transaksi Pesanan Peminjaman Member</a></li>
            <li><a class="dropdown-item" href="<?php echo e(url('/penerimaan/list')); ?>">Transaksi Pengembalian Member</a></li>
            <li><a class="dropdown-item" href="<?php echo e(url('/penyesuaian')); ?>">Transaksi Adjustment Saldo</a></li>
            <li><a class="dropdown-item" href="<?php echo e(url('/log/transaksi')); ?>">History Transaksi</a></li>
          </ul>
        </li>
        
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-expanded="false">
            Master Data
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
            <li><a class="dropdown-item" href="<?php echo e(url('/buku/list')); ?>">Buku</a></li>
            <li><a class="dropdown-item" href="<?php echo e(url('/rak/list')); ?>">Rak</a></li>
            <li><a class="dropdown-item" href="<?php echo e(url('/pengguna/list')); ?>">User</a></li>
          </ul>
        </li>        

        <li class="nav-item">
          <a class="nav-link" href="<?php echo e(url('/pengguna/login')); ?>" tabindex="-1" aria-disabled="true">Login</a>
        </li>
      </ul>
    </div>
  </div>
</nav>
</header>
<main>
</main>
