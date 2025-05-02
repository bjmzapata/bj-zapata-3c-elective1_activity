<!DOCTYPE html>
<html>
<head>
    <title>Laravel Image Upload (Single + Multiple)</title>
    <style>
        .photo-box {
            display: inline-block;
            margin: 10px;
            border: 1px solid #ccc;
            padding: 5px;
        }
        .photo-box img {
            width: 150px;
            height: auto;
        }
    </style>
</head>
<body>
    @if(session('success'))
        <p style="color: green;">{{ session('success') }}</p>
    @endif

    <h1>Single Image Upload</h1>
    <form action="{{ route('photos.store.single') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="image" required>
        <button type="submit">Upload</button>
    </form>

    <h1>Multiple Image Upload</h1>
    <form action="{{ route('photos.store.multiple') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <input type="file" name="images[]" multiple required>
        <button type="submit">Upload</button>
    </form>

    <hr>

    <h2>Uploaded Images</h2>
    <div>
        @foreach($photos as $photo)
            <div class="photo-box">
                <img src="{{ asset('images/' . $photo->image) }}" alt="Image">
                <form action="{{ route('photos.destroy', $photo->id) }}" method="POST" onsubmit="return confirm('Delete this photo?')">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </div>
        @endforeach
    </div>
    <div>
    {{ $photos->links() }}
</div>

</body>
</html>
