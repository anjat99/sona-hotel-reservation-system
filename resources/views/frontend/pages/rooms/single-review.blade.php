{{--@dd($review)--}}
{{--@dd($user)--}}
<div class="review-item">
    <div class="ri-pic">
        <img src="{{ asset('assets/img/profileUser.png') }}" alt="">
    </div>
    <div class="ri-text">
        <span>@php echo date('d M Y H:i:s',strtotime($review->created_at)) @endphp</span>

        <h5>{{ $user->firstname }}  {{ $user->lastname }}</h5>
        <p>{{ $review->message }}</p>



    </div>
</div>
