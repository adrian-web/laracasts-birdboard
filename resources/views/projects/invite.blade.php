<div class="card flex flex-col mt-3">
    <h3 class="text-xl py-4 -ml-5 border-l-4 border-blue-300 pl-4 mb-3">
        Invite a user
    </h3>

    <form action="{{ $project->path() . '/invitations' }}" method="post">
        @csrf
        <div class="mb-3">
            <input type="email" name="email" class="border border-gray-600 rounded w-full px-3 py-2"
                placeholder="E-mail address">
        </div>
        <button type="submit" class="button">Invite</button>
    </form>

    @error('email')
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mt-3">
        {{ $message }}
    </div>
    @enderror
</div>