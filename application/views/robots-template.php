<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>{pagetitle}</title>
        <meta HTTP-EQUIV="Content-Type" CONTENT="text/html; charset=UTF-8"/>
        <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css"/>
        <link rel="stylesheet" type="text/css" href="/assets/css/robots.css"/>
        <script src="/assets/js/jquery-3.1.1.slim.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
	</head>
  <body>
    <header>
      <nav>
        <ul>
          <a href="/" ><li>Home</li></a>
          <a href="/parts" {parts_role}><li>Parts</li></a>
          <a href="/assembly" {assembly_role}><li>Assembly</li></a>
          <a href="/history" {history_role}><li>History</li></a>
          <a href="/manage" {manage_role}><li>Manage</li></a>
          <li class="dropdown">
            <a class="dropdown-toggle" data-toggle="dropdown" href="#">User Role<b class="caret"></b></a>
            <ul class="dropdown-menu" role="menu" aria-labelledby="dLabel">
              <li><a href="/roles/actor/guest">Guest</a></li>
              <li><a href="/roles/actor/worker">Worker</a></li>
              <li><a href="/roles/actor/supervisor">Supervisor</a></li>
              <li><a href="/roles/actor/boss">Boss</a></li>
            </ul>
          </li> 
        </ul>
      </nav>
    </header>
    <div class="content">
      {content}
    </div>
    <footer>
      Team Nectarine
      <span id="ci_version">{ci_version}</span>
    </footer>
  </body>
</html>
