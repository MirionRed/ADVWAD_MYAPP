<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Group;
use App\Member;

class GroupController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    public function index()
    {
      //$groups = Group::orderBy('name', 'asc')->get();
      $groups = Group::orderBy('name', 'asc')->paginate(5);
      return view('group.index',[
        'groups' => $groups
      ]);
    }
    */
    public function index(Request $request)
    {
      //$groups = Group::orderBy('name', 'asc')->get();
      //$groups = Group::orderBy('name', 'asc')->paginate(5);
      $groups = Group::orderBy('name', 'asc')
        ->when($request->query('name'), function($query) use ($request){
          return $query->where('name', 'like', '%'.$request->query('name').'%');
        })
        ->paginate(5);
      return view('group.index',[
        'groups' => $groups,
        'request' => $request,
      ]);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      $group = new Group();
      return view('group.create', [
          'group' => $group,
      ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $group = new Group;
        $group->fill($request->all());
        $group->save();
        return redirect()->route('group.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
      $group = Group::find($id);
      if(!$group) throw new ModelNotFoundException;
      return view('group.edit', [
        'group' => $group
      ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $group = Group::find($id);
      if(!$group) throw new ModelNotFoundException;
      $group->fill($request->all());
      $group->save();
      return redirect()->route('group.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function addMember($id){
      $group = Group::find($id);
      $member = Member::orderBy('name', 'asc')->get();
      $groupMembers = $group->members()->get();
      $memberId = array();
      foreach ($groupMembers as $groupMember){
        $memberId[] = $groupMember->id;
      }
      //dd($memberId);
      return view('group.addMember', [
        'group' => $group,
        'member' => $member,
        'memberId' => $memberId
      ]);
    }

    public function updateAddMember(Request $request, $id){
      //dd($request);
      $group = Group::find($id);
      $group->members()->sync($request->input('members_id'), true);
      return redirect()->route('group.index');
    }
}
