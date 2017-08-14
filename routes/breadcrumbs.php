<?php

// Home
Breadcrumbs::register('home', function($breadcrumbs)
{
    $breadcrumbs->push('Home', route('home'));
});

// Home > About
Breadcrumbs::register('tentang', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Tentang', route('tentang'));
});

Breadcrumbs::register('survey', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Survey', route('survey'));
});

Breadcrumbs::register('keluhan', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Keluhan', route('keluhan'));
});

Breadcrumbs::register('buku_tamu', function($breadcrumbs)
{
    $breadcrumbs->parent('home');
    $breadcrumbs->push('Daftar Tamu', route('buku_tamu'));
});

Breadcrumbs::register('backend/dashboard', function($breadcrumbs)
{
    $breadcrumbs->push('Dashboard', route('backend/dashboard'));
});

Breadcrumbs::register('backend/keluhan', function($breadcrumbs)
{
    $breadcrumbs->parent('backend/dashboard');
    $breadcrumbs->push('Keluhan', route('backend/keluhan'));
});

Breadcrumbs::register('backend/tentang-kami', function($breadcrumbs)
{
    $breadcrumbs->parent('backend/dashboard');
    $breadcrumbs->push('Tentang Kami', url('backend/tentang-kami'));
});

Breadcrumbs::register('backend/survey', function($breadcrumbs)
{
    $breadcrumbs->parent('backend/dashboard');
    $breadcrumbs->push('Survey', url('backend/survey'));
});