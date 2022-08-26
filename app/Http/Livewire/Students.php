<?php

namespace App\Http\Livewire;
use App\Models\Student;
use App\Models\User;
use Livewire\Component;
use \Illuminate\Http\Request;
use DB;
use Livewire\WithPagination;
class Students extends Component
{
    use WithPagination;
    public $ids;
    public $ordered_by;
    public $total_cost;
    public $phone;
    public $pizza;
    public $ccv;
    public $quantity_pizza;
    public $is_admin;
    public $search;
    public $searchterm1;
    public $searchterm2;
    public $searchterm3;
    public $searchterm4;
    public $searchterm5;
    public $searchterm6;
    public $searchterm7;
    public function resetinputfields(){
        $this->ordered_by = "";
        $this->total_cost = "";
        $this->ccv = "";
        $this->pizza = "";
        $this->phone = "";
        $this->quantity_pizza = "";
        $this->is_admin = "";
    }

    public function store(){
        $validatedData = $this->validate([
            'ordered_by' => 'required',
            'pizza' => 'required',
            'quantity_pizza' => 'required',
        ]);
        if($validatedData['pizza'] = "Nargherita"){
            $this->total_cost = 8;
        }elseif($validatedData['pizza'] = "Marinara"){
            $this->total_cost = 10;
        }elseif($validatedData['pizza'] = "Napoletana_or_Napoli"){
            $this->total_cost = 13;
        }elseif($validatedData['pizza'] = "Prosciutto_Crudo"){
            $this->total_cost = 14;
        }elseif($validatedData['pizza'] = "Quattro_Formaggi"){
            $this->total_cost = 11;
        }elseif($validatedData['pizza'] = "Quattro_Stagioni"){
            $this->total_cost = 7;
        }
        $user_id = DB::table('orders')->where('ordered_by',$validatedData['ordered_by'])->get();
        Student::create([
            'pizza' => $this->pizza,
            'quantity_pizza' => $this->quantity_pizza,
            'ordered_by' => $this->ordered_by,
            'total_cost' => $this->total_cost * $this->quantity_pizza,
            'user_id' => $user_id[0]->user_id
        ]);

        session()->flash('message','Order Created Successfully');
        $this->resetinputFields();
        $this->emit('studentAdded');
    }
    public function edit($id){

        $order = Student::where('id',$id)->first();
        $this->ids = $order->id;
        $this->pizza = $order->Pizza;
        $this->total_cost = $order->total_cost;
        $this->ordered_by = $order->ordered_by;
        $this->quantity_pizza = $order->quantity_pizza;
        $this->ccv = $order->belonguser->credit_card_value;
        $this->phone = $order->belonguser->phone;
        $this->is_admin = $order->belonguser->is_admin;
    }

    public function update(){
        $validateData = $this->validate([
            'pizza' => 'required',
            'ordered_by' => 'required',
            'total_cost' => 'required',
            'phone' => 'required',
            'ccv' => 'required',    
            'quantity_pizza' => 'required',  
            'is_admin' => 'required|min:1|nullable',  
        ]);
            $iduser =  DB::table('orders')->where('ordered_by',$validateData['ordered_by'])->get();
            $student = Student::findOrFail($this->ids);
            $user = User::findOrFail($iduser[0]->user_id);
            $student->update([
                'pizza' => $this->pizza,
                'total_cost' => $this->total_cost,
                'ordered_by' => $this->ordered_by,
                'quantity_pizza' => $this->quantity_pizza,
            ]);
            $user->update([
                'phone' => $this->phone,
                'credit_card_value' => $this->ccv,
                'is_admin' => $this->is_admin,
            ]);
            session()->flash('message',"Order updated Successfully");
            $this->resetinputfields();
            $this->emit('studentUpdated');

    }

    public function destroy($id){
        $student = Student::where('id',$id)->first()->delete();
    }
    public function logout(Request $request)
    {
        auth()->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('login');
    }
    public function render()
    {           
        $user = User::orderBy('id','DESC')->get();
        return view('livewire.students',[
            //whereHas because it has a connection of a belongsto relationship to another model to get values of that model
            'students' => Student::whereHas('belonguser', function($q) {
                $searchterm1 = "%".$this->searchterm1."%";
                $searchterm2 = "%".$this->searchterm2."%";
                $searchterm3 = "%".$this->searchterm3."%";
                $searchterm4 = "%".$this->searchterm4."%";
                $searchterm5 = "%".$this->searchterm5."%";
                $searchterm6 = "%".$this->searchterm6."%";
                $searchterm7 = "%".$this->searchterm7."%";
                $q->where([
                    ['ordered_by','LIKE',$searchterm1],
                    ['total_cost','LIKE',$searchterm2],
                    ['pizza','LIKE',$searchterm3],
                    ['quantity_pizza','LIKE',$searchterm4],
                    ['phone','LIKE',$searchterm5],
                    ['credit_card_value','LIKE',$searchterm6],
                    ['is_admin','LIKE',$searchterm7],
                ]);
            })->paginate(),
            'user' => $user,
        ]);
    }
}
