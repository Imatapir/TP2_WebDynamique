<h1>Register</h1>
<form action="?controller=user&function=store" method="post">
    <label for="user_name">Name</label>
    <input type="text" id="user_name" name="user_name">
    <label for="user_pseudonyme">Pseudonyme</label>
    <input type="text" id="user_pseudonyme" name="user_pseudonyme">
    <label for="user_birthdate">Birthdate</label>
    <input type="date" id="user_birthdate" name="user_birthdate">
    <label for="user_password">Password</label>
    <input type="password" id="user_password" name="user_password">
    <input type="submit" value="Save" class="btn">
</form>