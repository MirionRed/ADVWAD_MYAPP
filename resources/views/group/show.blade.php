<?php
use App/Common;
 ?>
@extends('layouts.app')
@section('content')
<div class="panel-body">
  <table class="table table-striped task-table">
    <thead>
      <tr>
        <th>Attribute</th>
        <th>Value</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Code</td>
        <td>{{$group->code}}</td>
      </tr>
      <tr>
        <td>Name</td>
        <td>{{$group->name}}</td>
      </tr>
      <tr>
        <td>Description</td>
        <td>{{$group->description}}</td>
      </tr>
    </tbody>
  </table>
</div>
@endsection
