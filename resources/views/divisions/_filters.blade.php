<?php
use App\Common;
?>
<section class="filters">
  {!!Form::open([
      'route' => ['division.index'],
      'method' => 'get',
      'class' => 'form-inline'
  ])!!}
  <table>
    <tr>
      <td>
        {!!Form::label('division-code', 'Code', [
            'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::text('code', null, [
            'id' => 'division-code',
            'class' => 'form-control col-sm-9',
            'maxlength' => 3,
        ])!!}
      </td>
    </tr>
    <tr>
      <td>
        {!!Form::label('division-name', 'Name', [
            'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::text('name', null, [
            'id' => 'division-name',
            'class' => 'form-control',
            'maxlength' => 100,
        ])!!}
      </td>
    </tr>
    <tr>
      <td>
        {!! Form::label('division-state', 'State', [
          'class' => 'control-label col-sm-3',
        ]) !!}
      </td>
      <td>
        {!! Form::select('state', Common::$states, null, [
          'class' => 'form-control',
          'placeholder' => '- Select State -',
        ]) !!}
      </td>
    </tr>
    <tr>
      <td>
        {!!Form::button('Filter', [
            'type' => 'submit',
            'class' => 'btn btn-primary',
        ])!!}
      </td>
    </tr>
  </table>
  {!!Form::close()!!}
   </div>
</section>
