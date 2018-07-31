<div class="form-group">
  <label for="{{ $id }}" class="col-lg-2 control-label">{{ $label }}</label>
  <div class="col-sm-6">
    <textarea name="{{ $id }}" type="text" class="form-control" id="{{ $id }}" placeholder="{{ $label }}">{{ old($id) ? old($id) : (isset($value) ? $value : '') }}</textarea>
  </div>
</div>