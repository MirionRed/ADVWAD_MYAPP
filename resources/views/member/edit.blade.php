<?php
  use App\Division;
  use App\Common;
?>

@extends('layouts.app')

@section('content')

  <div class="panel-body">
    @if($errors->any())
      <div class='alert alert-danger'>
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    <!-- New Division Form -->
    {!! Form::model($member, [
      'route' => ['member.update', $member->id],
      'method' => 'put',
      'class' => 'form-horizontal'
    ]) !!}

    <!-- Member No -->
    <div class="form-group row">
      {!! Form::label('member-no', 'Membership No.', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('membership_no', null, [
          'id' => 'member-no',
          'class' => 'form-control',
        ]) !!}
      </div>
    </div>

    <!-- NRIC -->
    <div class="form-group row">
      {!! Form::label('member-nric', 'NRIC', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('nric', null, [
          'id' => 'member-nric',
          'class' => 'form-control',
        ]) !!}
      </div>
    </div>

    <!-- Name -->
    <div class="form-group row">
      {!! Form::label('member-name', 'Name', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('name', null, [
          'id' => 'member-name',
          'class' => 'form-control',
          'maxlength' => 100,
        ]) !!}
      </div>
    </div>

    <!-- Gender -->
    <div class="form-group row">
      {!! Form::label('member-gender', 'Gender', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::select('gender', Common::$gender, null, [
          'class' => 'form-control',
          'placeholder' => '- Select Gender -',
        ]) !!}
      </div>
    </div>

    <!-- Address -->
    <div class="form-group row">
      {!! Form::label('member-address', 'Address', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::textarea('address', null, [
          'id' => 'member-address',
          'class' => 'form-control',
        ]) !!}
      </div>
    </div>

    <!-- Postcode -->
    <div class="form-group row">
      {!! Form::label('member-postcode', 'Postcode', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('postcode', null, [
          'id' => 'member-postcode',
          'class' => 'form-control',
          'maxlength' => 5,
        ]) !!}
      </div>
    </div>

    <!-- City -->
    <div class="form-group row">
      {!! Form::label('member-city', 'City', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('city', null, [
          'id' => 'member-city',
          'class' => 'form-control',
          'maxlength' => 50,
        ]) !!}
      </div>
    </div>

    <!-- State -->
    <div class="form-group row">
      {!! Form::label('member-state', 'State', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">

        {!! Form::select('state', Common::$states, null, [
          'class' => 'form-control',
          'placeholder' => '- Select State -',
        ]) !!}
      </div>
    </div>

    <!-- Phone -->
    <div class="form-group row">
      {!! Form::label('member-phone', 'Phone', [
        'class' => 'control-label col-sm-3',
      ]) !!}
      <div class="col-sm-9">
        {!! Form::text('phone', null, [
          'id' => 'member-phone',
          'class' => 'form-control',
          'maxlength' => 20,
        ]) !!}
      </div>
    </div>

  <!-- State -->
  <div class="form-group row">
    {!! Form::label('member-div-id', 'Division Id', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">

      {!! Form::select('division_id',
        Division::pluck('name', 'id'),
        null, [
        'id' => 'member-div-id',
        'placeholder' => '- Select Division -',
      ]) !!}
    </div>
  </div>

  <!-- Submit Button -->
  <div class="form-group row">
    <div class="col-sm-offset-3 col-sm-6">
      {!! Form::button('Save', [
        'type' => 'submit',
        'class' => 'btn btn-primary',
      ]) !!}
    </div>
  </div>
  {!! Form::close() !!}
</div>


@endsection
