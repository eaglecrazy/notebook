<div class="table-responsive">
    <table class="table table-striped table-hover">
        <thead>
        <tr>
            <th class="w-25">Name</th>
            <th class="w-25">Phone</th>
            <th>Favorite</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($contacts as $contact)
            <tr>
                <td>
                    <a href="{{ route('contacts.show', $contact) }}">{{ $contact->name }}</a>
                </td>
                <td>
                    {{ $contact->phone }}
                </td>
                <td>
                    @if($contact->favorited)
                        <form method="POST" action="#" class="mr-1">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-sm btn-primary btn-favorite"><i class="far fa-minus-square"></i> Remove from favorites</button>
                            {{--                        <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span> Delete</button>--}}
                        </form>
                    @else
                        <form method="POST" action="#" class="mr-1">
                            @csrf
                            @method('PUT')
                            <button class="btn btn-sm btn-success btn-favorite"><i class="far fa-plus-square"></i> Add from favorites</button>
                            {{--                        <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span> Delete</button>--}}
                        </form>
                    @endif
                </td>
                <td>
                    <form method="POST" action="#" class="mr-1">
                        @csrf
                        @method('PUT')
                        <button class="btn btn-sm btn-info"><i class="fa fa-edit"></i> Edit contact</button>
                        {{--                        <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span> Delete</button>--}}
                    </form>
                </td>
                <td>
{{--                    <form method="POST" action="{{ route('cabinet.favorites.remove', $advert) }}" class="mr-1">--}}
                    <form method="POST" action="#" class="mr-1">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-sm btn-danger"><i class="fa fa-ban"></i> Delete contact</button>
{{--                        <button class="btn btn-sm btn-danger"><span class="fa fa-remove"></span> Delete</button>--}}
                    </form>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
