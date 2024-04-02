<!-- Add Modal-->
<div class="modal fade" id="productAdd{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Product</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <form action="{{ route('admin-product-add', $product->id) }}" method="post" enctype="multipart/form-data">
                <div class="modal-body">
                   @csrf
                   @method('PUT')
                   <div class="row">
                       <div class="form-group col-12">
                           <label for="stockId">Stock</label>
                           <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stockId" value="{{ $product->stock }}" required>
                           @error('stock')
                               <span class="text-danger">{{ $message }}</span>
                           @enderror
                       </div>
                   </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <button class="btn btn-primary" type="submit">Set stock</button>
                </div>
            </form>
        </div>
    </div>
    </div>
