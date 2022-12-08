<form action="{{route('medic.actualizar')}}" method="post" enctype="multipart/form-data">
    @csrf
    Select image to upload:
  <input type="file" name="img" id="fileToUpload">
<input type="text" name="a">
  <input type="submit" value="Upload Image" name="submit">
</form>