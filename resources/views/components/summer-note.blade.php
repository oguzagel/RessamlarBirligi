<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="{{ $name }}">{{ $head }}</label>
    <div class="col-lg-6">
        <textarea name="{{ $name }}" class="summernote">{{ $value ?? old($name) }}</textarea>
        @error($name)
        <p class="text-danger"> {{ $message }} </p>
        @enderror
    </div>
   
</div>


