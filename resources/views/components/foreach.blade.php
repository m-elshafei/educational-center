  <div class="col-6">
      <select name={{ $name }} class="form-select" aria-label="Default select">
          <option value="{{ $value }}">Open this select menu</option>
          @foreach ($compact as $key => $valueFor)
              <option value="{{ $ValueId }}">{{ $ValueName }}</option>
          @endforeach
      </select>
  </div>
