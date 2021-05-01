@extends('layouts.content')

@push('scripts')
<script src="{{ asset('js/profile.js') }}" defer></script>
@endpush

@section('div_content')

<!-- Section: Nav tabs -->
<input type="text" hidden id="username" name="username" value={{ $user->username }}>
<div class="d-flex align-items-start flex-vertical mt-sm-5" id="#colNav">
  <div class="nav flex-column nav-pills me-3 border-right p-3 flex-horizontal-profile d-sm-flex" id="v-pills-tab" role="tablist" aria-orientation="vertical">
    <button class="nav-link active text-primary btn-profile" id="v-pills-profile-tab" data-bs-toggle="pill" data-bs-target="#v-pills-profile" type="button" role="tab" aria-controls="v-pills-profile" aria-selected="true">Profile</button>
    <button class="nav-link text-primary btn-profile" id="v-pills-bid-history-tab" data-bs-toggle="pill" data-bs-target="#v-pills-bid-history" type="button" role="tab" aria-controls="v-pills-bid-history" aria-selected="false">Bid History</button>
    <button class="nav-link text-primary btn-profile" id="v-pills-created-auctions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-created-auctions" type="button" role="tab" aria-controls="v-pills-auctions-created" aria-selected="false">Auctions Created</button>
    <button class="nav-link text-primary btn-profile" id="v-pills-favourite-auctions-tab" data-bs-toggle="pill" data-bs-target="#v-pills-favourite-auctions" type="button" role="tab" aria-controls="v-pills-favourite-auctions" aria-selected="false">Favourite Auctions</button>
    <button class="nav-link text-primary btn-profile" id="v-pills-favourite-sellers-tab" data-bs-toggle="pill" data-bs-target="#v-pills-favourite-sellers" type="button" role="tab" aria-controls="v-pills-favourite-sellers" aria-selected="false">Favourite Sellers</button>
    <button class="nav-link text-primary btn-profile" id="v-pills-users-ratings-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users-ratings" type="button" role="tab" aria-controls="v-pills-users-ratings" aria-selected="false">Users Ratings</button>
    <button class="nav-link text-primary btn-profile" id="v-pills-users-rated-tab" data-bs-toggle="pill" data-bs-target="#v-pills-users-rated" type="button" role="tab" aria-controls="v-pills-users-rated" aria-selected="false">Users Rated</button>
  </div>
  <div class="tab-content w-100" id="v-pills-tabContent">
    <div class="tab-pane fade show active" id="v-pills-profile" role="tabpanel" aria-labelledby="v-pills-profile-tab">
      @include('pages.profile.profile-info')
    </div>
    <div class="tab-pane fade" id="v-pills-bid-history" role="tabpanel" aria-labelledby="v-pills-bid-history-tab">
      @include('pages.profile.bid-history')
    </div>
    <div class="tab-pane fade" id="v-pills-created-auctions" role="tabpanel" aria-labelledby="v-pills-created-auctions-tab">
      @include('pages.profile.created-auctions')
    </div>
    <div class="tab-pane fade" id="v-pills-favourite-auctions" role="tabpanel" aria-labelledby="v-pills-favourite-auctions-tab">
      @include('pages.profile.favourite-auctions')
    </div>
    <div class="tab-pane fade" id="v-pills-favourite-sellers" role="tabpanel" aria-labelledby="v-pills-favourite-sellers-tab">
      @include('pages.profile.favourite-sellers')
    </div>
    <div class="tab-pane fade" id="v-pills-users-ratings" role="tabpanel" aria-labelledby="v-pills-users-ratings-tab">
      @include('pages.profile.users-ratings')
    </div>
    <div class="tab-pane fade" id="v-pills-users-rated" role="tabpanel" aria-labelledby="v-pills-users-rated-tab">
      @include('pages.profile.users-rated')
    </div>
  </div>
</div>

@endsection