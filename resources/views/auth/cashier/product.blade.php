@extends('partials.main')
@section('title', 'Product List')
@section('content')

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Tables</h1>
    <p class="mb-4">DataTables is a third party plugin that is used to generate the demo table below.
        For more information about DataTables, please visit the <a target="_blank"
            href="https://datatables.net">official DataTables documentation</a>.</p>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th style="width: 10vh">Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                            <th>Subtotal</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>#</th>
                            <th style="width: 10vh">Image</th>
                            <th>Name</th>
                            <th>Price</th>
                            <th>Stock</th>
                            <th>Action</th>
                            <th>Subtotal</th>
                        </tr>
                    </tfoot>
                    <tbody id="product-list"></tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="row fixed-bottom d-flex justify-content-end align-content-center" style="margin-left: 18%; width: 83%; height: 70px; border-top: 3px solid #EEE4B1; background-color: white;">
        <div class="col text-center" style="margin-right: 50px;">
            <form action="{{ route('cashier-transaction-create') }}" method="get">
                @csrf
                <div id="shop"></div>
                <button type="submit" class="btn btn-primary">Next</button>
            </form>
        </div>
    </div>

@endsection

@push('script')
    <script>
        $(document).ready(function() {
            let products = @json($products);
            let i = 1;
            $('.odd').hide();
            $.each(products, function(key, item) {
                $("#product-list").append(`
                    <tr>
                        <td class="text-center align-middle" style="width: 10vh">`+i+`</td>
                        <td class="d-inline-flex text-center align-middle">
                            <img src="{{ asset("`+item.image+`") }}" alt="`+item.name+`" width="150px">
                        </td>
                        <td class="text-center align-middle">`+item.name+`</td>
                        <td class="text-center align-middle">$ `+item.price+`</td>
                        <p id="price_`+item.id+`" hidden>`+ item.price +`</p>
                        <td class="text-center align-middle">`+item.stock+`</td>
                        <td class="text-center align-middle">
                            <button class="btn" style="padding: 0px 10px 0px 10px; cursor: pointer;" id="minus_`+item.id+`"><b>-</b></button>
                            <button class="btn" style="padding: 0px 10px 0px 10px; cursor: default" id="quantity_`+item.id+`">0</button>
                            <button class="btn" style="padding: 0px 10px 0px 10px; cursor: pointer;" id="plus_`+item.id+`"><b>+</b></button>
                        </td>
                        <td class="text-center align-middle"><b><span id="total_`+item.id+`">$ 0</span></b></td>
                    </tr>
                `);
                i++;

                $('#plus_'+item.id).click(function (e) {
                    const elem=$(this).prev();
                    const getId=elem.attr("id").split("_")[1]; // To find the price id
                    const price=item.price // price amount
                    let qty = parseInt(elem.html())+1;
                    elem.html(qty);
                    let total = price*qty;
                    $("#total_"+item.id).html("$ "+price*qty); // set total, assume total is qty * price
                    if (qty > 0) {
                        let shop = ``+item.id+`;`+item.name+`;`+item.price+`;`+qty+`;`+total+`;`;
                        $('#shop').append(`
                            <input name="shop[`+item.id+`]" value="`+shop+`" type="text" hidden />
                        `)
                    }
                });
                $('#minus_'+item.id).click(function (e) {
                    const elem=$(this).next();
                    const getId=elem.attr("id").split("_")[1]; // To find the price id
                    const price=item.price; // price amount
                    let qty = parseInt(elem.html());
                    if(qty>0){
                        qty--;
                    }
                    elem.html(qty);
                    let total = price*qty;
                    $("#total_"+item.id).html("$ "+price*qty); // set total, assume total is qty * price
                    if (qty >= 0) {
                        let shop = ``+item.id+`;`+item.name+`;`+item.price+`;`+qty+`;`+total+`;`;
                        $('#shop').append(`
                            <input name="shop[`+item.id+`]" value="`+shop+`" type="text" hidden />
                        `)
                    }
                });
            })
        })
    </script>
@endpush
