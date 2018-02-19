<div class="form-group row{{ $errors->has('name') ? ' has-error' : '' }}">
    {!! Form::label('name', 'Nome', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row{{ $errors->has('foundation') ? ' has-error' : '' }}">
    {!! Form::label('foundation', 'Fundação', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::date('foundation', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>