<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div class="panel-body">
  <!-- New Division Form -->
  {!! Form::model($division, [
    'route' => ['division.store'],
    'class' => 'form-horizontal'
  ]) !!}

  <!-- Code -->
  <div class="form-group row">
    {!! Form::label('division-code', 'Code', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
      {!! Form::text('code', null, [
      'id' => 'division-code-text',
      'class' => 'form-control',
      'maxlength' => 3,
      ]) !!}
    </div>
  </div>

  <!-- Name -->
  <div class="form-group row">
    {!! Form::label('division-name', 'Name', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
    {!! Form::text('name', null, [
      'id' => 'division-name-text',
      'class' => 'form-control',
      'maxlength' => 100,
    ]) !!}

    </div>
  </div>

  <!-- Address -->
  <div class="form-group row">
    {!! Form::label('division-address', 'Address', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
      {!! Form::textarea('address', null, [
      'id' => 'division-address-textarea',
      'class' => 'form-control',
      ]) !!}
    </div>
  </div>

  <!-- Postcode -->
  <div class="form-group row">
    {!! Form::label('division-postcode', 'Postcode', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
    {!! Form::text('postcode', null, [
      'id' => 'division-postcode-text',
      'class' => 'form-control',
      'maxlength' => 5,
    ]) !!}
    </div>
  </div>

  <!-- City -->
  <div class="form-group row">
    {!! Form::label('division-city', 'City', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">
    {!! Form::text('city', null, [
      'id' => 'division-city-text',
      'class' => 'form-control',
      'maxlength' => 50,
    ]) !!}
    </div>
  </div>

  <!-- State -->
  <div class="form-group row">
    {!! Form::label('division-state', 'State', [
      'class' => 'control-label col-sm-3',
    ]) !!}
    <div class="col-sm-9">

    {!! Form::select('state', Common::$states, null, [
      'id' => 'division-state-select',
      'class' => 'form-control',
      'placeholder' => '- Select State -',
    ]) !!}
    </div>
  </div>

  <!-- Submit Button -->
  <div class="form-group row">

    <div class="col-sm-offset-3 col-sm-6">
    {!! Form::button('Save', [
      //'type' => 'submit',
      'type' => 'button',
      'class' => 'btn btn-primary',
      'onclick' => 'onClick()',
    ]) !!}
      <script>
        function onClick(){
          var url = '{{route('division.store')}}';
          /*
          var data = {
            code: document.getElementById('division-code-text').value,
            name: document.getElementById('division-name-text').value,
            address: document.getElementById('division-address-textarea').value,
            postcode: document.getElementById('division-postcode-text').value,
            city: document.getElementById('division-city-text').value,
            state: document.getElementById('division-state-select').value,
          };

          var status = null;
          var statusText = null;

          var metas = document.getElementsByTagName('meta');
          var csrfToken;
          for (var i=0; i<metas.length; i++) {
            if (metas[i].getAttribute("name") == "csrf-token") {
              csrfToken = metas[i].getAttribute("content");
            }
          }

          fetch(url, {
            method: 'POST',
            headers: {
              Accept: 'application/json',
              'Content-Type': 'application/json',
              'X-CSRF-TOKEN': csrfToken,
            },
            credentials: 'same-origin',
            body: JSON.stringify(data),
          })
          .then(
            response => {
              status = response.status;
              statusText = response.statusText;
              return response.json();
            }
          )
          .then(
            response => {
              if(status === 200){
                console.log(response);
              } else if (status === 422){

              } else {
                throw Error([status, statusText].join(' '));
              }
            }
          )
          .catch(error=>alert(error));
          */
          var formData = new FormData();
          var metas = document.getElementsByTagName('meta');
          var csrfToken;
          for (var i=0; i<metas.length; i++) {
            if (metas[i].getAttribute("name") == "csrf-token") {
              csrfToken = metas[i].getAttribute("content");
            }
          }
          console.log(csrfToken);
          formData.append('__token', csrfToken);
          formData.append('code', document.getElementById('division-code-text').value);
          formData.append('name', document.getElementById('division-name-text').value);
          formData.append('address', document.getElementById('division-address-textarea').value);
          formData.append('postcode', document.getElementById('division-postcode-text').value);
          formData.append('city', document.getElementById('division-city-text').value);
          formData.append('state', document.getElementById('division-state-select').value);
          console.log(formData);
          var status = null;
          var statusText = null;
          fetch(url, {
            method: 'POST',
            headers: {
              Accept: 'application/json',
              'X-CSRF-TOKEN': csrfToken,
            },
            credentials: 'same-origin',
            body: formData,
          })
          .then(
            response => {
              status = response.status;
              statusText = response.statusText;
              return response.json();
            }
          )
          .then(
            response => {
              if(status === 200){
                console.log(response);
              } else if (status === 422){

              } else {
                throw Error([status, statusText].join(' '));
              }
            }
          )
          .catch(error=>alert(error));
        }
      </script>
    </div>
  </div>
  {!! Form::close() !!}
</div>

@endsection
