<!-- Modal -->
<div wire:ignore.self class="modal fade" id="addstudentmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New Order</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form>
            <div class="form-group">
                <label for="ordered_by">Name: </label>
                <select name="name" id="name" wire:model="ordered_by">
                <option></option>
                @foreach($user as $users)
                <option value="{{$users->name}}">{{$users->name}}</option>
                @endforeach
                </select>
                @error('ordered_by') 
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
              <label for="pizza">Choose Pizza: </label>
            <select name="pizza" id="name" wire:model="pizza">
                <option></option>
                <option value="Margherita">Margherita</option>
                <option value="Marinara">Marinara</option>
                <option value="Napoletana or Napoli">Napoletana or Napoli</option>
                <option value="Prosciutto Crudo">Prosciutto Crudo</option>
                <option value="Quattro Formaggi">Quattro Formaggi</option>
                <option value="Quattro Stagioni">Quattro Stagioni</option>
                </select>
                @error('pizza') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" wire:click.prevent="store()">Add Order</button>
      </div>
    </div>
  </div>
</div>