<!-- Create Modal-->
<div class="modal fade" id="userEdit{{ $user->id }}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Edit User</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">×</span>
            </button>
        </div>
        <form action="{{ route('admin-user-update', $user->id) }}" method="post" enctype="multipart/form-data">
            <div class="modal-body">
               @csrf
               @method('PUT')
               <div class="row">
                   <div class="form-group col-6">
                       <label for="nameId">Name</label>
                       <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" id="nameId" value="{{ $user->name }}" required>
                       @error('name')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   </div>
                   <div class="form-group col-6">
                       <label for="emailId">Email</label>
                       <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="emailId" value="{{ $user->email }}" required>
                       @error('email')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   </div>
               </div>
               <div class="row">
                   <div class="form-group col-6">
                       <label for="roleId">Role</label>
                       <select name="role" class="form-control @error('role') is-invalid @enderror" id="roleId" required>
                           <option value="admin" @if($user->role == 'admin') select @endif>Admin</option>
                           <option value="petugas" @if($user->role == 'petugas') select @endif>Petugas</option>
                       </select>
                       @error('role')
                           <span class="text-danger">{{ $message }}</span>
                       @enderror
                   </div>
               </div>
            </div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <button class="btn btn-primary" type="submit">Update</button>
            </div>
        </form>
    </div>
</div>
</div>
