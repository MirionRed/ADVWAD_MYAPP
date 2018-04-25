<?php
use App\Common;
?>
@extends('layouts.app')
@section('content')
  <h3>Upload Photo</h3>
  <h4>Membership No.: <em>{{$member->membership_no}}</em></h4>
  <h4>Member Name: <em>{{$member->name}}</em></h4>
  <div class="panel-body">
    @if($errors->any())
      <div class="alert alert-danger">
        <ul>
          @foreach($errors->all() as $error)
            <li>{{$error}}</li>
          @endforeach
        </ul>
      </div>
    @endif
    {!! Form::open([
        'route' => ['member.saveUpload', $member->id],
        'class' => 'form-horizontal',
        'enctype' => 'multipart/form-data',
      ])!!}

      <div class="form-group row">
        {!! Form::label('member-photo', 'Select File', [
            'class' => 'control-label col-sm-3',
          ])!!}
        <div class="col-sm-9">
          {!!Form::file('image', [
              'id' => 'member-photo-file',
              'class' => 'form-control',
            ])!!}
        </div>
      </div>

      <div class="form-group row">
        <div class="col-sm-offset-3 col-sm-6">
          {!! Form::button('Upload', [
            'type' => 'submit',
            'class' => 'btn btn-primary',
            ])!!}
          </div>
        </div>
        {!!Form::close()!!}
      </div>
    @endsection
