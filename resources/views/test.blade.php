<form action="/api/donation/create" method="post" enctype="multipart/form-data">
    @csrf
    <input type="file" name="image" class="form-control-file" id="exampleFormControlFile1">
    <input type="submit">
</form>