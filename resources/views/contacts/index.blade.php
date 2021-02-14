@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-2">
                <div class="card-header h2">Favorited contacts:</div>
                <div class="card-body">
                    @include('contacts.partials._contacts', ['contacts' => $favorites])
                </div>
            </div>
            <div class="card">
                <div class="card-header h2">Contacts:</div>
                <div class="card-body">
                    @include('contacts.partials._contacts', ['contacts' => $contacts])
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
