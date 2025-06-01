<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PaymentCard;
use Illuminate\Http\Request;

class PaymentCardController extends Controller
{
    public function index()
    {
        return response()->json(PaymentCard::all());
    }

    public function store(Request $request)
    {
        $PaymentCard = PaymentCard::create($request->all());
        return response()->json($PaymentCard, 201);
    }

    public function show($id)
    {
        $PaymentCard = PaymentCard::findOrFail($id);
        return response()->json($PaymentCard);
    }

    public function update(Request $request, $id)
    {
        $PaymentCard = PaymentCard::findOrFail($id);
        $PaymentCard->update($request->all());
        return response()->json($PaymentCard);
    }

    public function destroy($id)
    {
        PaymentCard::destroy($id);
        return response()->json(null, 204);
    }
}
