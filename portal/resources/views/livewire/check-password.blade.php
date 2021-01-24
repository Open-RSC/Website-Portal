<span>
    <input type="password" name="password" style="color: black;" id="password" maxlength="20">
    @error('password') <span class="text-danger error">{{ $message }}</span>@enderror
</span>