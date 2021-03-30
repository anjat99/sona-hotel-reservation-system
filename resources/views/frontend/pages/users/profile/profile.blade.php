<div class="mt-4 userSection" id="profile">
    <div class="mt-4" >
        <h2>CURRENT PROFILE DETAILS </h2>
        <div class="table-responsive " id="roomPriceTable">
            <table class="table tablesorter mt-4 border">
                <thead class="text-black font-weight-bold">
                <tr>
                    <th class="text-center ">
                        #ID
                    </th>
                    <th class="text-center">
                        BASIC INFO
                    </th>
                    <th class="text-center">
                        ROLE
                    </th>
                    <th class="text-center">
                        NO.REVIEWS
                    </th>
                    <th class="text-center">
                        NO.TESTIMONIALS
                    </th>
                    <th class="text-center">
                        DATE OF REGISTER
                    </th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="text-center">
                        {{ $u->id }}
                    </td>
                    <td class="text-center">
                        <div class="user_table__user">
                            <div class="user_table__meta">
                                <h3> {{ $u->firstname ." ".$u->lastname }}</h3>
                                <span>{{ $u->email }}</span>
                            </div>
                        </div>
                    </td>
                    <td class="text-center">
                        {{ $u->role->name }}
                    </td>
                    <td class="text-center">
                        {{ count($u->reviews) }}
                    </td>
                    <td class="text-center">
                        {{ count($u->testimonials) }}
                    </td>
                    <td class="text-center">
                        {{ $u->created_at }}
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="col-12 d-flex mt-4">
        @include('frontend.pages.users.profile.edit-profile')
        @include('frontend.pages.users.profile.change-password')
    </div>
</div>
