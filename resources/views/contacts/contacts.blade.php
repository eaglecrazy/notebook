<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th>Name</th>
            <th>Phone</th>
            <th>Favorite</th>
            <th>Edit</th>
            <th>Delete</th>
        </tr>
        </thead>
        <tbody>

        @foreach ($contacts as $contact)
            <tr>
                <td>
{{--                                        <a href="{{ route('cabinet.banners.show', $banner) }}" target="_blank">{{ $banner->name }}</a></td>--}}
                    <a href="#">{{ $contact->name }}</a>
                </td>
                <td>
                    {{ $contact->phone }}
                </td>
                <td>
                    {{ $contact->favorite_contact ? 'Y' : '' }}
                </td>
                <td>
                    edit
                </td>
                <td>
                    delete
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>
</div>
