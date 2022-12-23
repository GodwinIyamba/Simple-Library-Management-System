<form action="{{ route('admin.access') }}" method="POST">
    @csrf
    <div>
        <label for="">Email</label>
        <input type="email" name="email">
    </div>

    <div>
        <label for="">password</label>
        <input type="password" name="password" id="password">
    </div>
    <input type="submit" value="log in">
</form>
