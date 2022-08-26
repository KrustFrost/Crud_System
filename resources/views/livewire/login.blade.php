<div>
<link rel="stylesheet" href="{{mix('css/login.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>
<div class="center">
  <form>
         <input type="checkbox" id="show">
         <label for="show" class="show-btn">View Form</label>
         <div class="container">
            <label for="show" class="close-btn fas fa-times" title="close"></label>
            <div class="text">
               Login Form
            </div>
            <form action="#">
               <div class="data">
                  <label>Email</label>
                  <input type="email" name="email" wire:model="email" required>
               </div>
               @error('email') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
               <div class="data">
                  <label>Password</label>
                  <input type="password" name="password" wire:model="password" required >
               </div>
               @if(session('invalid_login'))
              <span class="error text-danger">{{ session('invalid_login') }}</span>
            @endif
            @if(session('admin_approval'))
              <span class="error text-danger">{{ session('admin_approval') }}</span>
            @endif
               @error('password') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
</br>

               <div class="btn">
                  <div class="inner"></div>
                  <button type="button" wire:click.prevent="login()">login</button>
               </div>
               <div class="signup-link">
                  Don't have an Account? <a href="/register">Register now</a>
               </div>
            </form>
         </div>
      </div>
</div>
</form>
</div>



