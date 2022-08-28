<!DOCTYPE html>
<html>
<head>
    <title>Sistem Informasi Pendataan Barang</title>
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
      Report Mutasi Barang
    </div>
    <div class="card-body">
      <form name="form-mutasi-barang" id="form-mutasi-barang" method="post" action="{{url('report-mutasi-barang')}}">
       @csrf
        <div class="form-group">
                                            <label for="email">Tanggal Awal</label>
                                            <input id="tanggal_awal" type="text" name="tanggal_awal" class="form-control"
                                                placeholder="Pilih Tanggal" />
                                            <span style="color: red">@error('tanggal_awal'){{ $message }}@enderror</span>
                                            </div>
                                            <div class="form-group">
                                            <label for="email">Tanggal Akhir</span></label>
                                            <input id="tanggal_akhir" type="text" name="tanggal_akhir" class="form-control"
                                                placeholder="Pilih Tanggal" />
                                            <span style="color: red">@error('tanggal_akhir'){{ $message }}@enderror</span>
                                            </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Nama Barang</label>
          <textarea name="nama_barang" class="form-control" required=""></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Search</button>
      </form>
    </div>
  </div>
</div>  
</body>
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
            {{-- <script type="text/javascript" src="{{ URL::asset('jquery-3.6.1.min.js') }}"></script> --}}
            {{-- <script src="/assets_ip2022/js/admin.js"></script> --}}
            <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
            <script type="text/javascript">
        $(function() {
            $("#tanggal_awal").datepicker("destroy");
           $('#tanggal_awal').datepicker({ dateFormat: 'yy-mm-dd' });
           $("#tanggal_akhir").datepicker("destroy");
           $('#tanggal_akhir').datepicker({ dateFormat: 'yy-mm-dd' });
        });
        </script>
</html>