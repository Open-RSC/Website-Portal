<span>
    <input type="text" name="username" style="color: black;" id="username" maxlength="12" wire:model="username">
    @error('username') <span class="text-danger error">{{ $message }}</span>@enderror
</span>