@extends('layouts.pegawai')
@section('title', 'Pegawai')
@section('content')
    <h2>Pegawai {{Auth::user()->userdetail->nm_lengkap}}</h2>
@endsection
