@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your contacts:</div>
                <div class="card-body">
                    @include('contacts.contacts')
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
