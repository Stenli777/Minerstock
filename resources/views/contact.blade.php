<form method="post" action="{{ route('contact.submit') }}">
    @csrf

    <div>
        <label for="name">Name:</label>
        <input type="text" name="name" id="name" value="{{ old('name') }}" required>
        @error('name')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="email">Email:</label>
        <input type="email" name="email" id="email" value="{{ old('email') }}" required>
        @error('email')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <div>
        <label for="message">Message:</label>
        <textarea name="message" id="message" required>{{ old('message') }}</textarea>
        @error('message')
        <p>{{ $message }}</p>
        @enderror
    </div>

    <button type="submit">Submit</button>
</form>
