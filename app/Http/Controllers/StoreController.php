<?php

namespace App\Http\Controllers;

use App\Models\Store;
use App\Http\Requests\StoreStoreRequest;
use App\Http\Requests\UpdateStoreRequest;
use Illuminate\Http\Client\Request as ClientRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $stores= Store::all();
        return $stores;
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $store = new Store();
        $store->code = $request->code;
        $store->name = $request->name;
        $store->quantity = $request->quantity;
        $store->location = $request->location;
        $store->store_name = $request->store_name;
        $store->stock_date = $request->stock_date;
        $store->is_in_stock = $request->is_in_stock;
        $store->save();
        return 'success';

    }

    /**
     * Display the specified resource.
     */
    public function show(Store $store)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Request $request)
    {

        $data = $request->all();
        foreach($data as $record){
           $store = Store::find($record['id']);
            $store->code = $record['code'];
            $store->name = $record['name'];
            $store->quantity = $record['quantity'];
            $store->location = $record['location'];
            $store->store_name = $record['store_name'];
            $store->stock_date = $record['stock_date'];
            $store->is_in_stock = $record['is_in_stock'];
            $store->update();
        }
        return "edited";

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStoreRequest $request, Store $store)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request)
    {
        // dd($request->id);
        $store =Store::find($request->id);
        $store->delete();
        return 'deleted';

    }
    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;

        if (Auth::attempt(['email' => $email, 'password' => $password])) {

            $token = $request->user()->createToken('token');
            return [
                'message'=>"success",
                'token'=>$token->plainTextToken
            ];
        }else {
            return response()->json(['message'=>'invalid credentials']);
        }
    }
}
