<!DOCTYPE html>
<html>
<head>
    <title>System Pendataan Barang</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
  <div class="container mt-4">
  @if(session('status'))
    <div class="alert alert-success">
        {{ session('status') }}
    </div>
  @endif
  <div class="card">
    <div class="card-header text-center font-weight-bold">
      Tambah Data Barang
    </div>
    <div class="card-body">
      <form name="store-barang" id="store-barang" method="post" action="{{url('store-barang')}}">
       @csrf
        <div class="form-group">
          <label for="exampleInputEmail1">Kode Barang</label>
          <input type="text" id="kode_barang" name="kode_barang" class="form-control" required="">
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Barang</label>
          <textarea name="nama_barang" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>  
</body>
</html>