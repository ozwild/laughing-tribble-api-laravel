@extends('layouts.app')

@section('content')
    <app :user-id="{{ Auth::id() }}"></app>
@endsection
