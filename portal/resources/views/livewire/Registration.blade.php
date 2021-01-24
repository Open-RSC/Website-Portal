<div>
    <form>
        <input type="hidden" name="remember" value="true">
        <div class="rounded-md shadow-sm">
            <div>
                <input wire:model.lazy="username" aria-label="Username" name="username" type="username" required
                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                       placeholder="Username">
                @error('username')
                <p class="text-sm text-red-500 text-center">{{$message}}</p>
                @enderror
            </div>
            <div>
                <input wire:model.lazy="email" aria-label="Email address" name="email" type="email" required
                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                       placeholder="Email address">
                @error('email')
                <p class="text-sm text-red-500 text-center">{{$message}}</p>
                @enderror
            </div>
            <div class="-mt-px">
                <input wire:model.lazy="password" aria-label="Password" name="password" type="password" required
                       class="mt-2 appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                       placeholder="Password">
            </div>
            <div class="-mt-px">
                <input wire:model.lazy="passwordConfirmation" aria-label="Password" name="passwordConfirmation"
                       type="password" required
                       class="appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:shadow-outline-blue focus:border-blue-300 focus:z-10 sm:text-sm sm:leading-5"
                       placeholder="Password Confirmation">
            </div>
            @error('password')
            <p class="text-sm text-red-500 text-center">{{$message}}</p>
            @enderror
        </div>

        <div class="mt-6">
            <button class="btn text-white btn-success" wire:click.prevent="registerStore">Register</button>
        </div>
    </form>
</div>