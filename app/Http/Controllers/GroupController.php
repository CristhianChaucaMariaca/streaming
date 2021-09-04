<?php

namespace App\Http\Controllers;

use App\Group;
use App\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $groups = Group::orderBy('id','ASC')->get();
        return view('admin.groups.index',compact('groups'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.groups.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = Group::create($request->all());
        // dd($group);
        // dd($request);
        $group->quota = ceil($group->amount / $group->members); // Redondeamos para hacia arriba para tener un numero entero para la cuota a los usuarios
        $group->save();
        return redirect()->route('group-edit',$group)->with('info',"Grupo $group->name creado con exito.");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function show(Group $group)
    {
        $carbon = new Carbon();
        return view('admin.groups.show',compact('group','carbon'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function edit(Group $group)
    {
        return view('admin.groups.edit', compact('group'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Group $group)
    {
        $group->update($request->all());
        return redirect()->route('group-edit',$group)->with('info',"Se modifico el grupo $group->name de forma correcta.");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Group  $group
     * @return \Illuminate\Http\Response
     */
    public function destroy(Group $group)
    {
        $group->delete();
        return redirect()->route('groups')->with('info',"Se elimino el grupo $group->name de forma correcta");
    }

    public function new_service(Group $group)
    {
        $services = Service::select('id','name')->orderBy('name','DESC')->get();
        return view('admin.groups.addService',compact('group','services'));
    }
    public function add_service(Request $request, Group $group){
        $group->services()->attach($request->service_id);
        $service = Service::find($request->service_id);
        if (isset($group->amount)) {
            $group->amount = $group->amount + $service->price;
        }
        else{
            $group->amount=$service->price;
        }
        $group->quota = ceil($group->amount/$group->members);
        $group->save();
        return redirect()->route('group-new-service',$group)->with('info',"Se agrego el servico correctament.");
    }

    public function removeService(Group $group, $id)
    {
        $service = Service::find($id);
        $group->services()->detach($id);
        if (($group->amount - $service->price)>0) {
            $group->amount = $group->amount - $service->price;
        }
        else{
            $group->amount = null;
        }
        $group->save();
        return redirect()->route('group-show',$group)->with('info',"Servicio $group->name quitado correctamente del grupo.");
    }


    public function userAttachGroup($id)
    {
        auth()->user()->groups()->attach($id);
        return redirect()->route('home',)->with('info',"Se unio correctamente al grupo.");
    }

    public function joinGroup()
    {
        $groups = Group::orderBy('name','DESC')->get();
        return view('web.user.joinGroup',compact('groups'));
    }
}
