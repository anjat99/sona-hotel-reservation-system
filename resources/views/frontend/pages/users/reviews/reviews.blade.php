
{{--@dd($u->reviews)--}}
    <div class="mt-4 userSection" id="reviews">
    <div class="mt-4" >
        <h2 class="font-weight-bold"> DETAILS OF WRITTEN REVIEWS   <i class="far fa-comments"></i> {{ count($u->reviews) }} </h2>
        @if(count($u->reviews) == 0)
            <h2 class="text-danger mt-2 mb-5 no-review">So far you have not written a single review</h2>
        @else

            @if (session()->has('errorDeleteReview'))
                <div class="alert alert-info">
                    <h3>{{ session('errorDeleteReview') }}</h3>
                </div>
            @endif
            @if (session()->has('successDeleteReview'))
                <div class="alert alert-success">
                    <h3>{{ session('successDeleteReview') }}</h3>
                </div>
            @endif
        <div class="table-responsive " id="roomPriceTable">

            <table class="table tablesorter mt-4 border">
                <thead class="text-black font-weight-bold">
                <tr>
                    <th class="text-center ">
                        NO.
                    </th>
                    <th class="text-center">
                        ROOM NAME
                    </th>
                    <th class="text-center">
                        MESSAGE
                    </th>
                    <th class="text-center">
                        DATE OF REGISTER
                    </th>
                    <th>
                        ACTIONS
                    </th>
                </tr>
                </thead>
                <tbody>
                @foreach($u->reviews as $key => $review)
{{--                    @dd($review->rooms)--}}
{{--                    @if(count($review->rooms) !== 0)--}}
                        <tr>
                            <td class="text-center">
                                {{ ++$key }}
                            </td>
                            <td class="text-center">
                                {{ $review->rooms->first()->name }}
                            </td>
                            <td class="text-center">
                                {{ $review->message }}
                            </td>
                            <td class="text-center">
                                {{ $review->created_at }}
                            </td>
                            <td class="text-center">
                                <form method="POST" action="{{ route('reviews-manage.destroy', $review->id ) }}">
                                    @method("DELETE")
                                    @csrf
                                    <button class="btn btn-secondary btn-xs"><i class="fas fa-trash-alt adminIcons"></i> </button>
                                </form>
                            </td>
                        </tr>
                @endforeach
                </tbody>
            </table>
        </div>
        @endif

    </div>


</div>
