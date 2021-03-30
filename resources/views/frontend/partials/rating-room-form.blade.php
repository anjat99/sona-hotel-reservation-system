{{--@dd($ratings)--}}
<form method="post" action="#"  class="mr-4 mt-2">
    @csrf
    @php  $counter = 1; @endphp
    <div>
        @for($i=0; $i<5;$i++)
            @if($i < round($ratings))
            <i class="fas fa-star" data-id="{{ $counter }}" data-room="{{ $room->id }}"></i>
            @else
                <i class="far fa-star" data-id="{{ $counter }}" data-room="{{ $room->id }}"></i>
            @endif
            @php  $counter++ @endphp
        @endfor

            <br><br>

        <br><br>
        <p id="greskaOcena" class="text-red"></p>
    </div>
</form>

