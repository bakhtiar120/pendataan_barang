<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Informasi Pendataan Barang</title>

    {{-- bootstrap --}}
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
        integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    {{-- font-awesome --}}
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body>
    <section style="padding-top: 2%;">
        <div class="container">
            <div class="row">
                <div class="col-6" style="margin: auto;">
                    <div class="card" style="border-color: #f0ad4e">
                        <div class="card-header">
                            Tambah Mutasi Barang
                        </div>
                        <div class="card-body">

                            {{-- flash message --}}
                            @include('flash-message')

                            <div class="col" style="text-align:right">
                                <a href="{{ url('/list-mutasi-barang') }}"><button class="btn btn-warning"><i
                                            class="fa fa-list"></i> List</button></a><br><br>
                            </div>
                            <div class="col">
                                {{-- <form action="data_reg" method="POST"> --}}
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Nomor Bukti <span style="color: red">*</span></label>
                                        <input type="text" id="nomor_bukti" name="nomor_bukti" class="form-control"
                                            placeholder="Masukkan nomor bukti" />
                                        <span style="color: red">@error('nomor_bukti'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Tanggal <span style="color: red">*</span></label>
                                            <input id="tanggal_mutasi" type="text" name="tanggal_mutasi" class="form-control"
                                                placeholder="Pilih Tanggal" />
                                            <span style="color: red">@error('tanggal'){{ $message }}@enderror</span>
                                            </div>
                                            <a href="#" class="btn btn-secondary" id="tambahBarang">Tambah Barang</a>
                                            <div id="form-barang">
                                                <div class="form-row">
                                                    <div class="form-group col-md-6">
                                                        <label for="inputDate1">Nama Barang</label>
                                                        <select class="form-control" name="kode_barang" id="kode_barang">
                                                            <option hidden>Pilih Barang</option>
                                                            @foreach ($barangs as $barang)
                                                            <option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang}} - {{$barang->nama_barang }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                                            </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="inputDate1">Jumlah</label>
                                                            <input type="number" class="form-control" id="quantity" name="quantity" />
                                                            
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-12">
                                                            <label for="inputDate1">Indikator Barang</label>
                                                            <select class="form-control" name="indikator_barang" id="indikator_barang">
                                                                <option hidden>Pilih Indikator</option>
                                                                <option value="Masuk">Masuk</option>
                                                                <option value="Keluar">Keluar</option>
                                                            </select>
                                                            
                                                        </div>
                                                    </div>
                                                    <hr class="bg-danger border-1 border-top border-danger">
                                            </div>
                    
                </div>
                
                                                        <button class="btn btn-primary" id="btn-add-mutasi">Submit</button>
                                                    {{-- </form> --}}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </section>
                        
                        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.6/jquery.min.js" type="text/javascript"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>
    <link href="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8/themes/base/jquery-ui.css" rel="Stylesheet" type="text/css" />
            {{-- <script type="text/javascript" src="{{ URL::asset('jquery-3.6.1.min.js') }}"></script> --}}
            {{-- <script src="/assets_ip2022/js/admin.js"></script> --}}
            <script src="https://rawgit.com/moment/moment/2.2.1/min/moment.min.js"></script>
    <script type="text/javascript">
        $(function() {
            $("#tanggal_mutasi").datepicker("destroy");
           $('#tanggal_mutasi').datepicker();
        });
        $("#tambahBarang").click(function(){
            console.log("tambah barang ")
			var pembungkus = $("#form-barang");

				
                var tambah_form ='<div class="form-row">'
                                                    +'<div class="form-group col-md-6">'
                                                        +'<label for="inputDate1">Nama Barang</label>'
                                                        +'<select class="form-control" name="kode_barang" id="kode_barang">'
                                                            +'<option hidden>Pilih Barang</option>'
                                                            +'@foreach ($barangs as $barang)'
                                                            +'<option value="{{ $barang->kode_barang }}">{{ $barang->kode_barang}} - {{$barang->nama_barang }}</option>'
                                                            +'@endforeach'
                                                            +'</select>'
                                                    +'</div>'
                                                                            +'</div>'
                                                    +'<div class="form-row">'
                                                        +'<div class="form-group col-md-6">'
                                                            +'<label for="inputDate1">Jumlah</label>'
                                                            +'<input type="number" class="form-control" id="quantity" name="quantity" />'
                                                            
                                                            +'</div>'
                                                            +'</div>'
                                                            +'<div class="form-row">'
                                                                +' <div class="form-group col-md-12">'
                                                                    +'<label for="inputDate1">Indikator Barang</label>'
                                                                    +'<select class="form-control" name="indikator_barang" id="indikator_barang">'
                                                                        +'<option hidden>Pilih Indikator</option>'
                                                                        +'<option value="Masuk">Masuk</option>'
                                                                        +'<option value="Keluar">Keluar</option>'
                                                                        +'</select>'
                                                            
                                                                        +'</div>'
                                                                        +'</div>'
                                                                        +'<hr class="bg-danger border-1 border-top border-danger">'

				$(pembungkus).append(tambah_form);
		
    }); 
    $("#btn-add-mutasi").click(function(event) {
    event.preventDefault();
    // $(".error").remove();
    // $(".alert").remove();
    var tanggal_mutasi = $("#tanggal_mutasi").val();
    var tanggal_mutasi_split = tanggal_mutasi.split("-");
    var tanggal_mutasi_value = moment(tanggal_mutasi_split[0]).format('YYYY-MM-DD');
    var nomor_bukti = $("#nomor_bukti").val();
    console.log("tanggal mutasi ",tanggal_mutasi_value);
    var i=0;
    var data_kode_barang=[];
    $("select[name=kode_barang]").each(function() {
        
        console.log("kode barang Si " + i,$(this).val());
        data_kode_barang[i]=$(this).val();
        i++;
    });
    // console.log("jumlah datanya ",data.length);
    var a=0;
    var data_quantity=[];
    $("input[name=quantity]").each(function() {
        console.log("quantity ",$(this).val())
        data_quantity[a]=$(this).val();
        a++;
    });

    var b=0;
    var data_indikator_barang=[];
    $("select[name=indikator_barang]").each(function() {
        console.log("indikator_barang ",$(this).val())
        data_indikator_barang[b]=$(this).val();
        b++;
    });
    
    var datanya = [];
    for(let i=0;i<data_kode_barang.length;i++) {
        datanya[i] = {
            "kode_barang" : data_kode_barang[i],
            "quantity" : data_quantity[i],
            "indikator_barang": data_indikator_barang[i]
        }
    }
    console.log("apa aja datanya ", datanya);
    var form_data = {
        _token:$('[name="_token"]').val(),
        tgl_mutasi: tanggal_mutasi_value,
        nomor_bukti:nomor_bukti,
        data_detail_mutasi : datanya
    }
    createPost(form_data);
});
function createPost(form_data) {
    console.log("create post ",form_data)
    $.ajax({
        url: 'post_mutasi_barang',
        method : "POST", type: "POST",
        data: form_data,
        dataType: 'json',
        
        // beforeSend:function() {
        //     $("#createBtn").addClass("disabled");
        //     $("#createBtn").text("Processing..");
        // },

        success:function(res) {
            console.log("success ",res)
            window.location = "/list-mutasi-barang";
        }
    });
}
    </script>
                    </body>

                    </html>