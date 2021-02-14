@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header h2">Add contact</div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('contacts.store') }}">
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label">Name</label>
                                <input id="name"
                                       class="form-control {{ $errors->has('name') ? 'is-invalid' : '' }}"
                                       name="name"
                                       value="{{ old('name') ?? 'qwerty' }}"
                                       required
                                       maxlength="255">
                                @if($errors->has('name'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('name') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <label for="phone" class="col-form-label">Phone</label>
                                <input id="phone"
                                       type="tel"
                                       class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}"
                                       name="phone"
                                       value="{{ old('phone') ?? '+7-111' }}"
                                       required
                                       maxlength="63">
                                @if($errors->has('phone'))
                                    <span class="invalid-feedback"><strong>{{ $errors->first('phone') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" name="favorited" {{ old('favorited') ? ' checked' : '' }}> Favorited contact
                                    </label>
                                </div>
                                @if($errors->has('favorited'))
                                    <span
                                        class="invalid-feedback"><strong>{{ $errors->first('favorited') }}</strong></span>
                                @endif
                            </div>
                            <div class="form-group mb-0">
                                <button type="submit" class="btn btn-primary">Save contact</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
