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
                        <a href="{{ route('clientAdd') }}" class="btn btn-sm btn-primary">Add</a>
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
                    @foreach($clients as $client)
                        <tr class="">
                            <td>{{ $client['id'] }}</td>
                            <td><a href="{{ route('clientEdit', ['client'=> $client['id']]) }}" alt="{{ $client['name'] }}">{{ $client['name'] }}</a></td>

                            <td>
                                <div class="card bg-gradient-danger p-2" style="width: 10rem;">
                                    <img src="{{ asset('assets/img/'.$client['images']) }}" alt="{{ $client['images'] }}" class="card-img" >
                                </div>
                            </td>
                            <td>{{ $client['created_at'] }}</td>
                            <td>
                                <form class="form-horizontal m-2" action="{{ route('clientEdit', ['client'=>$client['id']]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm col">
                                </form>
                                <div class="m-2">
                                    <a href="{{ route('clientEdit', ['client'=> $client['id']]) }}" class="btn btn-info btn-sm col" alt="{{ $client['name'] }}">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>