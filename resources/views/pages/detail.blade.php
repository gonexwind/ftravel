@extends('layouts.app')

@section('title', 'Detail Travel')

@push('addon-style')
<!-- xZoom -->
<link rel="stylesheet" href="{{ url('frontend/libraries/xzoom/xzoom.css') }}">
@endpush

@section('content')
<!-- Main Content -->
<main>
  <section class="section-details-header"></section>
  <section class="section-details-content">
    <div class="container">
      <!-- Menu Option -->
      <div class="row">
        <div class="col p-0">
          <nav>
            <ol class="breadcrumb">
              <li class="breadcrumb-item">Paket Travel</li>
              <li class="breadcrumb-item active">Details</li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Content -->
      <div class="row">
        <!-- Detail Tour -->
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details">
            <h1>{{ $item->title }}</h1>
            <p>{{ $item->location }}</p>

            @if ($item->galleries->count())
            <div class="gallery">
              <div class="xzoom-container">
                <img class="xzoom" id="xzoom-default" src="{{ Storage::url($item->galleries->first()->image) }}"
                  xoriginal="{{ Storage::url($item->galleries->first()->image) }}">
              </div>
              <div class="xzoom-thumbs">

                @foreach ($item->galleries as $gallery)
                <a href="{{ Storage::url($gallery->image) }}">
                  <img class="xzoom-gallery" src="{{ Storage::url($gallery->image) }}" width="128"
                    xpreview="{{ Storage::url($gallery->image) }}">
                </a>
                @endforeach

              </div>
            </div>
            @endif

            <div class="about">
              <h2>Tentang Wisata</h2>
              <p>
                {{!! $item->about !!}}
              </p>
            </div>

            <div class="features row">
              <div class="col-md-4">
                <img src="{{ url('frontend/images/ic_event.png') }}" class="features-image">
                <div class="description">
                  <h3>Featured Event</h3>
                  <p>{{ $item->featured_event }}</p>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <img src="{{ url('frontend/images/ic_bahasa.png') }}" class="features-image">
                <div class="description">
                  <h3>Language</h3>
                  <p>{{ $item->language }}</p>
                </div>
              </div>
              <div class="col-md-4 border-left">
                <img src="{{ url('frontend/images/ic_foods.png') }}" class="features-image">
                <div class="description">
                  <h3>Foods</h3>
                  <p>{{ $item->foods }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Card Right -->
        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Members are going</h2>
            <div class="members my-2">
              <img src="{{ url('frontend/images/members.png') }}" alt="Members">
            </div>
            <hr>
            <h2>Trip Information</h2>
            <table class="trip-information">
              <tr>
                <th width="50%">Date of Departure</th>
                <td width="50%" class="text-right">
                  {{ \Carbon\Carbon::create($item->date_of_departure)->format('F n, Y') }}
                </td>
              </tr>
              <tr>
                <th width="50%">Duration</th>
                <td width="50%" class="text-right">
                  {{ $item->duration }}
                </td>
              </tr>
              <tr>
                <th width="50%">Type of Trip</th>
                <td width="50%" class="text-right">
                  {{ $item->type }}
                </td>
              </tr>
              <tr>
                <th width="50%">Price</th>
                <td width="50%" class="text-right">
                  $ {{ $item->price }},00 / person
                </td>
              </tr>
            </table>
          </div>
          <div class="join-container">

            @auth
            <form action="{{ route('checkout-process', $item->id) }}" method="post">
              @csrf
              <button type="submit" class="btn btn-block btn-join-now mt-3 py-2">
                Join Now
              </button>
            </form>
            @endauth

            @guest
            <a href="{{ route('login') }}" class="btn btn-block btn-join-now mt-3 py-2">
              Login or Register to Join
            </a>
            @endguest

          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('addon-script')
<script src="{{ url('frontend/libraries/xzoom/xzoom.min.js') }}"></script>
<script>
  $(document).ready(function () {
    $('.xzoom, .xzoom-gallery').xzoom({
      zoomWidth: 300,
      title: false,
      tint: '#333',
      Xoffset: 15
    });
  });
</script>
@endpush