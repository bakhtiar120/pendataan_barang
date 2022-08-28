<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pendataan Barang</title>

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
                            Daftar Barang
                        </div>
                        <div class="card-body">

                            {{-- flash message --}}
                            @include('flash-message')
                            
                            <div class="col" style="text-align:right">
                                <a href="{{ url('/data-list') }}"><button class="btn btn-warning"><i
                                            class="fa fa-list"></i> List</button></a><br><br>
                            </div>
                            <div class="col">
                                <form action="{{ url('update-barang/' . $item->id) }}" method="POST">
                                    @csrf
                                    <div class="form-group">
                                        <label for="name">Kode Barang <span style="color: red">*</span></label>
                                        <input type="text" name="kode_barang" class="form-control" disabled
                                            placeholder="Masukkan kode barang" value="{{ $item->kode_barang}}" />
                                        <span style="color: red">@error('name'){{ $message }}@enderror</span>
                                        </div>
                                        <div class="form-group">
                                            <label for="email">Nama Barang <span style="color: red">*</span></label>
                                            <input type="text" id="nama_barang" name="nama_barang" class="form-control"
                                                placeholder="Masukkan nama barang" value="{{ $item->nama_barang}}" />
                                            <span style="color: red">@error('email'){{ $message }}@enderror</span>
                                            </div>
                                                        <button class="btn btn-primary">Update</button>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                        </section>
                    </body>

                    </html>