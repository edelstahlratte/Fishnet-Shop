<?php
/* --------------------------------------------------------------
   $Id: banner_statistics.php 1125 2005-07-28 09:59:44Z novalis $   

   XT-Commerce - community made shopping
   http://www.xt-commerce.com

   Copyright (c) 2003 XT-Commerce
   --------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(banner_statistics.php,v 1.4 2002/11/22); www.oscommerce.com 
   (c) 2003	 nextcommerce (banner_statistics.php,v 1.9 2003/08/18); www.nextcommerce.org

   Released under the GNU General Public License 
   --------------------------------------------------------------*/

  require('includes/application_top.php');

  $banner_extension = xtc_banner_image_extension();

  // check if the graphs directory exists
  $dir_ok = false;
  if ( (function_exists('imagecreate')) && ($banner_extension) ) {
    if (is_dir(DIR_WS_IMAGES . 'graphs')) {
      if (is_writeable(DIR_WS_IMAGES . 'graphs')) {
        $dir_ok = true;
      } else {
        $messageStack->add(ERROR_GRAPHS_DIRECTORY_NOT_WRITEABLE, 'error');
      }
    } else {
      $messageStack->add(ERROR_GRAPHS_DIRECTORY_DOES_NOT_EXIST, 'error');
    }
  }

  $banner_query = xtc_db_query("select banners_title from " . TABLE_BANNERS . " where banners_id = '" . $_GET['bID'] . "'");
  $banner = xtc_db_fetch_array($banner_query);

  $years_array = array();
  $years_query = xtc_db_query("select distinct year(banners_history_date) as banner_year from " . TABLE_BANNERS_HISTORY . " where banners_id = '" . $_GET['bID'] . "'");
  while ($years = xtc_db_fetch_array($years_query)) {
    $years_array[] = array('id' => $years['banner_year'],
                           'text' => $years['banner_year']);
  }

  $months_array = array();
  for ($i=1; $i<13; $i++) {
    $months_array[] = array('id' => $i,
                            'text' => strftime('%B', mktime(0,0,0,$i)));
  }

  $type_array = array(array('id' => 'daily',
                            'text' => STATISTICS_TYPE_DAILY),
                      array('id' => 'monthly',
                            'text' => STATISTICS_TYPE_MONTHLY),
                      array('id' => 'yearly',
                            'text' => STATISTICS_TYPE_YEARLY));
require (DIR_WS_INCLUDES.'head.php');
?>
</head>
<body marginwidth="0" marginheight="0" topmargin="0" bottommargin="0" leftmargin="0" rightmargin="0" bgcolor="#FFFFFF">
<!-- header //-->
<?php require(DIR_WS_INCLUDES . 'header.php'); ?>
<!-- header_eof //-->

<!-- body //-->
<div class='row'>

    
<!-- body_text //-->
        <div class='col-xs-12'>
            <?php echo xtc_draw_form('year', FILENAME_BANNER_STATISTICS, '', 'get'); ?>
            <div class='col-xs-6'>
                <p class="h2"><?php echo HEADING_TITLE; ?></p>
            </div>
            <div class='col-xs-6 text-right'>
            <div class='col-xs-12'> <br> </div>
            <div class="main"><?php echo TITLE_TYPE . ' ' . xtc_draw_pull_down_menu('type', $type_array, (($_GET['type']) ? $_GET['type'] : 'daily'), 'onChange="this.form.submit();"'); ?><noscript><input type="submit" value="GO"></noscript><br />
<?php
  switch ($_GET['type']) {
    case 'yearly': break;
    case 'monthly':
      echo TITLE_YEAR . ' ' . xtc_draw_pull_down_menu('year', $years_array, (($_GET['year']) ? $_GET['year'] : date('Y')), 'onChange="this.form.submit();"') . '<noscript><input type="submit" value="GO"></noscript>';
      break;
    default:
    case 'daily':
      echo TITLE_MONTH . ' ' . xtc_draw_pull_down_menu('month', $months_array, (($_GET['month']) ? $_GET['month'] : date('n')), 'onChange="this.form.submit();"') . '<noscript><input type="submit" value="GO"></noscript><br />' . TITLE_YEAR . ' ' . xtc_draw_pull_down_menu('year', $years_array, (($_GET['year']) ? $_GET['year'] : date('Y')), 'onChange="this.form.submit();"') . '<noscript><input type="submit" value="GO"></noscript>';
      break;
  }
