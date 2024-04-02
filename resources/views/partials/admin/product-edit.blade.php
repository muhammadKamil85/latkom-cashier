<!-- Edit Modal-->
<div class="modal fade" id="productEdit{{ $product->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit Product</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('admin-product-store') }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               @csrf
               <div class="row">
                   <div class="form-group col-6">
                       <label for="nameId">Name</label>
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameId" value="{{ $product->name }}" required>
                       @error('name')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   </div>
                   <div class="form-group col-6">
                       <label for="priceId">Price</label>
                       <input type="number" name="price" class="form-control @error('price') is-invalid @enderror" id="priceId" value="{{ $product->price }}" required>
                       @error('price')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   </div>
               </div>
               <div class="row">
                   <div class="form-group col-6">
                       <label for="stockId">Stock</label>
                       <input type="number" name="stock" class="form-control @error('stock') is-invalid @enderror" id="stockId" value="{{ $product->stock }}" required>
                       @error('stock')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   </div>
                   <div class="form-group col-6">
                       <label for="imageId">Image Product</label>
                       <input type="file" accept="image/*" name="image" class="form-control-file @error('image') is-invalid @enderror" id="imageId" required>
                       @error('image')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   </div>
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
