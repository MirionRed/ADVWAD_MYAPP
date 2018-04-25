<?php
use App\Common;
use App\Division;
 ?>
<section class="filters">
  {!!Form::open([
    'route' => ['member.index'],
    'method' => 'get',
    'class' => 'form-inline'
  ])!!}
  <table>
    <tr>
      <td>
        {!!Form::label('member-membership-no', 'Membership no.',[
            'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::text('membership_no', null, [
            'id' => 'member-membership_no',
            'class' => 'form-control col-sm-9',
            'maxlength' => 10,
        ])!!}
      </td>
      <td>
        {!!Form::label('member-nric', 'NRIC No.',[
            'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::text('nric', null, [
            'id' => 'member-nric',
            'class' => 'form-control',
            'maxlength' => 12,
        ])!!}
      </td>
    </tr>
    <tr>
      <td>
        {!!Form::label('member-name', 'Name', [
            'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::text('name', null, [
            'id' => 'member-name',
            'class' => 'form-control',
            'maxlength' => 100,
        ])!!}
      </td>
      <td>
        {!!Form::label('member-gender', 'Gender', [
            'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::select('gender', Common::$gender, null, [
            'class' => 'form-control',
            'placeholder' => '- All -'
        ])!!}
      </td>
    </tr>
    <tr>
      <td>
        {!!Form::label('member-division_id', 'Division', [
            'class' => 'control-label col-sm-9',
        ])!!}
      </td>
      <td>
        {!!Form::select('division_id',
          Division::pluck('name', 'id'),
          null, [
              'class' => 'form-control',
              'placeholder' => '- All -',
        ])!!}
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
