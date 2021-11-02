<?php

namespace App\Http\Controllers;

use App\Suscription;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Group;

class SuscriptionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('admin.suscriptions.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function show(Suscription $suscription)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function edit(Suscription $suscription)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Suscription $suscription)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Suscription  $suscription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Suscription $suscription)
    {
        //
    }

    public function suscribe($id)
    {
        /**
         * Preguntamos si el usuario ya se encuentra suscrito al grupo con $id
         */
        if (DB::table('suscriptions')->where('user_id',auth()->user()->id)->where('group_id',$id)->doesntExist()) {
            $suscription = new Suscription();

            $suscription->user_id = auth()->user()->id;
            $suscription->group_id = $id;

            $suscription->save();

            return redirect()->route('user-join-group')->with('info','se envio la solicitud correctamente, por favor espere a que el administrador apruebe su petición.');
        }
        return redirect()->back()->with('info','Usted ya solicito, o ya se encuentra suscrito a este grupo');
    }

    public function applications(Group $group)
    {
        $suscriptions = DB::table('groups')
        ->join('suscriptions', 'groups.id','=','suscriptions.group_id')
        ->join('users', 'users.id','=','suscriptions.user_id')
        ->select('suscriptions.id','users.name','groups.name as gname','suscriptions.status','suscriptions.created_at')
        ->where('groups.id',$group->id)
        ->get();

        return view('admin.suscriptions.index',compact('suscriptions','group'));
    }

    public function approved($id){
        $suscription = Suscription::find($id);
        $suscription->status = 'approved';
        $suscription->save();
        return back()->with('info','Se acepto correctamente la solicitud de suscripción.');
    }

    public function rejected($id)
    {
        $suscription = Suscription::find($id);
        $suscription->status = 'rejected';
        $suscription->save();
        return back()->with('info','Se rechazo la solicitud correctamente...');
    }
}
