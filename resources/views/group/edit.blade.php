<?php
use App\Common;
?>
@extends('layouts.app')
@section('content')
<div class="panel-body">
  {!!Form::model($group, [
    'route' => ['group.update', $group->id],
    'method' => 'put',
    'class' => 'form-horizontal'
    ])!!}
    <div class="form-group row">
      {!!Form::label('group-code', 'Code', [
        'class' => 'control-label col-sm-3'
      ])!!}
      <div class="col-sm-9">
        {!!Form::text('code', $group->code, [
          'id' => 'group',
          'class' => 'form-control',
          'maxlength' => 3,
        ])!!}
      </div>
    </div>
    <div class="form-group row">
      {!!Form::label('group-name', 'Name', [
        'class' => 'control-label col-sm-3',
      ])!!}
      <div class="col-sm-9">
        {!!Form::text('name', $group->name, [
          'id' => 'group-name',
          'class' => 'form-control',
          'maxlength' => 100,
        ])!!}
      </div>
    </div>
    <div class="form-group row">
      {!!Form::label('group-description', 'Description', [
        'class'=>'control-label col-sm-3',
      ])!!}
      <div class="col-sm-9">
        {!!Form::textarea('address', $group->description, [
          'id' => 'group-description',
          'class' => 'form-control',
        ])!!}
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-offset-3 col-sm-6">
        {!!Form::button('Update', [
          'type' => 'submit',
          'class' => 'btn btn-primary',
        ])!!}
      </div>
    </div>
    {!!Form::close()!!}
</div>
@endsection
