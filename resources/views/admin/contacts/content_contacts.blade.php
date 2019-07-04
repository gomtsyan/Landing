<div class="col">
    <div class="card shadow">
        <div class="card-header border-0">
            <div class="row align-items-center">
                <div class="col">
                    <span>
                        <h3 class="mb-0">{{ $title }} table</h3>
                    </span>
                </div>
                <div class="col text-right">
                    <span>
                        <a href="{{ route('contactAdd') }}" class="btn btn-sm btn-primary">Add</a>
                    </span>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table">
                <thead class="thead-light">
                    <tr>
                        @foreach($fields as $filed)
                            <th >{{ $filed }}</th>
                        @endforeach
                            <th ></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($contacts as $contact)
                        <tr class="">
                            <td>{{ $contact['id'] }}</td>
                            <td><a href="{{ route('contactEdit', ['contact'=> $contact['id']]) }}" alt="{{ $contact['name'] }}">{{ $contact['name'] }}</a></td>
                            <td>{{ $contact['value'] }}</td>

                            <td>{{ $contact['created_at'] }}</td>
                            <td>
                                <form class="form-horizontal m-2" action="{{ route('contactEdit', ['contact'=>$contact['id']]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm col">
                                </form>
                                <div class="m-2">
                                    <a href="{{ route('contactEdit', ['contact'=> $contact['id']]) }}" class="btn btn-info btn-sm col" alt="{{ $contact['name'] }}">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>