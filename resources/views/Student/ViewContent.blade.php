@extends('layouts.student')
@section('content')




@section('content')
    <h1 style="text-align: center">Course Content</h1>
    @if(Session::has('message'))
    <div class="alert alert-success">{{session('message')}}</div>
    @endif

    @if(Session::has('error'))
    <div class="alert alert-error">{{session('error')}}</div>
    @endif
    <div class="container-fluid">
    <div class="card" style=" box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">

        <div class="card-body">
            <table class="table">
                <thead style="background-color: ghostwhite;">
                    <tr>
                        <th style="text-align: center;">Slides</th>
                        <th style="text-align: center;">Notes</th>
                        <th style="text-align: center;">Books</th>
                        <th style="text-align: center;">Images</th>


                    </tr>
                </thead>
                @foreach ($data as $item )
                <tbody>
                    <tr>


                        <td style="text-align: center;"><a href="{{URL::to('DownloadSlides',$item->slides)}}">{{$item->slides}}</a></td>

                        <td style="text-align: center;"><a href = "{{URL::to('DownloadNotes',$item->notes)}}">{{$item->notes}}</a></td>

                        <td style="text-align: center;"><a href = "{{URL::to('DownloadBooks',$item->books)}}">{{$item->books}}</a></td>

                        <td style="text-align: center;"><a href = "{{URL::to('DownloadImages',$item->images)}}">{{$item->images}}</a></td>








                    </tr>
                </tbody>
                @endforeach

            </table>
        </div>
      </div>
    </div>







@endsection
