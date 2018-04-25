<?php
use App\Common;
 ?>
@extends('layouts.app')
@section('content')
@include('group._filters')
<div class="panel-body">
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
            {!!link_to_route(
              'group.edit',
              $title = 'Edit',
              $parameters = [
                'id' => $group->id,
              ])!!}
            {!!link_to_route(
              'group.addMember',
              $title = 'Add Member',
              $parameters = [
                'id' => $group->id,
              ])!!}
          </div>
        </td>
      </tr>
      @endforeach
      {{$groups->links()}}
    </tbody>
  </table>
  @else
  <div>
    No records found
  </div>
  @endif
</div>
@endsection
