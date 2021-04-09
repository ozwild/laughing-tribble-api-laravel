@extends('layouts.app')

@section('content')

    <container>
        <row>
            <grid>
                <h2>Tracks</h2>
                <track-crud
                    :url="`/api/v1/accounts/${'a94896b8-e432-4b6d-83fa-2476d8f6b42e'}/tracks`"></track-crud>
            </grid>
        </row>
    </container>
@endsection
