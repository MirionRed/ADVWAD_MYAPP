<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')
  <div id="division-index" class="panel-body"></div>
  <script>
    var __props = {
      url: "{{ route('division.api-index') }}",
    };
  </script>
@endsection
