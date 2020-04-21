<?php

namespace App\Http\Controllers;

use App\Address;
use App\Http\Resources\AddressResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return AddressResource::collection(
        Address::with('user')->paginate(25)
      );
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $validator = Validator::make($request->all(), [
        'address' => 'required',
        'neighborhood' => 'required',
        'city' => 'required',
        'state' => 'required',
        'CEP' => 'required',
        'user_id' => 'required|exists:users,id',
      ]);

      if ($validator->fails()) {
        $errors = $validator->errors();

        return response()->json($errors, 400);
      }

      $address = Address::create($request->all());

      return new AddressResource($address);

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return new AddressResource(
        Address::with('user')->findOrFail($id)
      );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Address $address)
    {
      $validator = Validator::make($request->all(), [
        'address' => 'required',
        'neighborhood' => 'required',
        'city' => 'required',
        'state' => 'required',
        'CEP' => 'required',
        'user_id' => 'required|exists:users,id',
      ]);

      if ($validator->fails()) {
        $errors = $validator->errors();

        return response()->json($errors, 400);
      }

      $address->update($request->all());

      return new AddressResource($address);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Address  $address
     * @return \Illuminate\Http\Response
     */
    public function destroy(Address $address)
    {
      $address->delete();

      return response()->json("Address deleted successfully.", 200);
    }
}
