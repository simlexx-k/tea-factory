<!-- resources/views/farmers/create.blade.php -->

<form method="POST" action="/farmers">
    @csrf
    <div>
        <label for="name">Name:</label>
        <input type="text" id="name" name="name" value="{{ old('name') }}" required>
    </div>
    <div>
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" value="{{ old('email') }}" required>
    </div>
    <div>
        <label for="pickpoint">Pick Point:</label>
        <input type="text" id="pickpoint" name="pickpoint" value="{{ old('pickpoint') }}" required>
    </div>
    <div>
        <label for="phone">Phone Number:</label>
        <input type="tel" id="phone" name="phone" value="{{ old('phone') }}" required>
    </div>
    <div>
        <label for="account">Account:</label>
        <input type="number" id="account" name="account" value="{{ old('account') }}" required>
    </div>
    <div>
        <label for="isValid">isValid:</label>
        <input type="checkbox" id="isValid" name="isValid" value="{{ old('isValid') }}" required>
    </div>
    <!-- Add more fields as needed -->
    <button type="submit">Register Farmer</button>
</form>