?>
            </div>
          <?php echo xtc_draw_hidden_field('page', $_GET['page']) . xtc_draw_hidden_field('bID', $_GET['bID']); ?>
            </form>
            </div>
        </div>
        <div class='col-xs-12'> <br> </div>
        <div class='col-xs-12 text-center'>
            <div class='col-xs-12 '>
                <div class='col-xs-4 col-xs-push-4'>
<?php
  if ( (function_exists('imagecreate')) && ($dir_ok) && ($banner_extension) ) {
    $banner_id = $_GET['bID'];
    switch ($_GET['type']) {
      case 'yearly':
        include(DIR_WS_INCLUDES . 'graphs/banner_yearly.php');
        echo xtc_image(DIR_WS_IMAGES . 'graphs/banner_yearly-' . $banner_id . '.' . $banner_extension, '', '', '', 'class="img-responsive"');
        break;
      case 'monthly':
        include(DIR_WS_INCLUDES . 'graphs/banner_monthly.php');
        echo xtc_image(DIR_WS_IMAGES . 'graphs/banner_monthly-' . $banner_id . '.' . $banner_extension, '', '', '', 'class="img-responsive"');
        break;
      default:
      case 'daily':
        include(DIR_WS_INCLUDES . 'graphs/banner_daily.php');
        echo xtc_image(DIR_WS_IMAGES . 'graphs/banner_daily-' . $banner_id . '.' . $banner_extension, '', '', '', 'class="img-responsive"');
        break;
    }
             
    ?>      </div>
            </div>
        <div class='table-responsive col-xs-4 col-xs-push-4 hidden-xs hidden-sm'>
          <table class='table table-bordered table-striped'>
            <thead class="dataTableHeadingRow">
             <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SOURCE; ?></td>
             <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_VIEWS; ?></td>
             <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_CLICKS; ?></td>
           </thead>
           <tbody>
<?php
    for ($i = 0, $n = sizeof($stats); $i < $n; $i++) {
      echo '            <tr class="dataTableRow">' . "\n" .
           '              <td class="dataTableContent">' . $stats[$i][0] . '</td>' . "\n" .
           '              <td class="dataTableContent" align="right">' . number_format($stats[$i][1]) . '</td>' . "\n" .
           '              <td class="dataTableContent" align="right">' . number_format($stats[$i][2]) . '</td>' . "\n" .
           '            </tr>' . "\n";
    }
?>
          </tbody>
          </table>
        </div>
            
        <div class='table-responsive hidden-lg hidden-md'>
          <table class='table table-bordered table-striped'>
            <thead class="dataTableHeadingRow">
             <td class="dataTableHeadingContent"><?php echo TABLE_HEADING_SOURCE; ?></td>
             <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_VIEWS; ?></td>
             <td class="dataTableHeadingContent" align="right"><?php echo TABLE_HEADING_CLICKS; ?></td>
           </thead>
           <tbody>
<?php
    for ($i = 0, $n = sizeof($stats); $i < $n; $i++) {
      echo '            <tr class="dataTableRow">' . "\n" .
           '              <td class="dataTableContent">' . $stats[$i][0] . '</td>' . "\n" .
           '              <td class="dataTableContent" align="right">' . number_format($stats[$i][1]) . '</td>' . "\n" .
           '              <td class="dataTableContent" align="right">' . number_format($stats[$i][2]) . '</td>' . "\n" .
           '            </tr>' . "\n";
    }
?>
          </tbody>
          </table>
        </div>
<?php
  } else {
    include(DIR_WS_FUNCTIONS . 'html_graphs.php');
    switch ($_GET['type']) {
      case 'yearly':
        echo xtc_banner_graph_yearly($_GET['bID']);
        break;
      case 'monthly':
        echo xtc_banner_graph_monthly($_GET['bID']);
        break;
      default:
      case 'daily':
        echo xtc_banner_graph_daily($_GET['bID']);
        break;
    }
  }
?>
      </div>
        <div class='col-xs-12'> <br> </div>
        <div class='col-xs-12 text-right'><?php echo '<a class="btn btn-default" onclick="this.blur();" href="' . xtc_href_link(FILENAME_BANNER_MANAGER, 'page=' . $_GET['page'] . '&bID=' . $_GET['bID']) . '">' . BUTTON_BACK . '</a>'; ?></div>
<!-- body_text_eof //-->
</div>
<!-- body_eof //-->
<!-- footer //-->
<?php require(DIR_WS_INCLUDES . 'footer.php'); ?>
<!-- footer_eof //-->
<br />
</body>
</html>
<?php require(DIR_WS_INCLUDES . 'application_bottom.php'); ?>
