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
            <form class="form-horizontal" action="{{ route('pageEdit', ['page'=>$old['id']]) }}" method="POST" enctype="multipart/form-data">

                <input type="hidden" name="id" value="{{ $old['id'] }}">

                <div class="form-group">
                    <label for="name" class="col-xs-2 control-label">Name</label>
                    <div class="col-xs-8">
                        <input type="text" name="name" value="{{ $old['name'] }}" id="name" class="form-control" placeholder="Enter the name of page">
                    </div>
                </div>

                <div class="form-group">
                    <label for="alias" class="col-xs-2 control-label">Alias</label>
                    <div class="col-xs-8">
                        <input type="text" name="alias" value="{{ $old['alias'] }}" id="alias" class="form-control" placeholder="Enter the alias of page">
                    </div>
                </div>

                <div class="form-group">
                    <label for="text" class="col-xs-2 control-label">Text</label>
                    <div class="col-xs-8">
                        <textarea name="text"  id="editor" class="form-control" placeholder="Enter the text of page">{{ $old['text'] }}</textarea>
                    </div>
                </div>

                <div class="form-group align-items-center">

                    <div class="card align-items-center" style="width: 18rem;">
                        <img class="card-img-top" src="{{ asset('assets/img/'.$old['images']) }}" alt="Card image cap">
                        <input type="hidden" name="old_images" value="{{ $old['images'] }}">
                        <div class="card-body">
                            <label for="images" class="col-xs-2 control-label">Image</label>
                            <div class="col-xs-8">
                                <input type="file" name="images" value="" class="filestyle" data-buttonText="Choose file">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-xs-offset-2 col-xs-10">
                        <input type="submit" value="Save" class="btn btn-primary">
                    </div>
                </div>

                {{ csrf_field() }}

            </form>
        </div>
    </div>
</div>



<script>
    ClassicEditor
        .create( document.querySelector( '#editor' ), {
            // toolbar: [ 'heading', '|', 'bold', 'italic', 'link' ]
        } )
        .then( editor => {
            window.editor = editor;
        } )
        .catch( err => {
            console.error( err.stack );
        } );
</script>