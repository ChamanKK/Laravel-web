<x-layout title="Sign In">
  <h1>Sign In</h1>
  <form method="POST" action="/login">
    @csrf
    <div>
      <label for="email">Email:</label>
      <input type="text" id="email" name="email" />
    </div>
    <div>
      <label for="password">Password:</label>
      <input type="password" id="password" name="password" />
    </div>
    <div>
      <button type="submit">Sign in</button>
    </div>
  </form>
</x-layout>