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
                    <a href="{{ route('workerAdd') }}" class="btn btn-sm btn-primary">Add</a>
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
                @foreach($workers as $worker)
                    <tr class="">
                        <td>{{ $worker['id'] }}</td>
                        <td scope="row">
                            <div class="media align-items-center">
                                <a href="#" class="avatar rounded-circle">
                                    <img src="{{ asset('assets/img/'.$worker['images']) }}" alt="{{ $worker['images'] }}" >
                                </a>
                                <div class="media-body">
                                    {{ $worker['firstName'].' '.$worker['lastName'] }}
                                </div>
                            </div>
                        </td>
                        <td>{{ $worker['position'] }}</td>
                        <td>{{ $worker['text'] }}</td>

                        <td>{{ $worker['created_at'] }}</td>
                        <td>
                            <form class="form-horizontal m-2" action="{{ route('workerEdit', ['worker'=> $worker['id']]) }}" method="post">
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                                <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm col">
                            </form>
                            <div class="m-2">
                                <a href="{{ route('workerEdit', ['worker'=> $worker['id']]) }}" class="btn btn-info btn-sm col" alt="{{ $worker['firstName'] }}">Edit</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>