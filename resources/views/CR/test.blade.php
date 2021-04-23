@foreach ($data as $item )
<img src="{{asset('CourseImages')}}/{{$item->image }}" style="max-width: 60px">
@endforeach
