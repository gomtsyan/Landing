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
            <form class="form-horizontal" action="{{ route('workerAdd') }}" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="firstName" class="col-xs-2 control-label">firstName</label>
                    <div class="col-xs-8">
                        <input type="text" name="firstName" value="{{ old('firstName') }}" id="firstName" class="form-control" placeholder="Enter the firstName of Worker">
                    </div>
                </div>

                <div class="form-group">
                    <label for="lastName" class="col-xs-2 control-label">lastName</label>
                    <div class="col-xs-8">
                        <input type="text" name="lastName" value="{{ old('lastName') }}" id="lastName" class="form-control" placeholder="Enter the lastName of Worker">
                    </div>
                </div>

                <div class="form-group">
                    <label for="position" class="col-xs-2 control-label">Position</label>
                    <div class="col-xs-8">
                        <input type="text" name="position" value="{{ old('position') }}" id="position" class="form-control" placeholder="Enter the position of Worker">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text" class="col-xs-2 control-label">Text</label>
                    <div class="col-xs-8">
                        <textarea name="text"  id="editor" class="form-control" placeholder="Enter the text of worker">{{ old('text') }}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <label for="images" class="col-xs-2 control-label">Image</label>
                    <div class="col-xs-8">
                        <input type="file" name="images" value="{{ old('images') }}" class="filestyle" data-buttonText="Choose file">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <input type="submit" class="btn btn-primary">
                    </div>
                </div>

                {{ csrf_field() }}

            </form>
        </div>
    </div>
</div>