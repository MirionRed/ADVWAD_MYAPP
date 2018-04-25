<?php
use App\Common;
  ?>
@extends('layouts.app')

@section('content')
<!-- Bootstrap Boilerplate... -->
<div class="panel-body">
  {!!Form::model($group, [
    'route' => ['group.updateAddMember', $group->id],
    'class' => 'form-horizontal'
    ])!!}
  @if (count($member) > 0)
  <table class="table table-striped task-table">

    <!-- Table Headings -->
    <thead>
      <tr>
        <th>No.</th>
        <th>NRIC</th>
        <th>Name</th>
        <th>Gender</th>
        <th>Address</th>
        <th>Postcode</th>
        <th>City</th>
        <th>State</th>
        <th>Phone</th>
        <th>Division ID</th>
        <th>Created</th>
        <!-- th>Actions</th -->
      </tr>
    </thead>

    <!-- Table Body -->
    <tbody>
      @foreach ($member as $i => $member)
      <tr>
        <td class="table-text">
          <div>{{ $i+1 }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->id }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->nric }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->name }}</div>
        </td>
        <td class="table-text">
          <div>{{ Common::$gender[$member->gender] }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->address }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->postcode }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->city }}</div>
        </td>
        <td class="table-text">
          <div>{{ Common::$states[$member->state] }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->phone }}</div>
        </td>
        <td class="table-text">
          <div>{{ $member->division_id }}</div>
        </td>
        <td class="table-text">
          <div>
            {!!Form::checkbox(
              'members_id[]',
              $member->id,
              (in_array($member->id, $memberId) ? true : false)
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
  {!!Form::close()!!}
  @else
  <div>
    No records found
  </div>
  @endif
</div>
@endsection
