@extends('layouts.app')

@section('content')
    <container>
        <row>
            <grid :size="3"></grid>
            <grid :size="6">
                <ul>
                    <li><a href="/tracks">Tracks</a></li>
                    <li><a href="/collections">Colecciones</a></li>
                </ul>
            </grid>
        </row>
    </container>
@endsection
