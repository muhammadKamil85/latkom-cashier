<!-- Edit Modal-->
<div class="modal fade" id="transactionShow{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Transaction</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
                <div class="modal-body container">
                    <div class="row">
                        <p>
                            <div class="col-4">
                                Customer Name :
                            </div>
                            <div class="col-8">
                                {{ $transaction->pelanggan->name }}
                            </div>
                            <div class="col-4 mt-1">
                                Address :
                            </div>
                            <div class="col-8">
                                {{ $transaction->pelanggan->address }}
                            </div>
                            <div class="col-4 mt-1">
                                Number Phone :
                            </div>
                            <div class="col-8">
                            {{ $transaction->pelanggan->no_hp }}
                            </div>
                        </p>
                    </div>
                    <div class="row mb-2 text-center">
                        <div class="col-3"><b>Name</b></div>
                        <div class="col-3"><b>Qty</b></div>
                        <div class="col-3"><b>Price</b></div>
                        <div class="col-3"><b>Sub Total</b></div>
                    </div>
                    @foreach ($transaction->detail_transactions as $detail)
                    <div class="row mb-1">
                        <div class="col-3 text-center">{{ $detail->product->name }}</div>
                        <div class="col-3 text-center">{{ $detail->qty }}</div>
                        <div class="col-3 text-center">Rp. {{ number_format($detail->product->price, 0, ',', '.') }}</div>
                        <div class="col-3 text-center">Rp. {{ number_format($detail->subtotal, 0, ',', '.') }}</div>
                    </div>
                    @endforeach
                    <div class="row mt-3">
                        <div class="col-9"><b>Total :</b></div>
                        <div class="col-3"><b>Rp. {{ number_format($transaction->total_price, 0, ',', '.') }}</b></div>
                    </div>
                </div>
                <div class="modal-footer">
                    <div class="text-muted" style="text-align: left; position: absolute; left: 1em;">
                        Created at : {{ $transaction->created_at }}  <br>By : {{ $transaction->user->name }}
                    </div>
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                </div>
        </div>
    </div>
</div>

