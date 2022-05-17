<div wire:ignore.self class="modal fade" id="updateStudentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form>
            <input type="hidden" name="id" wire:model="ids"/>
              <div class="form-group">
                  <label for="firstName">First Name</label>
                  <input type="text" name="firstName" class="form-control" wire:model="firstName"/>
                  @error('firstName') <span class="text-danger">{{$message}}</span>@enderror
              </div>
              <div class="form-group">
                <label for="lastName">Last Name</label>
                <input type="text" name="lastName" class="form-control" wire:model="lastName"/>
                @error('lastName') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email" class="form-control" wire:model="email"/>
                @error('email') <span class="text-danger">{{$message}}</span>@enderror
            </div>
            <div class="form-group">
                <label for="phone">Phone</label>
                <input type="text" name="phone" class="form-control" wire:model="phone"/>
                @error('phone') <span class="text-danger">{{$message}}</span>@enderror
            </div>
          </form>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="button" class="btn btn-primary" wire:click.prevent="update()">Save changes</button>
        </div>
      </div>
    </div>
</div>
