<!DOCTYPE html>
<html>
<head>
    <title>Web Bank - Home</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
</head>
<body>
<div class="bg-gray-100 min-h-screen flex flex-col justify-center items-center">
    <h1 class="text-4xl font-bold mb-6">Welcome to Web Bank</h1>
    <p class="text-lg mb-8">Please login or register to access your account.</p>

    <div class="flex space-x-4">
        <a href="{{ route('login') }}" class="bg-blue-500 hover:bg-blue-600 text-white py-2 px-4 rounded">Login</a>
        <a href="{{ route('register') }}" class="bg-green-500 hover:bg-green-600 text-white py-2 px-4 rounded">Register</a>
    </div>

    <div class="max-w-sm mt-8">
        <h2 class="text-2xl font-bold mb-4">Login</h2>
        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="email">Email</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="email" type="email" placeholder="Enter your email">
        </div>
        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2" for="password">Password</label>
            <input class="appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="password" type="password" placeholder="Enter your password">
        </div>
        <div class="flex items-center justify-between">
            <button id="signin-button" class="bg-blue-500 hover:bg-blue-600 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="button">
                Sign In
            </button>
            <a class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800" href="#">
                Forgot Password?
            </a>
        </div>
        </form>
    </div>
</div>

<script src="{{ asset('js/app.js') }}"></script>
<script>
    // Handle form submission
    document.getElementById('signin-button').addEventListener('click', function() {
        document.getElementById('login-form').submit();

        // Send the email and password to the server for authentication
        // Replace the AJAX request with your own logic to handle the login attempt
        // Example using Fetch API:
        fetch('{{ route('login') }}', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
            },
            body: JSON.stringify({
                email: email,
                password: password
            })
        })
            .then(function(response) {
                if (response.ok) {
                    // Successful login, perform necessary actions (e.g., redirect to dashboard)
                    alert('Login successful!');
                    // Example redirect:
                    // window.location.href = '/dashboard';
                } else {
                    // Failed login, handle the error (e.g., display error message)
                    alert('Login failed. Please try again.');
                }
            })
            .catch(function(error) {
                console.log(error);
            });
    });
</script>
</body>
</html>
