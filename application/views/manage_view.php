<h1>Manage</h1>
<h3>Reboot</h3>
<form action="/manage/reboot" method="POST">
    <input type="submit" value="Reboot Facility">
</form>
<h3>Register</h3>
<form action="/manage/register" method="POST">
    <label for="password">Secret Token: </label><input type="text" id="password" name="password">
    <input id="team" name="team" type="hidden" value="{team}">
    <input type="submit" value="Register">
</form>
<h3>Properties</h3>
<form action="/manage/editproperties" method="POST">
    <table >
        <tr>
            <td><label for="team">Team Name: </label></td>
            <td><input type="text" id="team" name="team" value="{team}"></td>
        </tr>
        <tr>
            <td><label for="server_url">Server URL: </label></td>
            <td><input type="text" id="server_url" name="server_url" value="{server_url}"></td>
        </tr>
        <tr>
            <td><label for="api_key">API Key: </label></td>
            <td><input type="text" id="api_key" name="api_key" value="{api_key}"></td>
        </tr>
        <tr>
            <td colspan="2"><input type="submit" value="Save Changes"></td>
        </tr>
    </table>
</form>
