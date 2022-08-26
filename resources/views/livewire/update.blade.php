<!-- Modal -->
<div wire:ignore class="modal fade" id="updatestudentmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Student</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form>
            <input type="hidden" name="id" wire:model="ids">
            <div class="form-group">
                <label for="ordered_by">Name</label>
                <input type="text" name="ordered_by" class="form-control" wire:model="ordered_by"/>
                @error('ordered_by') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="total_cost">Total Cost</label>
                <input type="text" name="total_cost" class="form-control" wire:model="total_cost"/>
                @error('total_cost') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="quantity_pizza">Quantity Pizza</label>
                <input type="text" name="quantity_pizza" class="form-control" wire:model="quantity_pizza"/>
                @error('quantity_pizza') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="Phone Number">Phone Number</label>
                <input type="text" name="phone" class="form-control" wire:model="phone"/>
                @error('phone') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="credit_card_value">Credit Card Value</label>
                <input type="text" name="credit_card_value" class="form-control" wire:model="ccv"/>
                @error('credit_card_value') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="pizza">Pizza</label>
                <input type="text" name="pizza" class="form-control" wire:model="pizza"/>
                @error('pizza') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="is_admin">Admin Approval</label>
                <input type="text" name="pizza" class="form-control" wire:model="is_admin"/>
                @error('is_admin') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="update()">Update Order</button>
      </div>
    </div>
  </div>
</div>