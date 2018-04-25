<?php

use App\Common;

?>
@extends('layouts.app')

@section('content')

<!-- Bootstrap Boilerplate... -->

<div id="division-show" class="panel-body"></div>
  <script>
    var __props = {
      url:"{{ route('division.api-show', $division->id) }}",
    };
  </script>
@endsection
