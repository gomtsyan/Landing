<div class="col-xl-12 order-xl-12 mb-5 mb-xl-0">
    <div class="card card-profile shadow">
        <div class="row justify-content-center">
            <div class="col-lg-3 order-lg-2">
                <div class="card-profile-image">

                    <img src="{{ asset('assets_admin/img/theme/home.png') }}" class="rounded-circle">

                </div>
            </div>
        </div>
        <div class="card-header text-center border-0 pt-8 pt-md-4 pb-0 pb-md-4">

        </div>
        <div class="card-body pt-0 pt-md-4">
            <div class="row">
                <div class="col">
                    <div class="card-profile-stats d-flex justify-content-center mt-md-5">

                    </div>
                </div>
            </div>
            <div class="text-center">
                <h3>
                    {{ Auth::user()->name }}<span class="font-weight-light"></span>
                </h3>
                <div class="h5 font-weight-300">
                    <i class="ni location_pin mr-2"></i>Brand
                </div>
                <div class="h5 mt-4">
                    <i class="ni business_briefcase-24 mr-2"></i>Email - {{ Auth::user()->email }}
                </div>

                <hr class="my-4" />
                <p>Register date - {{ Auth::user()->created_at }} </p>

            </div>
        </div>
    </div>
</div>