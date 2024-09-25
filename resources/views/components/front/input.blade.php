<div class="form-group" >
    <label for="{{ $name }}" class="{{ $required ?? '' }}">{{ $lableName }} @if (!empty($optional))
        <span>{{ $optional }}</span>
    @endif </label>
    <input class="form-control {{ $class ?? '' }}" type="{{ $type ?? 'text' }}" name="{{ $name }}" id="{{ $name }}" >
    @if (!empty($error))
        @error($error)
            <span class="text-danger d-block">{{ $message }}</span>
        @enderror
    @endif
</div>