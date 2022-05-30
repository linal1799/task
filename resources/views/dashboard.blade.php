<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">

                    <div class="py-12">
                        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                                <div class="p-6 bg-white border-b border-gray-200">
                                   <h1><b><u>USER PROFILE</h1></b></u>
                                   <h2 class="card-title">Name   :{{@$user_info->name}}</h2>
                                   <h2 class="card-title">Surname   :{{$user_info->surname}}</h2>
                                   <h2 class="card-title">Email   :{{$user_info->email}}</h2>
                                   <h2 class="card-title">Phone_no   :{{$user_info->phone_no}}</h2>
                                   <h2 class="card-title">Address   :{{$user_info->address}}</h2>
                                   <h2 class="card-title">Pincode   :{{$user_info->pincode}}</h2>
                                   <h2 class="card-title">Country_id   :{{$user_info->country->name}}</h2>
                                   <h2 class="card-title">State_id   :{{@$user_info->state->name}}</h2>
                                   <h2 class="card-title">City_id   :{{@$user_info->city->name}}</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>



