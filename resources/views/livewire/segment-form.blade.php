<div id="segment-container" class="w-full flex flex-col gap-1">
    <label for="segment" class="text-[14px]">
        Selecione seu segmento <br>
        <select
            name="segment"
            id="segment"
            class="w-full border border-border-gray cursor-pointer outline-none rounded"
            wire:model="selectedSegment"
{{--            wire:focus="showOptions"--}}
            wire:change="update">
            <option value="" selected>Selecione um segmento</option>

                @foreach($segments as $segment)
                    <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                @endforeach

        </select>
    </label>

    {{--    @error('selectedSegment') <span class="text-error-message text-xs mt-1 pl-1">{{ $message }}</span> @enderror--}}


    @if($segmentTypes)
        <div id="segmentTypeContainer" class="mt-1">
            <label for="segmentType" class="text-[14px]">
                Selecione o tipo do seu segmento
                <select name="segmentType" id="segmentType"
                        class="w-full border border-border-gray cursor-pointer outline-none rounded">
                    <option value="" disabled selected>Selecione um tipo de segmento</option>
                    @foreach($segmentTypes as $segmentType)
                        <option value="{{ $segmentType->id }}">{{ $segmentType->name }}</option>
                    @endforeach
                </select>
            </label>
            @error('segmentType') <span class="text-error-message text-xs mt-1 pl-1">{{ $message }}</span> @enderror
        </div>
    @endif
</div>

