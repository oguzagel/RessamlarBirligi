<div class="form-group row">
    <label class="col-lg-4 col-form-label" for="{{ $name }}">{{ $head }}</label>
    <div class="col-lg-6">
        <label class="radio-inline mr-3"><input {{ $value == 1 ? 'checked' : '' }} value="1" type="radio" name="{{ $name }}"> Aktif</label>
        <label class="radio-inline mr-3"><input {{ $value == 0 ? 'checked' : '' }} value="0" type="radio" name="{{ $name }}"> Pasif</label>
        
        
        @error($name)
        <div class="invalid-feedback animated fadeInUp"> {{ $message }} </div>
        @enderror
    </div>
   
</div>

