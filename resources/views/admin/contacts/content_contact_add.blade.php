<div class="col">
    <div class="card shadow">
        <div class="card-header border-0 ">
            <div class="row align-items-center">
                <div class="col">
                <span>
                    <h3 class="mb-0">{{ $title }}</h3>
                </span>
                </div>
            </div>
        </div>


        <div class="card-body ">
            <form class="form-horizontal" action="{{ route('contactAdd') }}" method="POST" enctype="multipart/form-data">

                <div class="form-group">
                    <label for="name" class="col-xs-2 control-label">Name</label>
                    <div class="col-xs-8">
                        <input type="text" name="name" value="{{ old('name') }}" id="name" class="form-control" placeholder="Enter the name of Contact">
                    </div>
                </div>

                <div class="form-group">
                    <label for="value" class="col-xs-2 control-label">Value</label>
                    <div class="col-xs-8">
                        <input type="text" name="value" value="{{ old('value') }}" id="value" class="form-control" placeholder="Enter the value of Contact">
                    </div>
                </div>



                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <input type="submit"  class="btn btn-primary">
                    </div>
                </div>

                {{ csrf_field() }}

            </form>
        </div>
    </div>
</div>