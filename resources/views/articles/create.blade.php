@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="/articles" method="post" enctype="multipart/form-data">
            @csrf
            <div class="form-group">

                <label for="title">Title: </label>
                <input type="text" class='form-control' required name="title" id="title"><br>

                <label for="content">Content: </label>
                <input type="text" class='form-control' required name="content" id="content"><br>

                <label for="image">Feature image:</label>
                <input type="file" class='form-control' name="image" id="image" required><br>

                <button type="submit" name='submit' class="btn btn-primary float-right">Simpan</button>
            </div>
        </form>
    </div>
@endsection
