@extends('layout')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-5">
                <h1>Add image</h1>
                <form action="" method="post">
                    <div class="form-control">
                    <input type="file">
                    </div>

                    <button class="btn btn-success" type="submit">Submit</button>

                </form>
            </div>
        </div>
    </div>
@endsection
