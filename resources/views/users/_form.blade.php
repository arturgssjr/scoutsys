<div class="form-group row">
    {!! Form::label('name', 'Nome', ['class' => 'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::text('name', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('birth', 'Data de Nascimento', ['class' => 'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::date('birth', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('email', 'E-mail', ['class' => 'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::text('email', null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('permission', 'Permissão', ['class' => 'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::select('permission', ['app.admin' => 'Administrador', 'app.coach' => 'Treinador', 'app.player' => 'Jogador'], null, ['class' => 'form-control', 'required', 'autofocus']) !!}
    </div>
</div>

<div class="form-group row">
    {!! Form::label('status', 'Status', ['class' => 'col-md-4 col-form-label']) !!}
    <div class="col-md-8">
        {!! Form::select('status', [1 => 'Ativo', 2 => 'Inativo', 3 => 'Bloqueado'], null, ['class' => 'form-control']) !!}
    </div>
</div>