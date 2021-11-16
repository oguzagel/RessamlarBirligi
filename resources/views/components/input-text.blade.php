<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="{{ $name }}">{{ $head }}</label>
    <div class="col-lg-6">
        <input type="{{ $type }}" class="form-control {{ $errors->has($name) ? 'is-invalid' : ''  }}"  name="{{ $name }}"   value="{{ $value ?? old($name) }}">
        @error($name)
        <div class="invalid-feedback animated fadeInUp"> {{ $message }} </div>
        @enderror
    </div>
   
</div>
 
