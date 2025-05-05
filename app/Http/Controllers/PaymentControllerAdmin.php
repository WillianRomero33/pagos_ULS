<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use App\Models\PaymentDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentControllerAdmin extends Controller
{
    public function index()
    {
        return response()->json(Payment::with('paymentDetails')->get());
    }

    public function store(Request $request)
    {
        DB::beginTransaction();
        try {
            $payment = Payment::create([
                'id_student' => $request->id_student,
                'payment_date' => now(),
                'payment_type' => $request->payment_type,
                'amount' => $request->amount,
                'status' => 'completado',
            ]);

            foreach ($request->payment_details as $detail) {
                PaymentDetail::create([
                    'id_pay' => $payment->id_pay,
                    'id_fee' => $detail['id_fee'],
                    'amount' => $detail['amount'],
                ]);
            }

            DB::commit();
            return response()->json($payment->load('paymentDetails'), 201);

        } catch (\Exception $e) {
            DB::rollback();
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    public function show($id)
    {
        $payment = Payment::with('paymentDetails')->findOrFail($id);
        return response()->json($payment);
    }
}
