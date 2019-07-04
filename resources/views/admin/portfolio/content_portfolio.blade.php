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
                        <a href="{{ route('portfolioAdd') }}" class="btn btn-sm btn-primary">Add</a>
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
                    @foreach($portfolios as $portfolio)
                        <tr class="">
                            <td>{{ $portfolio['id'] }}</td>
                            <td><a href="{{ route('portfolioEdit', ['portfolio'=> $portfolio['id']]) }}" alt="{{ $portfolio['name'] }}">{{ $portfolio['name'] }}</a></td>

                            <td>
                                <div class="card" style="width: 10rem;">
                                    <img src="{{ asset('assets/img/'.$portfolio['images']) }}" alt="{{ $portfolio['images'] }}" class="card-img" >
                                </div>
                            </td>
                            <td>{{ $portfolio['filter'] }}</td>
                            <td>{{ $portfolio['created_at'] }}</td>
                            <td>
                                <form class="form-horizontal m-2" action="{{ route('portfolioEdit', ['portfolio'=>$portfolio['id']]) }}" method="post">
                                    {{ method_field('DELETE') }}
                                    {{ csrf_field() }}
                                    <input type="submit" name="delete" value="Delete" class="btn btn-danger btn-sm col">
                                </form>
                                <div class="m-2">
                                    <a href="{{ route('portfolioEdit', ['portfolio'=> $portfolio['id']]) }}" class="btn btn-info btn-sm col" alt="{{ $portfolio['name'] }}">Edit</a>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>