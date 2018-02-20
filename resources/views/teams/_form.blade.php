<div class="form-group row">
    {!! Form::label('name', 'Nome', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('foundation', 'Fundação', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::date('foundation', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('category_id', 'Categoria', ['class' => 'col-md-2 col-form-label']) !!}
    <div class="col-md-10">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>