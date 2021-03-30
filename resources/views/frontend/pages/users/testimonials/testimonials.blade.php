
<div class="mt-4 userSection" id="testimonials">
    <div class="mt-4" >
        <h2> DETAILS OF WRITTEN TESTIMONIALS <i class="far fa-comments"></i> {{ count($u->testimonials) }}</h2>

        @if(count($u->testimonials) == 0)
            <h2 class="text-danger mt-2 mb-3">So far you have not written a single testimonial</h2>
            @include('frontend.pages.users.testimonials.add')

        @else
            @if (session()->has('errorDeleteTest'))
                <div class="alert alert-info">
                    <h3>{{ session('errorDeleteTest') }}</h3>
                </div>
            @endif
            @if (session()->has('successDeleteTest'))
                <div class="alert alert-success">
                    <h3>{{ session('successDeleteTest') }}</h3>
                </div>
            @endif

        <div class="table-responsive " id="roomPriceTable">
{{--            @if(count($u->testimonials) > 0)--}}
                <table class="table tablesorter mt-4 border">
                <thead class="text-black font-weight-bold">
                <tr>
                    <th class="text-center">
                        NO.
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
                @foreach($u->testimonials as $key => $t)
                <tr>
                    <td class="text-center">
                        {{ ++$key }}
                    </td>
                    <td class="text-center">
                        {{ $t->description }}

                    </td>
                    <td class="text-center">
                        {{ $t->created_at }}
                    </td>
                    <td class="text-center">
                        <form method="POST" action="{{ route('testimonials-manage.destroy', $t->id ) }}">
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
            <div class="col-12 d-flex">
                @include('frontend.pages.users.testimonials.add')
            </div>

        @endif
    </div>


</div>
