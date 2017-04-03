<div class="row">
    <div class="col-sm-12">
        <h1>Manage</h1>
        <ul id="myTabs" class="nav nav-tabs" role="tablist">
            <li role="presentation" class="active"><a data-toggle="tab" href="#sell">Sell</a></li>
            <li role="presentation"><a data-toggle="tab" href="#settings">Settings</a></li>
        </ul>
    </div>
</div>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade" id="settings">
        <div class="row">
            <div class="col-md-6">
                <h2>Settings</h2>
                <form action="/manage/reboot" method="POST">
                    <button class="btn btn-primary" type="submit">Reboot Facility</button>
                </form>
                {rreboot}
                <h3>Register</h3>
                <form class="form-horizontal" action="/manage/register" method="POST">
                    <div class="form-group">
                        <input id="team" name="team" type="hidden" value="{team}">
                        <label class="control-label col-sm-3">Team:</label>
                        <div class="col-sm-9">
                            <p class="form-control-static">{team}</p>
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="password">Secret Token:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="password" name="password">
                        </div>
                    </div>
                    <div class="col-sm-offset-3 col-sm-9">
                        <input class="btn btn-default" type="submit" value="Register">
                    </div>
                </form>
                {rreg}
                <h3>Properties</h3>
                <form class="form-horizontal" action="/manage/editproperties" method="POST">
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="team">Team Name:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="team" name="team" value="{team}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="server_url">Server URL:</label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="server_url" name="server_url" value="{server_url}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="control-label col-sm-3" for="api_key">API Key: </label>
                        <div class="col-sm-9">
                            <input class="form-control" type="text" id="api_key" name="api_key" value="{api_key}">
                        </div>
                    </div>
                    <div class="col-sm-offset-3 col-sm-9">
                        <input class="btn btn-default" type="submit" value="Save Changes">
                    </div>
                </form>
                {redit}
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade in active" id="sell">
        <table class="table">
            <tr>
                <th>ID</th>
                <th>Head</th>
                <th>Torso</th>
                <th>Legs</th>
                <th>Date Built</th>
                <th></th>
            </tr>
            {robots}
        </table>
    </div>
</div>
