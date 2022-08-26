<div>
<link rel="stylesheet" href="{{mix('css/register.css')}}">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css"/>   
<form>
<div class="container">
    <div class="title">Registration</div>
    <div class="content">
      <form action="#">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" placeholder="Enter your name" wire:model="name" required>
          </div>
          @error('name') 
                <span class="error text-danger">{{ $message }}</span>
          @enderror
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email" placeholder="Enter your email" wire:model="email" required>
          </div>
          @error('email') 
                <span class="error text-danger">{{ $message }}</span>
                 @enderror
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="text" placeholder="Enter your number" wire:model="phone" required>
          </div>
          @error('phone') 
                <span class="error text-danger">{{ $message }}</span>
          @enderror
          <div class="input-box">
            <span class="details">Password</span>
            <input type="text" placeholder="Enter your password" wire:model="password" required>
          </div>
          @error('password') 
                <span class="error text-danger">{{ $message }}</span>
          @enderror
        </div>
        <div class="button">
          <input type="submit" value="Register" wire:click.prevent="register()">
        </div>
        <div class="signup-link">
                  Already have an Account? <a href="/login">Login now</a>
               </div>
      </form>
    </div>
  </div>
</form>
<div>
</div>
</div>