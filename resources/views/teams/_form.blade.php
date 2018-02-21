<div class="form-group row">
    {!! Form::label('name', 'Nome', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('foundation', 'Fundação', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::date('foundation', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('category_id', 'Categoria', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::select('category_id', $categories, null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('status_id', 'Status', ['class' => 'col-md-4 col-form-label text-md-right']) !!}
    <div class="col-md-6">
        {!! Form::select('status_id', $status, null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>