<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet">
    <x-guest-layout>
    <x-auth-card>
        <x-slot name="logo">
            <a href="/">
                <x-application-logo class="w-20 h-20 fill-current text-gray-500" />
            </a>
        </x-slot>

        <!-- Validation Errors -->
        <x-auth-validation-errors class="mb-4" :errors="$errors" />

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <!-- Name -->
            <div>
                <x-label for="name" :value="__('Name')" />

                <x-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus />
            </div>
               <!-- Surname -->
               <div>
                <x-label for="surname" :value="__('Surname')" />

                <x-input id="surname" class="block mt-1 w-full" type="text" name="surname" :value="old('surname')" required autofocus />
            </div>

            <!-- Email Address -->
            <div class="mt-4">
                <x-label for="email" :value="__('Email')" />

                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
              <!-- Phone No -->
              <div>
                <x-label for="phone no" :value="__('Phone No')" />

                <x-input id="phone no" class="block mt-1 w-full" type="number" name="phone_no" :value="old('phone_no')" required autofocus />
            </div>

   <!-- Address -->
   <div>
    <x-label for="address" :value="__('address')" />

    <x-input id="address" class="block mt-1 w-full" type="text" name="address" :value="old('address')" required autofocus />
</div>

   <!-- Pincode -->
   <div>
    <x-label for="pincode" :value="__('Pincode')" />

    <x-input id="pincode" class="block mt-1 w-full" type="number" name="pincode" :value="old('pincode')" required autofocus />
</div>

<div class="block mt-1 w-full">
    <h5>Country</h5>
    <select name="country_id"  id="country-dd" class="block mt-1 w-full">
        <option >Select Country</option>
        @foreach ($countries as $data)
        <option value="{{$data->id}}">
            {{$data->name}}
        </option>
        @endforeach
    </select>
</div>
<div class="block mt-1 w-full">
    <h5>State</h5>
    <select name="state_id" id="state-dd" class="block mt-1 w-full" >
        <option>select states</option>
    </select>
</div>
<div class="block mt-1 w-full">
    <h5>City</h5>
    <select name="city_id" id="city-dd" class="block mt-1 w-full">
        <option>select city</option>
    </select>
</div>


            <!-- Password -->
            <div class="mt-4">
                <x-label for="password" :value="__('Password')" />

                <x-input id="password" class="block mt-1 w-full"
                                type="password"
                                name="password"
                                required autocomplete="new-password" />
            </div>

            <!-- Confirm Password -->
            <div class="mt-4">
                <x-label for="password_confirmation" :value="__('Confirm Password')" />

                <x-input id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required />
            </div>

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <x-button class="ml-4">
                    {{ __('Register') }}
                </x-button>
            </div>
        </form>
    </x-auth-card>
</x-guest-layout>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function () {
        $('#country-dd').on('change', function () {
            var idCountry = this.value;
            $("#state-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-states')}}",
                type: "POST",
                data: {
                    country_id: idCountry,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (result) {
                    $('#state-dd').html('<option value="">Select State</option>');
                    $.each(result.states, function (key, value) {
                        $("#state-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                    $('#city-dd').html('<option value="">Select City</option>');
                }
            });
        });
        $('#state-dd').on('change', function () {
            var idState = this.value;
            $("#city-dd").html('');
            $.ajax({
                url: "{{url('api/fetch-cities')}}",
                type: "POST",
                data: {
                    state_id: idState,
                    _token: '{{csrf_token()}}'
                },
                dataType: 'json',
                success: function (res) {
                    $('#city-dd').html('<option value="">Select City</option>');
                    $.each(res.cities, function (key, value) {
                        $("#city-dd").append('<option value="' + value
                            .id + '">' + value.name + '</option>');
                    });
                }
            });
        });
    });
</script>
