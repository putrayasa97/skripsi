@extends('layouts.pemilik')
@section('title', 'Pemilik')
@section('content')
    <h2>Pemilik {{Auth::user()->userdetail->nm_lengkap}}</h2>
@endsection