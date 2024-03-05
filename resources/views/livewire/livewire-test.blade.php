
        <form method="POST" enctype="multipart/form-data">
            <select class="form-control" wire:model="selectedCounty">
                <option value="">Select a County</option>
                @foreach($counties as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
            {{-- @if(count($subcounties) > 0)
            <select class="form-control" wire:model="subcounty">
                @foreach($subcounties as $subcounty)
                <option value="{{ $subcounty ['id'] }}">{{ $subcounty ['name'] }}</option>
                @endforeach
            </select>
            @endif --}}
        <p>hehre {{$selectedCounty}}</p>
        </form>
