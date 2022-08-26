!<div>
<form>
  @csrf
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" class="form-control" wire:model="email"/>
                @error('email') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" class="form-control" wire:model="password"/>
                @error('password') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
            </div>
            @if(session('invalid_login'))
              <span class="error text-danger">{{ session('invalid_login') }}</span>
            @endif
        </form>
<div>
</div>
</div>