{{--@dd($room)--}}
<div class="col-lg-4 col-md-6">
    <div class="room-item">
        <img src="{{ asset('/storage/assets/img/room/'.$room->image->path) }}" alt="{{ $room->roomName }}">
        <div class="ri-text">
            <h4>{{ $room->roomName }}</h4>
            <h3> {{ round($room->price->price) }}$<span>/Per night</span></h3>

            <table>
                <tbody>
                    <tr>
                        <td class="r-o">Size:</td>
                        <td>{{ $room->size }}m<sup>2</sup></td>
                    </tr>
                    <tr>
                        <td class="r-o">Capacity:</td>
                        <td><i class="fas fa-female"></i> x{{ $room->capacity }}</td>
                    </tr>
                    <tr>
                        <td class="r-o">Bed:</td>
                        <td>{{ $room->typeName }}</td>
                    </tr>
                </tbody>
            </table>
            <a href="{{route('rooms.show',['room' => $room->id ])}}" class="primary-btn">More Details</a>
        </div>
    </div>
</div>
