@extends('partials.main')
@section('title', 'Transaction Create')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('cashier-transaction-store') }}" method="POST">
                        @csrf
                        @method('POST')
                        <div class="row">
                            <div class="col-lg-6 col-md-12">
                                <table style="width: 100%;">
                                    <thead><h2>Product selected</h2></thead>
                                    <tbody>
                                        @php
                                            $total = [];
                                        @endphp
                                        @foreach ($shop as $item)
                                            <input type="hidden" name="shop[]" value="{{ $item }}" hidden>
                                            <tr>
                                                <td>
                                                    {{ explode(";", $item)[1] }} <br>
                                                    <small>$ {{ number_format(explode(";", $item)[2], '0', ',', '.') }} X {{ explode(";", $item)[3] }}</small>
                                                </td>
                                                <td>
                                                    <b>$ {{ number_format(explode(";", $item)[4], '0', ',', '.') }}</b>
                                                </td>
                                            </tr>
                                            @php
                                                array_push($total, explode(";", $item)[4])
                                            @endphp
                                        @endforeach
                                        <tr>
                                            <td style="padding-top: 20px; font-size: 20px;"><b>Total</b></td>
                                            <td class="tex-end" style="padding-top: 20px; font-size: 20px;"><b>$ {{ number_format(array_sum($total), '0', ',', '.') }}</b></td>
                                        </tr>
                                    </tbody>
                                </table>
                                <input type="text" name="total" value="{{ array_sum($total) }}" hidden>
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12">Nama Pelanggan <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input type="text" name="name" class="form-control form-control-line @error('name') is-invalid @enderror" required>
                                                @error('name')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12">Alamat Pelanggan <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <textarea class="form-control form-control-line @error('address') is-invalid @enderror" name="address" required></textarea>
                                                @error('address')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label class="col-md-12">No Telepon <span class="text-danger">*</span></label>
                                            <div class="col-md-12">
                                                <input type="number" name="no_hp" class="form-control form-control-line @error('no_hp') is-invalid @enderror" onKeyPress="if(this.value.length==13) return false;" required>
                                                @error('no_hp')
                                                    <small class="text-danger">{{ $message }}</small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row text-end">
                                    <div class="col-md-12">
                                        <button class="btn btn-primary" type="submit">Pesan</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
