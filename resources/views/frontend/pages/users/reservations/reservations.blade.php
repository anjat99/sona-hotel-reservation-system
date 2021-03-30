<div class="mt-4 userSection" id="reservations">
    <div class="mt-4" >
        <h2> DETAILS OF BOOKING ROOMS <i class="fa fa-book-open"></i> {{ count($u->reservations) }}</h2>
        @if(count($u->reservations) == 0)
            <h2 class="text-danger mt-2 mb-3 no-review">So far you have not make any reservations!</h2>
        @else
        <div class="table-responsive " id="roomPriceTable">
            <table class="table tablesorter mt-4 border">
                <thead class="text-black font-weight-bold">
                <tr>
                    <th class="text-center ">
                        NO.
                    </th>
                    <th class="text-center">
                        Booked on name
                    </th>
                    <th class="text-center">
                        ROOM NAME
                    </th>
                    <th class="text-center">
                       NO.PEOPLE
                    </th>
                    <th class="text-center">
                        CHECK IN
                    </th>
                    <th class="text-center">
                        CHECK OUT
                    </th>
                    <th class="text-center">
                        NO.DAYS OF STAYING
                    </th>
                    <th class="text-center">
                        TOTAL PRICE
                    </th>
                </tr>
                </thead>
                <tbody>
                   @foreach($u->reservations as $key => $r)
                    <tr>
                        <td class="text-center">
                             {{ ++$key }}
                        </td>
                        <td class="text-center">
                            {{ $r->name }}
                        </td>
                        <td class="text-center">
                            {{ $r->room->name }}
                        </td>
                        <td class="text-center">
                            {{ $r->no_people }}
                        </td>
                        <td class="text-center">

                            {{ $r->check_in }}
                        </td>
                        <td class="text-center">

                            {{ $r->check_out }}
                        </td>
                        <td class="text-center">
                        @php

                            $seconds_check_in = strtotime($r->check_in);
                            $seconds_check_out = strtotime($r->check_out);
                            $datediff = $seconds_check_out - $seconds_check_in;
                            $days = floor($datediff / (60 * 60 * 24));
                            echo $days;

                        @endphp

                        </td>
                        <td class="text-center">
                            {{ $r->sum_price }}
                        </td>
                    </tr>
                   @endforeach
                </tbody>
            </table>
        </div>
        @endif
    </div>

</div>
