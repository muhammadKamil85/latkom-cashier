<!-- Create Modal-->
<div class="modal fade" id="transactionCreate" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="#" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                    @csrf
                    <div class="row">
                        @foreach ($products as $product)
                        @if ($loop->iteration != 1 && $loop->iteration % 4 == 1) <br> @endif
                        <div class="card col-3 ms-auto">
                            <img src="{{ asset($product->image) }}" class="card-img-top" alt="{{ $product->name }}">
                            <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text">
                                {{ $product->stock }} <br>
                                <b>{{ $product->price }}</b> <br>
                            </p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Create</button>
                </div>
            </form>
        </div>
    </div>
</div>
{{-- <script>
    $(document).ready(function() {
        let products = {{ json_encode($products) }}
        $.each(products, function(key, item) {
            $("#product-list").append(`
                <div class="col-lg-4 col-md-6">
                    <div class="card">
                        <div class="bg-image hover-zoom ripple ripple-surface ripple-surface-light">
                            <img src="/storage/product/`+item.img+`" class="w-50" />
                        </div>
                        <div class="card-body">
                            <h5 class="card-title mb-3">`+ item.name +`</h5>
                            <p>Stok `+ item.stock +`</p>
                            <h6 class="mb-3">Rp. `+ item.price +`</h6>
                            <p id="price_`+item.id+`" hidden>`+ item.price +`</p>
                            <center>
                                <table>
                                    <tr>
                                        <td style="padding: 0px 10px 0px 10px; cursor: pointer;" id="minus_`+item.id+`"><b>-</b></td>
                                        <td style="padding: 0px 10px 0px 10px;" class="num" id="quantity_`+item.id+`">0</td>
                                        <td style="padding: 0px 10px 0px 10px; cursor: pointer;" id="plus_`+item.id+`"><b>+</b></td>
                                    </tr>
                                </table>
                            </center>
                            <br>
                            <p>Sub Total <b><span id="total_`+item.id+`">Rp. 0</span></b></p>
                        </div>
                    </div>
                </div>
            `);

            $('#plus_'+item.id).click(function (e) {
                const elem=$(this).prev();
                const getId=elem.attr("id").split("_")[1]; // To find the price id
                const price=$("#price_"+getId).html(); // price amount
                let qty = parseInt(elem.html())+1;
                elem.html(qty);
                let total = price*qty;
                $("#total_"+item.id).html("Rp. "+price*qty); // set total, assume total is qty * price
                if (qty > 0) {
                    let shop = ``+item.id+`;`+item.name+`;`+item.price+`;`+qty+`;`+total+`;`;
                    $('#shop').append(`
                        <input name="shop[]" value="`+shop+`" type="text" hidden />
                    `)
                }
            });
            $('#minus_'+item.id).click(function (e) {
                const elem=$(this).next();
                const getId=elem.attr("id").split("_")[1]; // To find the price id
                const price=$("#price_"+getId).html(); // price amount
                let qty = parseInt(elem.html());
                if(qty>0){
                    qty--;
                }
                elem.html(qty);
                let total = price*qty;
                $("#total_"+item.id).html("Rp. "+price*qty); // set total, assume total is qty * price
                if (qty > 0) {
                    let shop = ``+item.id+`;`+item.name+`;`+item.price+`;`+qty+`;`+total+`;`;
                    $('#shop').append(`
                        <input name="shop[]" value="`+shop+`" type="text" hidden />
                    `)
                }
            });
        })
    })
</script> --}}
