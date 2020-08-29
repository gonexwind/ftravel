@extends('layouts.app')

@section('title', 'F TRAVEL')

@section('content')
<!-- Header -->
<header class="text-center">
  <h1>
    Explore the Beautiful World
    <br>
    As Easy One Click
  </h1>
  <p class="mt-3">
    You will see beautiful
    <br>
    moment you never see before
  </p>
  <a href="#popular" class="btn btn-get-started px-4 mt-4">Get Started</a>
</header>

<!-- Main Content -->
<main>

  <!-- Statistic -->
  <div class="container">
    <section id="stats" class="section-stats row justify-content-center">
      <div class="col-3 col-md-2 stats-detail">
        <h2>20K</h2>
        <p>Members</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>12</h2>
        <p>Countries</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>3K</h2>
        <p>Hotels</p>
      </div>
      <div class="col-3 col-md-2 stats-detail">
        <h2>72</h2>
        <p>Partners</p>
      </div>
    </section>
  </div>

  <!-- Wisata Popular -->
  <section class="section-popular" id="popular">
    <div class="container">
      <div class="row">
        <div class="col text-center section-popular-heading">
          <h2>Wisata Popular</h2>
          <p>
            Something that you never try
            <br />
            before this world
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Popular Content -->
  <section class="section-popular-content" id="popularContent">
    <div class="container">
      <div class="section-popular-travel row justify-content-center">

        @foreach ($items as $item)
        <div class="col-sm-6 col-md-4 col-lg-3">
          <div class="card-travel text-center d-flex flex-column"
            style="background-image: url('{{ $item->galleries->count() ? Storage::url($item->galleries->first()->image) : '' }}');">
            <div class="travel-country">{{ $item->location }}</div>
            <div class="travel-location">{{ $item->title }}</div>
            <div class="travel-button mt-auto">
              <a href="{{ route('detail', $item->slug) }}" class="btn btn-travel-details px-4">
                View Details
              </a>
            </div>
          </div>
        </div>
        @endforeach

      </div>
    </div>
  </section>

  <!-- Network Section -->
  <section class="section-network" id="networks">
    <div class="container">
      <div class="row">
        <div class="col-md-4">
          <h2>Our Networks</h2>
          <p>
            Companies are trusted us
            <br />
            more than just a trip
          </p>
        </div>

        <div class="col-md-8 text-center">
          <img src="frontend/images/logo-partner.png" alt="Logo Partners" class="img-partner">
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Heading -->
  <section class="section-testimonial-heading">
    <div class="container">
      <div class="row">
        <div class="col text-center">
          <h2>They Are Loving Us</h2>
          <p>
            Moments were giving them
            <br />
            the best experience
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- Testimonial Content -->
  <section class="section section-testimonial-content" id="testimonialContent">
    <div class="container">
      <!-- Content -->
      <div class="section-popular-travel row justify-content-center">
        <!-- Testimonial 1 -->
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/user-1.png" alt="User 1" class="mb-4 rounded-circle">
              <h3 class="mb-4">Kosaki Onodera</h3>
              <p class="testimonial">
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Et atque suscipit esse exercitationem
                voluptates!"
              </p>
            </div>
            <hr>
            <p class="trip-to mt-2">
              Trip to Bali, Indonesia
            </p>
          </div>
        </div>
        <!-- Testimonial 2 -->
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/user-2.png" alt="User 1" class="mb-4 rounded-circle">
              <h3 class="mb-4">Fikky Ardianto</h3>
              <p class="testimonial">
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Et atque suscipit esse exercitationem
                voluptates!"
              </p>
            </div>
            <hr>
            <p class="trip-to mt-2">
              Trip to Central Java, Indonesia
            </p>
          </div>
        </div>
        <!-- Testimonial 3 -->
        <div class="col-sm-6 col-md-6 col-lg-4">
          <div class="card card-testimonial text-center">
            <div class="testimonial-content">
              <img src="frontend/images/user-3.png" alt="User 1" class="mb-4 rounded-circle">
              <h3 class="mb-4">Bae Suzy</h3>
              <p class="testimonial">
                "Lorem ipsum dolor sit amet consectetur adipisicing elit. Et atque suscipit esse exercitationem
                voluptates!"
              </p>
            </div>
            <hr>
            <p class="trip-to mt-2">
              Trip to Kuala Lumpur
            </p>
          </div>
        </div>
      </div>
      <!-- Button -->
      <div class="col-12 text-center">
        <a href="#" class="btn btn-need-help px-4 mt-4 mx-1">I Need Help</a>
        <a href="{{ route('register') }}" class="btn btn-get-started px-4 mt-4 mx-1">Get Started</a>
      </div>
    </div>
  </section>

</main>

@endsection