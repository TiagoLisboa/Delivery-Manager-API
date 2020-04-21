<?php

namespace App\Http\Controllers;

use App\Delivery;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Http\Resources\DeliveryResource;

class DeliveryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return DeliveryResource::collection(
        Delivery::with('carrier', 'receiver', 'pickup_address', 'delivery_address')->paginate(25)
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
        'delivery' => 'required',
        'receiver_id' => 'required|exists:users,id',
        'carrier_id' => 'required|exists:users,id',
        'delivery_address_id' => 'required|exists:addresses,id',
        'pickup_address_id' => 'required|exists:addresses,id',
        'delivery_term' => 'required|date',
      ]);

      if ($validator->fails()) {
        $errors = $validator->errors();

        return response()->json($errors, 400);
      }

      $delivery = Delivery::create($request->all());

      return new DeliveryResource($delivery);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
      return new DeliveryResource(
        Delivery::with('carrier', 'receiver', 'pickup_address', 'delivery_address')->findOrFail($id)
      );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Delivery $delivery)
    {
      $validator = Validator::make($request->all(), [
        'delivery' => 'required',
        'receiver_id' => 'required',
        'carrier_id' => 'required',
        'delivery_address_id' => 'required',
        'pickup_address_id' => 'required',
        'delivery_term' => 'required|date',
      ]);

      if ($validator->fails()) {
        $errors = $validator->errors();

        return response()->json($errors, 400);
      }

      $delivery->update($request->all());

      return new DeliveryResource($delivery);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Delivery  $delivery
     * @return \Illuminate\Http\Response
     */
    public function destroy(Delivery $delivery)
    {
      $delivery->delete();

      return response()->json("Delivery deleted successfully.", 200);
    }
}
