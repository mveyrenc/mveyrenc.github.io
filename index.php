<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pôle PHP - Documentation</title>

  <link rel="stylesheet" href="/_themes/sphinx_rtd_theme/sphinx_rtd_theme/static/css/theme.css" />
  <link rel="stylesheet" href="/_themes/sphinx_rtd_theme/sphinx_rtd_theme/static/css/tag.css" />
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" type="text/css" />

  <link rel="shortcut icon" href="_themes/sphinx_rtd_theme/sphinx_rtd_theme/static/images/favicon.png"/>
</head>
<body class="wy-body-for-nav">

<section class="wy-nav-content-wrap">
  <div class="wy-nav-content">

    <?php

    $dir = ".";
    $blacklist = array('_themes', 'nbproject');
    $files = preg_grep('/^([^.])/', scandir($dir));

    ?>

    <nav class="wy-nav-side" data-toggle="wy-nav-shift">
      <div class="wy-side-nav-search">
        <a class="icon icon-home" href="#">Pôle PHP - Documentation</a>
      </div>

      <div aria-label="main navigation" role="navigation" data-spy="affix" class="wy-menu wy-menu-vertical">

        <p class="caption"><span class="caption-text">Table des matières</span></p>
        <ul>
            <?php
            foreach ($files as $file) {
              if (is_dir($file) && !in_array($file, $blacklist)) {
                  $file_title = ucwords(str_replace('_', ' ', $file));
                  ?>
                  <li class="toctree-l1">
                    <a href="#<?php echo $file ?>" class="reference internal"><?php echo $file_title ?></a>
                  </li>
                  <?php
                }
              }
            ?>
        </ul>

      </div>
      &nbsp;
    </nav>

    <div class="rst-content">
      <div aria-label="breadcrumbs navigation" role="navigation">
        <ul class="wy-breadcrumbs">
          <li><a href="#">Docs</a> &gt;</li>

          <li class="wy-breadcrumbs-aside">
            <img class="logo" src="_themes/sphinx_rtd_theme/sphinx_rtd_theme/static/images/logo_html.png">
          </li>
        </ul>
        <hr>
      </div>
      <div class="document" role="main">
        <div itemprop="articleBody">

          <div class="section">
            <h1>Pole PHP - Documentations</h1>

            <div class="section">
              <?php

              foreach ($files as $file) {
                if (is_dir($file) && !in_array($file, $blacklist)) {
                    $file_title = str_replace('_', ' ', $file);

                    $dir_html = '/_build/html/';
                    $dir_latex = '/_build/latex/';
                    $file_pdf = false;
                    if (is_dir($file . $dir_latex)) {

                      if ($dh2 = opendir($file . $dir_latex)) {
                        while (($file_latex = readdir($dh2)) !== false) {
                          $pathinfo = pathinfo($file_latex);
                          if ($pathinfo['extension'] == 'pdf') {
                            $file_pdf = $file_latex;
                            break;
                          }
                        }
                      }
                    }

                    $readme_content = false;
                    if (is_file($file . '/README')) {
                      $readme_content = file_get_contents($file . '/README');
                    }

                    ?>
                    <a name="<?php echo $file ?>"></a>
                    <div class="section">

                      <?php
                      if (is_file($file . '/_static/images/logo.png')) {
                        ?>
                        <div style="float:right">
                          <img src="<?php echo $file ?>/_static/images/logo.png" width="120" />
                        </div>
                        <?php
                      }
                      ?>
                      <h2><?php echo $file_title ?></h2>
                      <?php if ($readme_content) { ?><p><?php echo nl2br($readme_content) ?></p><?php } ?>
                        <p>
                          <a href="<?php echo $file . $dir_html ?>" target="_blank"><span class="tag tag-default">HTML</span></a>

                          <?php if ($file_pdf) { ?>
                          <a href="<?php echo $file . $dir_latex . $file_pdf ?>" target="_blank"><span class="tag tag-warning">PDF</span></a>
                          <?php } ?>
                        </p>
                      <div class="clearfix"></div>
                    </div>
                    <hr/>
                    <?php
                }
              }
              ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>