@extends('layouts.app')

@section('content')
    <container>
        <row>
            <grid :size="4"><a href="/tracks"><h2>Tracks</h2></a></grid>
            <grid :size="4"><a href="/collections"><h2>Collections</h2></a></grid>
        </row>
    </container>
@endsection
