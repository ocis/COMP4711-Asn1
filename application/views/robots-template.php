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
          <a href="/"><li>Home</li></a>
          <a href="parts"><li>Parts</li></a>
          <a href="assembly"><li>Assembly</li></a>
          <a href="history"><li>History</li></a>
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
