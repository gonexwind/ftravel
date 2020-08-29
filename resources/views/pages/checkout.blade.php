@extends('layouts.checkout')

@section('title', 'Checkout')

@push('addon-style')
<!-- GIJGO Datepicker -->
<link rel="stylesheet" href="{{ url('frontend/libraries/gijgo/css/gijgo.css') }}" />
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
              <li class="breadcrumb-item">Details</li>
              <li class="breadcrumb-item active">Checkout</li>
            </ol>
          </nav>
        </div>
      </div>

      <!-- Content -->
      <div class="row">

        <!-- Detail Tour -->
        <div class="col-lg-8 pl-lg-0">
          <div class="card card-details">

            @if ($errors->any())
            <div class="alert alert-danger">
              <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
              </ul>
            </div>

            @endif
            <h1>Who's Going?</h1>
            <p>
              Trip to {{ $item->travel_package->title }}, {{ $item->travel_package->location }}
            </p>

            <div class="attendee">
              <table class="table table-responsive-sm text-center">
                <thead>
                  <tr>
                    <td>Picture</td>
                    <td>Name</td>
                    <td>Nationality</td>
                    <td>VISA</td>
                    <td>Passport</td>
                    <td></td>
                  </tr>
                </thead>
                <tbody>

                  @forelse ($item->details as $detail)
                  <tr>
                    <td>
                      <img src="https://ui-avatars.com/api/?name={{ $detail->username }}" alt="Avatar" width="60"
                        height="60" class="rounded-circle" />
                    </td>
                    <td class="align-middle">
                      {{ $detail->username }}
                    </td>
                    <td class="align-middle">
                      {{ $detail->nationality }}
                    </td>
                    <td class="align-middle">
                      {{ $detail->is_visa ? '30 Days' : 'N/A' }}
                    </td>
                    <td class="align-middle">
                      {{ \Carbon\Carbon::createFromDate($detail->doe_passport) > 
                      \Carbon\Carbon::now() ? 'Active' : 'Inactive' }}
                    </td>
                    <td class="align-middle">
                      <a href="{{ route('checkout-remove', $detail->id)}}">
                        <img src="{{ url('frontend/images/ic_remove.png') }}" alt="" />
                      </a>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="6" class="text-center">
                      No Visitor
                    </td>
                  </tr>
                  @endforelse

                </tbody>
              </table>
            </div>

            <div class="member mt-3">
              <h2>Add Member</h2>
              <form class="form-inline" method="POST" action="{{ route('checkout-create', $item->id) }}">
                @csrf

                <label for="username" class="sr-only">
                  Name
                </label>
                <input type="text" class="form-control mb-2 mr-sm-2" name="username" id="username"
                  placeholder="Username" required />

                <label for="nationality" class="sr-only">
                  Nationality
                </label>
                <input type="text" class="form-control mb-2 mr-sm-2" style="width: 50px" name="nationality"
                  id="nationality" placeholder="nationality" required />

                <label for="is_visa" class="sr-only">
                  Name
                </label>
                <select class="custom-select mb-2 mr-sm-2" name="is_visa" id="is_visa" required>
                  <option value="" active>VISA</option>
                  <option value="1">30 Days</option>
                  <option value="0">N/A</option>
                </select>

                <label for="doe_passport" class="sr-only">
                  DOE Passport
                </label>
                <div class="input-group mb-2 mr-sm-2">
                  <input type="text" class="form-control datepicker" name="doe_passport" id="doe_passport"
                    placeholder="DOE Passport" required />
                </div>

                <button type="submit" class="btn btn-add-now mb-2 px-4">
                  Add Now
                </button>
              </form>
              <h3 class="mt-2 mb-0">
                Note
              </h3>
              <p class="disclaimer mb-0">
                You are only able to invite member that registered in F
                Travel.
              </p>
            </div>
          </div>
        </div>

        <!-- Card Right -->
        <div class="col-lg-4">
          <div class="card card-details card-right">
            <h2>Checkout Information</h2>
            <table class="trip-information">
              <tr>
                <th width="50%">Members</th>
                <td width="50%" class="text-right">
                  {{ $item->details->count()}} person
                </td>
              </tr>
              <tr>
                <th width="50%">Additional VISA</th>
                <td width="50%" class="text-right">
                  $ {{ $item->additional_visa}},00
                </td>
              </tr>
              <tr>
                <th width="50%">Trip Price</th>
                <td width="50%" class="text-right">
                  $ {{ $item->travel_package->price}},00 / person
                </td>
              </tr>
              <tr>
                <th width="50%">Sub Total</th>
                <td width="50%" class="text-right">
                  $ {{ $item->transaction_total}},00
                </td>
              </tr>
              <tr>
                <th width="50%">Total (+Unique Code)</th>
                <td width="50%" class="text-right text-total">
                  <span class="text-blue">$ {{ $item->transaction_total}},</span>
                  <span class="text-orange">{{ mt_rand(0,99) }}</span>
                </td>
              </tr>
            </table>
            <hr />
            <h2>Payment Instructions</h2>
            <p class="payment-instruction">
              Please complete your payment before continue the wonderful
              trip.
            </p>
            <div class="bank">
              <div class="bank-item pb-3">
                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="Bank Logo" class="bank-image" />
                <div class="description">
                  <h3>PT Nomads ID</h3>
                  <p>
                    0881 8829 8800
                    <br />
                    Bank Central Asia
                  </p>
                </div>
                <div class="clearfix"></div>
              </div>
              <div class="bank-item pb-3">
                <img src="{{ url('frontend/images/ic_bank.png') }}" alt="Bank Logo" class="bank-image" />
                <div class="description">
                  <h3>PT Nomads ID</h3>
                  <p>
                    0881 8829 8899
                    <br />
                    Bank HSBC
                  </p>
                </div>
                <div class="clearfix"></div>
              </div>
            </div>
          </div>
          <div class="join-container">
            <a href="{{ route('checkout-success', $item->id) }}" class="btn btn-block btn-join-now mt-3 py-2">
              I Have Made Payment
            </a>
          </div>
          <div class="text-center mt-3">
            <a href="{{ route('detail', $item->travel_package->slug) }}" class="text-muted">
              Cancel Booking
            </a>
          </div>
        </div>
      </div>
    </div>
  </section>
</main>
@endsection

@push('addon-script')
<script src="{{ url('frontend/libraries/gijgo/js/gijgo.js') }}"></script>
<script>
  $(".datepicker").datepicker({
    format: 'yyyy-mm-dd',
    uiLibrary: "bootstrap4",
    icons: {
      rightIcon: '<img src="{{ url('frontend/images/ic_doe.png') }}"/ >',
    }
  });
</script>
@endpush