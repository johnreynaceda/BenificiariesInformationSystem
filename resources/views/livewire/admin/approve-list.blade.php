<div>
    {{ $this->table }}
    <x-modal wire:model.defer="view_modal" max-width="5xl">
        <div class="bg-white w-full p-6">
            <h1 class="font-bold text-xl uppercase text-gray-700">User Application </h1>
            <div class="grid grid-cols-2 gap-5 mt-5">
                <div>
                    <h1 class="text-sm text-gray-600">ASSISTANCE TYPE</h1>
                    <h1>{{ $application_data->assistance_type ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">REFERRAl SOURCE</h1>
                    <h1>{{ $application_data->referral_source ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">BENEFICIAL TYPE</h1>
                    <h1>{{ $application_data->beneficiary_type->name ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">BARANGAY</h1>
                    <h1>{{ $application_data->barangay->name ?? '' }}</h1>
                </div>
            </div>
            <div class="grid grid-cols-3 gap-5 mt-10">
                <div>
                    <h1 class="text-sm text-gray-600">CLIENT NAME</h1>
                    <h1>{{ $application_data->client_name ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">BIRTHDATE</h1>
                    <h1>
                        @if ($application_data)
                            {{ \Carbon\Carbon::parse($application_data->birthdate)->format('F d, Y') }}
                        @endif
                    </h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">AGE</h1>
                    <h1>{{ $application_data->age ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">EDUCATIONAL ATTAINTMENT</h1>
                    <h1>{{ $application_data->educational ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">CIVIL STATUS</h1>
                    <h1>{{ $application_data->civil_status ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">RELATION TO BENEFICIARY</h1>
                    <h1>{{ $application_data->relationship ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">CONTACT NUMBER</h1>
                    <h1>{{ $application_data->contact ?? '' }}</h1>
                </div>
                <div class="col-span-2 ">
                    <h1 class="text-sm text-gray-600">COMPLETE ADDRESS</h1>
                    <h1>{{ $application_data->address ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">OCCUPATION</h1>
                    <h1>{{ $application_data->occupation ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">MONTHLY INCOME</h1>
                    <h1>{{ $application_data->income ?? '' }}</h1>
                </div>
                <div>
                    <h1 class="text-sm text-gray-600">EMPLOYMENT STATUS</h1>
                    <h1>{{ $application_data->employment ?? '' }}</h1>
                </div>
            </div>
            <div class="mt-10">
                <h1 class="font-bold text-xl">HOUSEHOLD COMPOSITION</h1>
            </div>
            <table id="example" class="table-auto mt-5" style="width:100%">
                <thead class="font-normal">
                    <tr>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">NAME</th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            AGE/SEX
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            BIRTHDATE
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            CIVIL STATUS
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            RELATION TO CLIENT
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            EDUCATIONAL ATTAINTMENT
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            OCCUPATION
                        </th>
                        <th class="border-2  text-left px-2 text-sm font-bold text-gray-700 py-2">
                            MONTHLY INCOME
                        </th>
                    </tr>
                </thead>
                <tbody class="">
                    @if ($application_data)
                        @forelse (\App\Models\HouseholdComposition::where('user_application_id', $application_data->id)->get() as $item)
                            <tr>
                                <td class="border-2  text-gray-700  px-3 py-1">{{ $item->name }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->age }}/{{ $item->sex }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ \Carbon\Carbon::parse($item->birthdate)->format('F d, Y') }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->civil_status }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->relationship }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->educational }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->occupation }}
                                </td>
                                <td class="border-2  text-gray-700  px-3 py-1">
                                    {{ $item->income }}
                                </td>

                            </tr>
                        @empty
                            <tr>
                                <td colspan="8 " class="border-2  text-gray-700  px-3 py-1">
                                    <h1>No data Available...</h1>
                                </td>
                            </tr>
                        @endforelse
                    @endif

                </tbody>
            </table>

            <div class="mt-10">
                <h1 class="font-bold text-xl">PROBLEM PRESENTED</h1>
                <ul class="space-y-1">
                    @if ($application_data)
                        @forelse (\App\Models\ProblemPresented::where('user_application_id', $application_data->id)->get() as $item)
                            <li>{{ $item->problem }}</li>
                        @empty
                            <h1>No data Available....</h1>
                        @endforelse
                    @endif

                </ul>
            </div>
            <div class="mt-10">
                <h1 class="font-bold text-xl">UPLOADED IDs</h1>
                <div class="grid grid-cols-5 gap-5">
                    @if ($application_data)
                        @forelse (\App\Models\UploadedId::where('user_application_id', $application_data->id)->get() as $item)
                            <img src="{{ Storage::url($item->path) }}" alt="">
                        @empty
                            <h1>No data Available....</h1>
                        @endforelse
                    @endif
                </div>
            </div>
            <div class="mt-5">
                <x-button label="Close" x-on:click="close" dark />
            </div>
        </div>
    </x-modal>
</div>
