<div>
    {{-- <div class="border bg-gray-100 rounded-xl p-5">
        <h1 class="font-bold text-gray-700 uppercase"> Downloadable Files</h1>
        <ul class="mt-2">
            <li wire:click="downloadFile"
                class="flex space-x-1 items-center cursor-pointer hover:text-green-600 hover:fill-green-600 text-gray-700 fill-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                    <path
                        d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                    </path>
                </svg>
                <span>Click to download Social Case Study Form</span>
            </li>
        </ul>
        <h1 class="font-bold text-gray-700 mt-5 uppercase"> OTHER REQUIREMENTS</h1>
        <ul class="mt-2" x-data="{ medical: false, educational: false }">
            <li x-on:click="medical = !medical"
                class="flex space-x-1 items-center cursor-pointer hover:text-green-600 hover:fill-green-600 text-gray-700 fill-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                    <path
                        d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                    </path>
                </svg>
                <span>Medical Assistance Requirements</span>
            </li>
            <li x-show="medical">
                <p class="py-2 text-sm ml-5 ">
                    [Birth certificate or any public document
                    indicating the applicant's age and Filipino
                    citizenship. Valid ID as proof of residency
                    and /or two (2) proofs of billing or mails
                    under his/her name and such other
                    documents as maybe required by OSCA.]
                </p>
            </li>
            <li x-on:click="educational = !educational"
                class="flex space-x-1 items-center cursor-pointer hover:text-green-600 hover:fill-green-600 text-gray-700 fill-gray-700">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" class="h-5 w-5">
                    <path
                        d="M21 8V20.9932C21 21.5501 20.5552 22 20.0066 22H3.9934C3.44495 22 3 21.556 3 21.0082V2.9918C3 2.45531 3.4487 2 4.00221 2H14.9968L21 8ZM19 9H14V4H5V20H19V9ZM8 7H11V9H8V7ZM8 11H16V13H8V11ZM8 15H16V17H8V15Z">
                    </path>
                </svg>
                <span>Educational Assistance Requirements</span>
            </li>
            <li x-show="educational">
                <p class="py-2 text-sm ml-5 ">
                    [. Fill up the form at any PWD Registration Center in the Philippines.
                    . After filling up the form completely, attach the 1×1 pictures. Affix one onto the form, then
                    staple the remaining picture onto the document.
                    . Attach the proof of medical condition or disability.
                    . Submit the completed PWD ID form to the registration center.]
                </p>
            </li>
        </ul>
    </div> --}}
    <div class="mt-10">
        <h1 class="uppercase ml-3 font-bold text-xl text-gray-700">Fill Up Form</h1>
        <div class="mt-3 bg-gray-100 rounded-xl p-5">
            {{ $this->form }}
        </div>
        <div class="mt-5 flex space-x-2">
            <x-button label="Submit Form" wire:click="submitForm" spinner="submitForm" positive icon="external-link" />
            <x-button label="Back" dark href="{{ route('user.dashboard') }}" icon="arrow-left" />
        </div>
    </div>
</div>
