@csrf
<div class="md-form">
    <label>タイトル</label>
    <input type="text" name="name" class="form-control" required value="{{ $brewery->name ?? old('name') }}">
</div>
<div class="form-group">
    <label></label>
    <textarea name="body" required class="form-control" rows="16"
        placeholder="本文">{{ $brewery->body ?? old('body') }}</textarea>
</div>