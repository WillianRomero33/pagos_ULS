<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\PayCard;
use Illuminate\Http\Request;

class PayCardControllerAdmin extends Controller
{
    public function index()
    {
        return response()->json(PayCard::all());
    }

    public function store(Request $request)
    {
        $payCard = PayCard::create($request->all());
        return response()->json($payCard, 201);
    }

    public function show($id)
    {
        $payCard = PayCard::findOrFail($id);
        return response()->json($payCard);
    }

    public function update(Request $request, $id)
    {
        $payCard = PayCard::findOrFail($id);
        $payCard->update($request->all());
        return response()->json($payCard);
    }

    public function destroy($id)
    {
        PayCard::destroy($id);
        return response()->json(null, 204);
    }
}
