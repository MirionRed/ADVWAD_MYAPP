<?php
use App\Common;
?>
@extends('layouts.app')

@section('content')
  <div id="practical7-index" class="panel-body"></div>
  <script>
    var __props = {
      url: "{{ route('practical7.api-index') }}",
    };
  </script>
@endsection
