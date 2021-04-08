@extends('layouts.app')

@section('content')
    <container>
        <ui-form
            :url="`/api/v1/accounts/${'a94896b8-e432-4b6d-83fa-2476d8f6b42e'}/collections`"
            id="41b0b6f9-f97e-42ec-a915-008ef762ebc0"
        >
            <template v-slot="{data}">

                <h1>@{{ data.title }} Collection</h1>
                <row>
                    <grid :size="6">
                        <ui-field v-model="data.title"
                                  id="title-field"
                                  placeholder="Title..."
                                  label="Title"
                        ></ui-field>
                    </grid>
                    <grid :size="6">
                        <ui-field v-model="data.art_url"
                                  id="art-field"
                                  placeholder="Art (URL)..."
                                  label="Art (URL)"
                        ></ui-field>
                    </grid>
                </row>

            </template>
        </ui-form>
    </container>
@endsection
