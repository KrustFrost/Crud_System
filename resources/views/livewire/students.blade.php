<div>
    @include('livewire.create')
    @include('livewire.update')
    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/ui/1.13.0/jquery-ui.js"></script>
    <section>
    <link rel="stylesheet" href="{{mix('css/app.css')}}">
    <script src="{{mix('js/app.js')}}"></script>
        <div class="container">
            <div class="col-md-12 ">
            <div class="card shadow-lg border rounded" style="background-color: rgb(134 239 172)">
                <div class="card-reader ">
                <div style="display: flex; justify-content: center;">
                <button type="button" class="btn btn-danger" wire:click.prevent="logout()">Logout</button>
                </div>
                    </div>
                    <h3 style="text-align: center;">Welcome, {{auth()->user()->name}}</h3>
                    <h3 style="text-align: center;">All Orders</h3>
                    <!-- Button trigger modal -->
                    <div style="text-align: center">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addstudentmodal" >Add an Order</button>
                    </div>
                    <span style="text-align: center;font-family: Poppins;font-size: 20px">Search Here:</span>
                    <div style="text-align: center;display: flex; margin: 0 auto; justify-content: center; width:90%" >
                    <select name="Categories" id="Categories" wire:model="searchterm3" >
                        <option value="">Find a Pizza</option>
                        <option value="Margherita">Margherita</option>
                        <option value="Marinara">Marinara</option>
                        <option value="Prosciutto Crudo">Prosciutto Crudo</option>
                        <option value="Quattro Formaggi">Quattro Formaggi</option>
                        <option value="Napoletana or Napoli">Napoletana or Napoli</option>
                        <option value="Quattro Stagioni">Quattro Stagioni</option>
                    </select>
                    <input type="search"  id="ordered_by"  class="form-control container categories" placeholder="Name" wire:model="searchterm1" />
                    <input type="search" id="total_cost"  class="form-control container categories" placeholder="Total Cost" min="1" wire:model="searchterm2" />
                    <input type="search"  id="quantity_pizza"  class="form-control container categories" placeholder="Quantity Pizza" min="1" wire:model="searchterm4" />
                    <input type="search"  id="phone"  class="form-control container categories" placeholder="Phone Number" min="1" wire:model="searchterm5" />
                    <input type="search"  id="credit_card_value"  class="form-control container categories" placeholder="Credit Card Value" min="1" wire:model="searchterm6" />
                    <input type="search"  id="credit_card_value"  class="form-control container categories" placeholder="Is Admin" min="0" max="1" wire:model="searchterm7" />
                    </div>
</br>
@if(session('message'))
                <div class="alert alert-success container" style="width:50%">
                    {{session('message')}}
                </div>
            @endif
                </div></br>
                <div style="background-color: maroon" class="border rounded">
                <div class="card-body">
                    <table class="table table-striped ">
                        <thead>
                            <tr bgcolor="lightblue">
                                <th>Name</th>
                                <th>Total Cost</th>
                                <th>Pizza</th>
                                <th>Quantity Pizza</th>
                                <th>Phone Number</th>
                                <th>Credit Card Value</th>
                                <th>Is Admin</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody id="content_user">
                        @foreach($students as $student)
                                <tr style="background-color: white">
                                    <td class="ordered_by">{{$student->ordered_by}}</td>
                                    <td>{{$student->total_cost}}</td>
                                    <td>{{$student->Pizza}}</td>
                                    <td>{{$student->quantity_pizza}}</td>


                                    <td>{{$student->belonguser->phone}}</td>
                                    <td>{{$student->belonguser->credit_card_value}}</td>
                                    <td>{{$student->belonguser->is_admin}}</td>
                                    <td>
                                        <button type="button" class="btn btn-info" data-bs-toggle="modal" data-bs-target="#updatestudentmodal" wire:click.prevent="edit({{$student->id}})">Edit</button>
                                       <button type="button" wire:click.prevent="destroy({{$student->id}})" class="bg-red-500">Delete</button>
                                    </td>
                                </tr>
        
                             @endforeach
                        </tbody>
                    </table>
                </div>
                </div>
            </div>
            </div>
        </div>
    </section>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
