<?php
use App\Common;
 ?>
 @extends('layouts.app')
 @section('content')
 <div class="panel-body">
   {!!Form::model($groups, [
     'route' => ['member.updateAddGroup', $member->id],
     'class' => 'form-horizontal'
     ])!!}
   @if(count($groups)>0)
   <table class="table table-striped task-table">
     <thead>
       <tr>
         <th>No.</th>
         <th>Code</th>
         <th>Name</th>
       </tr>
     </thead>
     <tbody>
       @foreach($groups as $i => $group)
       <tr>
         <td class="table-text">
           <div>{{$i+1}}</div>
         </td>
         <td class="table-text">
           <div>
             {!!link_to_route(
               'group.show',
               $title = $group->code,
               $parameters = [
                 'id' => $group->id,
               ])!!}
           </div>
         </td>
         <td class="table-text">
           <div>{{$group->name}}</div>
         </td>
         <td class="table-text">
           <div>
             {!!Form::checkbox(
               'groups_id[]',
               $group->id,
               (in_array($group->id, $groupId) ? true : false)
               )!!}
           </div>
         </td>
       </tr>
       @endforeach
     </tbody>
   </table>
   <div class="form-group row">
     <div class="col-sm-6">
       {!!Form::button('Add', [
         'type' => 'submit',
         'class' => 'btn btn-primary',
       ])!!}
     </div>
   </div>
   @else
   <div>
     No records found
   </div>
   @endif
 </div>
 @endsection
