<?php
  $gallerytitle = 'Quick and dirty photo gallery - just one PHP file!';
  $layout = 'masonry'; // Choose: full or masonry
  $page = 1; // Starting page
  $pics_per_page = 30;
  
  if ( isset( $_GET[ 'page' ] ) ) :
    $page = max(1, intval( $_GET['page'] ) );
  endif;

  $extensions = array( 'jpg', 'jpeg', 'png', 'gif' );
  $sortOrder = 1;
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <title><?php echo $gallerytitle; ?></title>
  <link href="data:image/png;base64,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" rel="icon" type="image/x-icon">
  <style type="text/css">
  body {
    margin: 0;
    background-color: #131212;
    text-align: center;
    font-family: 'Helvetica', sans-serif;
  }

  body * {
    color: #888;
  }

  <?php if ( 'full' === $layout ) : ?>
  body img {
    width: 100%;
    height: auto;
  }
  <?php endif; ?>

  <?php if ( 'masonry' === $layout ) : ?>
  body {
    margin: 5px;
  }

  .masonry {
    column-count: 4;
    column-gap: 5px;
  }

  .masonry img {
    background-color: #eee;
    display: inline-block;
    margin: 0 0 5px;
    width: 100%;
  }  
  <?php endif; ?>

  .nav svg {
    position: relative;
    top: 2px;
  }

  .nav a:hover {
    opacity: .5;
  }

  header p,
  footer p {
    font-size: 14px;
  }
  </style>
</head>
<body>
<?php if ( 'full' === $layout ) : ?>
  <header>
    <p>Scroll down to see the photos.</p>
  </header>
<?php endif; ?>

<?php if ( 'masonry' === $layout ) : ?>
  <div class="masonry">
<?php endif;
  $numpics = 0;
    foreach ( scandir('.', $sortOrder) as $file ) :
      foreach ( $extensions as $extension ) :
        if ( strpos($file, '.'.$extension ) > 0 ) :
          $numpics++;

            // Check if image should be shown on current $page
            if ( $numpics > ( $page -1 ) * $pics_per_page && $numpics <= $page * $pics_per_page ) : 
              $caption = basename( $file, '.' . $extension );

              ?>
                  <?php if ( 'masonry' === $layout ) : ?><a href="<?php echo $file; ?>"><?php endif; ?><img class="gallery-image" src="<?php echo rawurlencode($file); ?>" alt="<?php echo $caption; ?>" /><?php if ( 'masonry' === $layout ) : ?></a><?php endif;
                break;
            endif;
        endif;
      endforeach;
    endforeach; 

if ( 'masonry' === $layout ) : ?>
  </div><!-- .masonry -->
<?php endif;

    // Page navigation
    if ( $numpics > $pics_per_page ) : ?>
    <footer class="nav">
        <?php
          $numpages = ceil($numpics / $pics_per_page);

          if ($page <= 1) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="#333" width="16" height="16" viewBox="0 0 24 24"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm7.58 0l5.988-5.995 1.414 1.416-4.574 4.579 4.574 4.59-1.414 1.416-5.988-6.006z"/></svg>
          <?php else : ?>
            <a href="<?php echo basename(__FILE__); ?>?page=<?php echo ($page - 1); ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="#888" width="16" height="16" viewBox="0 0 24 24"><path d="M0 12c0 6.627 5.373 12 12 12s12-5.373 12-12-5.373-12-12-12-12 5.373-12 12zm7.58 0l5.988-5.995 1.414 1.416-4.574 4.579 4.574 4.59-1.414 1.416-5.988-6.006z"/></svg></a>
          <?php endif; ?>

        <?php echo '&nbsp;' . $page .'/' . $numpages. '&nbsp;';
        if ($page >= $numpages) : ?>
            <svg xmlns="http://www.w3.org/2000/svg" fill="#333" width="16" height="16" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.568 18.005l-1.414-1.415 4.574-4.59-4.574-4.579 1.414-1.416 5.988 5.995-5.988 6.005z"/></svg>
        <?php else : ?>
          <a href="<?php echo basename(__FILE__); ?>?page=<?php echo ($page + 1); ?>"><svg xmlns="http://www.w3.org/2000/svg" fill="#888" width="16" height="16" viewBox="0 0 24 24"><path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm-1.568 18.005l-1.414-1.415 4.574-4.59-4.574-4.579 1.414-1.416 5.988 5.995-5.988 6.005z"/></svg></a>
        <?php endif; ?>
    </footer>
    <?php endif; ?>
</body>
</html>