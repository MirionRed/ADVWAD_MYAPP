<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Division;

class DivisionController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    //
    public function create(){
      $division = new Division();
      return view('divisions.create', [
        'division' => $division,
      ]);


    }

    public function store(Request $request){
        $division = new Division;
        $division->fill($request->all());
        $success = $division->save();
        //return redirect()->route('division.index');
        //dd($request);

        return response()->json([
          'success' => $success,
          'division' => $division,
        ]);
    }
    /*
    public function index(){
      //$divisions = Division::orderBy('name', 'asc')->get();
      $divisions = Division::orderBy('name', 'asc')->paginate(5);
      return view('divisions.index', [
        'divisions' => $divisions
      ]);
    }
    */
    /* BEFORE REACT
    public function index(Request $request){
      //$divisions = Division::orderBy('name', 'asc')->get();
      //$divisions = Division::orderBy('name', 'asc')->paginate(5);
      $divisions = Division::orderBy('name', 'asc')
        ->when($request->query('code'), function($query) use ($request){
          return $query->where('code', 'like', '%'.$request->query('code').'%');
        })
        ->when($request->query('name'), function($query) use ($request){
          return $query->where('name', 'like', '%'.$request->query('name').'%');
        })
        ->when($request->query('state'), function($query) use ($request){
          return $query->where('state', $request->query('state'));
        })
        ->paginate(5);

      return view('divisions.index', [
        'divisions' => $divisions,
        'request' => $request,
      ]);
    }
    */
    public function show($id)
    {
      $division = Division::find($id);
      if(!$division) throw new ModelNotFoundException;

      $divisionMembers = $division->members()->get();
      /*
      $members = array();
      foreach ($groupMembers as $member){
        $members[] = $member->id;
      }
      */
      return view('divisions.show', [
        'division' => $division,
        'members' => $divisionMembers
      ]);
    }

    public function edit($id)
    {
      $division = Division::find($id);
      if(!$division) throw new ModelNotFoundException;

      return view('divisions.edit', [
        'division' => $division
      ]);
    }

    public function update(Request $request, $id)
    {
      $division = Division::find($id);
      if(!$division) throw new ModelNotFoundException;

      $division->fill($request->all());

      $division->save();

      return redirect()->route('division.index');
    }

    public function apiShow($id){
      $division = Division::find($id);

      if($division){
        return $division;
      }else{
        return response()->json(null);
      }
    }

    public function index(){
      return view('divisions.index');
    }

    public function apiIndex(){
      $divisions = Division::orderBy('name', 'asc')->get();
      return $divisions;
    }
}
