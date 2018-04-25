<?php
use App\Common;
 ?>
<section class="filters">
  {!!Form::open([
    'route' => ['group.index'],
    'method' => 'get',
    'class' => 'form-inline'
    ])!!}
  <table>
    <tr>
      <td>
        {!!Form::label('group-name', 'Name', [
          'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::text('name', null, [
          'id' => 'group-name',
          'class' => 'form-control col-sm-9',
          'maxlength' => 100
        ])!!}
      </td>
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
