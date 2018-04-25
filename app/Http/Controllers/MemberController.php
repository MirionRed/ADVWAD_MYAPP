<?php

namespace App\Http\Controllers;

use App\Rules\MembershipNo;
use Illuminate\Http\Request;
use App\Member;
use App\Group;
use App\Http\Requests\MemberUpdateFormRequest;
use App\Http\Requests\UploadPhotoRequest;
use Auth;

class MemberController extends Controller
{
    public function __construct(){
      $this->middleware('auth');
    }
    //
    public function create(){
      $member = new Member();
      return view('member.create', [
        'member' => $member,
      ]);
    }

    public function store(Request $request){
      $request->validate([
        'membership_no' => [
          'required',
          'unique:members',
          new MembershipNo,
        ],
        'nric' => [
          'required',
          'regex:/^([0-9]{2})([0-1]{1})([0-9]{1})([0-3]{1})([0-9]{1})([0-9]{6})$/',
        ],
        'name' => 'required|max:100',
        'address' => 'required|max:500',
        'postcode' => [
          'required',
          'regex:/^([0-9]{5})$/'
        ],
        'city' => 'required|max:50',
        'state' => 'required',
        'phone' => [
          'required',
          'regex:/^([0-9]{2,3})\-([0-9]{6,8})$/',
        ],
        'division_id' => 'required',
      ]);

      $member = new Member;
      $member->fill($request->all());
      $member->save();
      return redirect()->route('member.index');
    }
    /*
    public function index(){
      //$member = Member::orderBy('name', 'asc')->get();
      $members = Member::orderBy('name', 'asc')->paginate(5);
      return view('member.index', [
        'members' => $members
      ]);
    }
    */
    public function index(Request $request){

      //$user = Auth::user();
      //var_dump($user);exit;
      $this->authorize('view', Member::class);
      $members = Member::with('division:id,code,name')
        ->when($request->query('membership_no'), function($query) use ($request) {
          return $query->where('membership_no', $request->query('membership_no'));
        })
        ->when($request->query('nric'), function($query) use ($request) {
          return $query->where('nric', $request->query('nric'));
        })
        ->when($request->query('name'), function($query) use ($request) {
          return $query->where('name', 'like', '%'.$request->query('name').'%');
        })
        ->when($request->query('gender'), function($query) use ($request) {
          return $query->where('gender', $request->query('gender'));
        })
        ->when($request->query('division_id'), function($query) use ($request) {
          return $query->where('division_id', $request->query('division_id'));
        })
        ->paginate(5);
        return view('member.index', [
          'members' => $members,
          'request' => $request,
        ]);
    }

    public function show($id){
      $member = Member::find($id);
      if(!$member) throw new ModelNotFoundException;

      return view('member.show', [
          'member' => $member
      ]);
    }

    public function edit($id){
      $member = Member::find($id);
      if(!$member) throw new ModelNotFoundException;
      //$this->authorize('manage', Member::class);
      return view('member.edit',[
        'member' => $member
      ]);
    }
    /*
    public function update(Request $request, $id){
      $member = Member::find($id);
      if(!$member) throw new ModelNotFoundException;

      $member->fill($request->all());
      $member->save();
      return redirect()->route('member.index');
    }
    */
    public function update(MemberUpdateFormRequest $request, $id){
      $member = Member::find($id);
      if(!$member) throw new ModelNotFoundException;

      $member->fill($request->all());
      $member->save();
      return redirect()->route('member.index');
    }

    public function addGroup($id){
      $member = Member::find($id);
      $groups = Group::orderBy('code', 'asc')->get();
      $groupMembers = $member->groups()->get();
      $groupId = array();
      foreach($groupMembers as $groupMember){
        $groupId[] = $groupMember->id;
      }
      return view('member.addGroup',[
        'member' => $member,
        'groups' => $groups,
        'groupId' => $groupId
      ]);
    }

    public function updateAddGroup(Request $request, $id){
      $member = Member::find($id);
      $member->groups()->sync($request->input('groups_id'), true);
      return redirect()->route('member.index');
    }

    public function upload($id){
      $member = Member::find($id);
      if(!$member) throw new ModelNotFoundException;

      return view('member.upload', [
        'member' => $member,
      ]);
    }

    public function saveUpload(UploadPhotoRequest $request, $id){
      $file = $request->file('image');
      $path = $file->storeAs('public/members', $id.'.jpg');
      return redirect()->route('member.index');
    }
}
