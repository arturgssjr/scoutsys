<?php

// Home
Breadcrumbs::register('home', function ($breadcrumbs) {
    $breadcrumbs->push('Início', route('home'));
});

// Usuários
Breadcrumbs::register('user.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Usuário', route('user.index'));
});

// Usuários / Visualizar
Breadcrumbs::register('user.show', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push($user->name, route('user.show', $user->id));
});

// Usuários / Cadastrar
Breadcrumbs::register('user.create', function ($breadcrumbs) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('Cadastrar', route('user.create'));
});

// Usuários / Alterar
Breadcrumbs::register('user.edit', function ($breadcrumbs, $user) {
    $breadcrumbs->parent('user.index');
    $breadcrumbs->push('Alterar', route('user.edit', $user->id));
});

// Equipes
Breadcrumbs::register('team.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Equipe', route('team.index'));
});

// Equipes / Visualizar
Breadcrumbs::register('team.show', function ($breadcrumbs, $team) {
    $breadcrumbs->parent('team.index');
    $breadcrumbs->push($team->name, route('team.show', $team->id));
});

// Equipes / Cadastrar
Breadcrumbs::register('team.create', function ($breadcrumbs) {
    $breadcrumbs->parent('team.index');
    $breadcrumbs->push('Cadastrar', route('team.create'));
});

// Equipes / Alterar
Breadcrumbs::register('team.edit', function ($breadcrumbs, $team) {
    $breadcrumbs->parent('team.index');
    $breadcrumbs->push('Alterar', route('team.edit', $team->id));
});

// Status
Breadcrumbs::register('status.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Status', route('status.index'));
});

// Status / Visualizar
Breadcrumbs::register('status.show', function ($breadcrumbs, $status) {
    $breadcrumbs->parent('status.index');
    $breadcrumbs->push($status->description, route('status.show', $status->id));
});

// Status / Cadastrar
Breadcrumbs::register('status.create', function ($breadcrumbs) {
    $breadcrumbs->parent('status.index');
    $breadcrumbs->push('Cadastrar', route('status.create'));
});

// Status / Alterar
Breadcrumbs::register('status.edit', function ($breadcrumbs, $status) {
    $breadcrumbs->parent('status.index');
    $breadcrumbs->push('Alterar', route('status.edit', $status->id));
});

// Categorias
Breadcrumbs::register('category.index', function ($breadcrumbs) {
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Categoria', route('category.index'));
});

// Categorias / Visualizar
Breadcrumbs::register('category.show', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('category.index');
    $breadcrumbs->push($category->description, route('category.show', $category->id));
});

// Categorias / Cadastrar
Breadcrumbs::register('category.create', function ($breadcrumbs) {
    $breadcrumbs->parent('category.index');
    $breadcrumbs->push('Cadastrar', route('category.create'));
});

// Categorias / Alterar
Breadcrumbs::register('category.edit', function ($breadcrumbs, $category) {
    $breadcrumbs->parent('category.index');
    $breadcrumbs->push('Alterar', route('category.edit', $category->id));
});