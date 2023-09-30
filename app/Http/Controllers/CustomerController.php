<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Customer;
use Illuminate\Http\Request;
use DB;

class CustomerController extends Controller
{
    public function customerIndex()
    {
        $user = Auth::user();
        $customers = Customer::paginate(5);
        
        return view('customer.index',compact('user', 'customers'));
    }


    public function create()
    {
        $user = Auth::user();
        return view('customer.create', compact('user'));
    }


    public function store(Request $request)
    {
        try
        {
            DB::beginTransaction();
            $input = $request->except('_token');
            Customer::create($input);
            DB::commit();
            $message = [
                'success' => 1,
                'message' =>'Customer Created Successfully'
            ];
            return redirect()->route('customers.index')->with('message', $message);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('customers.index')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }

    }


    public function show(string $id)
    {
        //
    }


    public function edit(string $id)
    {
        $customer = Customer::find($id);
        $user = Auth::user();
        return view('customer.edit', compact('customer', 'user'));
    }


    public function update(Request $request, string $id)
    {
        try{

            $customer = Customer::find($id);
            DB::beginTransaction();
            $customer->name = $request->name;
            $customer->address = $request->address;
            $customer->phone = $request->phone;
            $customer->email = $request->email;
            $customer->save();
            DB::commit();
            $message = [
                'success' => 1,
                'message' =>'Customer Updated Successfully'
            ];
            return redirect()->route('customers.index')->with('message', $message);
        }
        catch(Exception $e){
            DB::rollback();
            return redirect()->route('customers.index')->with('message', ['success' => 0, 'message'=>'Something Went Wrong']);
        }
    }

    public function destroy(string $id)
    {
        try
        {

            $customer = Customer::find($id);
            $customer->delete();
            $message = [
                'success' => 1,
                'text' =>'Customer Deleted Successfully'
            ];
        }
        catch(Exception $e){
            $message = [
                'success' => 0,
                'text' =>'Something Went Wrong'
            ];
        }
        return $message;
    }
}
