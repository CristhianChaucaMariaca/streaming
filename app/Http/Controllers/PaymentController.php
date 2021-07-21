<?php

namespace App\Http\Controllers;

use App\Payment;
use App\User;
use App\Group;
use Carbon\Carbon;
use Illuminate\Http\Request;

class PaymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(User $user, Group $group)
    {
        return view('admin.payments.create',compact('user','group'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, User $user, Group $group)
    {
        //$group = Group::find($request->group_id);
        $carbon = new Carbon();
        $mes = (integer)$carbon->month;//Mes actual



        $fees = $request->amount/$group->quota;//Divide el monto ingresado por formulario a la cantidad de cuotas a pagar
        $pay = Payment::orderBy('id','DESC')->where('user_id',$user->id)->first();//Obtenermos el ultimo pago.
        if ($pay) {
            $i=1;
            while ($i <= $fees) {
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->group_id= $group->id;
                $payment->status = $request->status;
                $payment->pay = $group->quota;
                if (($pay->fee + 1) > 12) {
                    $payment->fee = 1;
                    $payment->year = $pay->year + 1;
                }else{
                    $payment->fee = $pay->fee + 1;
                    $payment->year = $pay->year;
                }
                $payment->save();
                $pay = Payment::orderBy('id','DESC')->where('user_id',$user->id)->first();//Obtenermos el ultimo pago.
                $i++;
            }
            echo('Se realizo el pago, ya tenia pagos anteriores');
        }
        else{//Si el usuario no cuenta con ningun pago registrado.
            $i=0;
            $pay = new Payment();
            while ($i < $fees) {
                $payment = new Payment();
                $payment->user_id = $user->id;
                $payment->group_id= $group->id;
                $payment->status = $request->status;
                $payment->pay = $group->quota;
                if (($mes + $i)>12) {
                    $payment->fee = 1;
                    $fees = $fees - $i;
                    $i=0;
                    $mes=1;
                    $payment->year = $carbon->year +1;
                }
                else{
                    $payment->fee = $mes + $i;
                    $payment->year = $carbon->year;
                }
                $payment->save();
                $i++;
            }
            echo($fees);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function show(Payment $payment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function edit(Payment $payment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Payment $payment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Payment  $payment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Payment $payment)
    {
        //
    }

    public function showUserPayments(User $user, Group $group)
    {
        $payments = Payment::orderBy('id','DESC')->where('group_id',$group->id)->get();
        return view('admin.payments.show-user',compact('user','payments','group'));
    }

}
