@extends('layout')

@section('content')

    <div class="container">
        <h1 align="center">My Gallery</h1>
        <div class="row">
            <style>
                button.my_button{
                    width: 100%;
                    margin: 5px 0;
                }

                div.gallery_item{
                    margin: 10px 0px;
                }
            </style>
            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>
            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>
            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>
            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>

            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>
            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>
            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>
            <div class="col-md-3 gallery_item">
                <img src="/image.jpg" alt="" class="img-thumbnail">
                <button type="button" class="btn btn-info my_button">Info</button>
                <button type="button" class="btn btn-warning my_button">Warning</button>
                <button type="button" class="btn btn-danger my_button">Danger</button>
            </div>
        </div>
    </div>
@endsection