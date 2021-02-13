@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2">{{ $contact->name }}</div>
                    <div class="card-body">


                        <table class="table table-bordered table-striped">
                            <tbody>
                            <tr>
                                <td>
                                    Phone
                                </td>
                                <td>
                                    {{ $contact->phone }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Created
                                </td>
                                <td>
                                    {{ $contact->created_at->format('Y.m.d - H:i') }}
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Updated
                                </td>
                                <td>
                                    {{ $contact->created_at->format('Y.m.d - H:i') }}
                                </td>
                            </tr>
                            </tbody>
                        </table>
                        <div class="d-flex flex-wrap">
                            @if($contact->favorited)
                                <form method="POST" action="#" class="mr-3">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-primary btn-favorite"><i
                                            class="far fa-minus-square"></i> Remove from favorites
                                    </button>
                                </form>
                            @else
                                <form method="POST" action="#" class="mr-3">
                                    @csrf
                                    @method('PUT')
                                    <button class="btn btn-sm btn-success btn-favorite"><i
                                            class="far fa-plus-square"></i> Add from favorites
                                    </button>
                                </form>
                            @endif
                            <form method="POST" action="#" class="mr-3">
                                @csrf
                                @method('PUT')
                                <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit contact</button>
{{--                                <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span> Delete</button>--}}
                            </form>
{{--                            <form method="POST" action="{{ route('cabinet.favorites.remove', $advert) }}" class="mr-1">--}}
                                <form method="POST" action="#" class="mr-1">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Delete contact
{{--                                    </button>--}}
{{--                                    <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span> Delete--}}
{{--                                    </button>--}}
                                </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
