<!doctype html>
<html lang="es">
  <head>
    <base href="<?=base_url()?>" />
    <meta charset="utf-8"/>
    <title>SAPIE</title>
    <link rel="stylesheet" href="application/external/template/css/layout.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="application/views/scripts/css/kendo.sapie.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="application/external/kendoui/source/styles/kendo.common.css" type="text/css" media="screen" />
    
    <!--[if lt IE 9]>
	<link rel="stylesheet" href="css/ie.css" type="text/css" media="screen" />
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

  </head>


  <body>
    <!-- Cabecera -->
    <header id="header">
      <hgroup>
	<h1 class="site_title"><a href="home">SAPIE</a></h1>
	<h2 class="section_title">Encabezado institucional</h2><div class="btn_view_site"><a href="http://ucgmerida.gob.ve" target="_blank">UCG</a></div>
      </hgroup>
    </header> 
    <!-- Fin de la cabecera -->
    
    <!-- Barra seguida de la cabecera -->
    <section id="secondary_bar">
      <!-- Div reservada para mostrar información acerca del usuario -->
      <div class="user">
	<p>Usuario (<a href="#">3 Mensajes</a>)</p>
	<a class="logout_user" href="#" title="Cerrar sesión">Cerrar sesión</a>
      </div>
      <!-- Fin de la div reservada para el usuario -->

      <!-- Div reservada para mostrarle al usuario en que parte de la aplicación está ubicado -->
      <div class="breadcrumbs_container">
	<article class="breadcrumbs"><a href="home">SAPIE</a> <div class="breadcrumb_divider"></div> <a class="current">Panel</a></article>
      </div>
      <!-- Fin de la div que le muestra al usuario en que parte de la aplicación está ubicado -->
      
    </section>
    <!-- Fin de la barra seguida de la cabecera -->
    
    <!-- Columna lateral izquierda (reservada para el menú) -->
    <aside id="sidebar" class="column">

      <!-- Form de busqueda -->
      <form class="quick_search">
	<input type="text" value="Buscar" onfocus="if(!this._haschanged){this.value=''};this._haschanged=true;">
      </form>
      <hr/>
      <!-- Fin de Form de busqueda -->
      
      <!-- Menú de Opciones -->
      <h3>Participación Popular</h3>
      <ul class="toggle">
	<li class="icn_new_article"><a href="#">Plenarias</a></li>
	<li class="icn_edit_article"><a href="#">Propuestas</a></li>
	<li class="icn_categories"><a href="#">Participantes</a></li>
      </ul>

      <!-- <h3>Content</h3> -->
      <!-- <ul class="toggle"> -->
      <!-- 	<li class="icn_new_article"><a href="#">New Article</a></li> -->
      <!-- 	<li class="icn_edit_article"><a href="#">Edit Articles</a></li> -->
      <!-- 	<li class="icn_categories"><a href="#">Categories</a></li> -->
      <!-- 	<li class="icn_tags"><a href="#">Tags</a></li> -->
      <!-- </ul> -->
      <!-- <h3>Users</h3> -->
      <!-- <ul class="toggle"> -->
      <!-- 	<li class="icn_add_user"><a href="#">Add New User</a></li> -->
      <!-- 	<li class="icn_view_users"><a href="#">View Users</a></li> -->
      <!-- 	<li class="icn_profile"><a href="#">Your Profile</a></li> -->
      <!-- </ul> -->
      <!-- <h3>Media</h3> -->
      <!-- <ul class="toggle"> -->
      <!-- 	<li class="icn_folder"><a href="#">File Manager</a></li> -->
      <!-- 	<li class="icn_photo"><a href="#">Gallery</a></li> -->
      <!-- 	<li class="icn_audio"><a href="#">Audio</a></li> -->
      <!-- 	<li class="icn_video"><a href="#">Video</a></li> -->
      <!-- </ul> -->
      <!-- <h3>Admin</h3> -->
      <!-- <ul class="toggle"> -->
      <!-- 	<li class="icn_settings"><a href="#">Options</a></li> -->
      <!-- 	<li class="icn_security"><a href="#">Security</a></li> -->
      <!-- 	<li class="icn_jump_back"><a href="#">Logout</a></li> -->
      <!-- </ul> -->
      <!-- Fin de Menú de opciones -->

      <!-- Pie de página -->
      <footer>
	<hr />
	<p><strong>Copyright &copy; 2012 Unidad de Control de Gestión de la Gobernación del Estado Mérida</strong></p>
	<p>Plantilla desarrollada por <a href="http://www.medialoot.com">MediaLoot</a></p>
      </footer>
      <!-- Fin de pie de página -->
      
    </aside>
    <!-- Fin de columna lateral izquierda -->

    <!-- Columna de la derecha o columna principal donde se va a mostrar el contenido -->
    <section id="main" class="column">
      
      <h4 class="alert_info">Bienvenido al Sistema Automatizado del Plan de Inversión Estadal</h4>
      
      <article class="module width_full">
	<header><h3>Estadisticas de las Plenarias</h3></header>
	<div class="module_content">
	  <article class="stats_graph">
	    <img src="http://chart.apis.google.com/chart?chxr=0,0,3000&chxt=y&chs=520x140&cht=lc&chco=76A4FB,80C65A&chd=s:Tdjpsvyvttmiihgmnrst,OTbdcfhhggcTUTTUadfk&chls=2|2&chma=40,20,20,30" width="520" height="140" alt="" />
	  </article>
	  
          <!-- Gráfico estadistico de las plenarias -->
	  <article class="stats_overview">
	    <div class="overview_today">
	      <p class="overview_day">Año 2012</p>
	      <p class="overview_count">1,876</p>
	      <p class="overview_type">Participantes</p>
	      <p class="overview_count">2,103</p>
	      <p class="overview_type">Propuestas</p>
	    </div>
	    <div class="overview_previous">
	      <p class="overview_day">Año 2011</p>
	      <p class="overview_count">1,646</p>
	      <p class="overview_type">Partitcipantes</p>
	      <p class="overview_count">2,054</p>
	      <p class="overview_type">Propuestas</p>
	    </div>
	  </article>
          <!-- Fin del gráfico -->
	  <div class="clear"></div>
	</div>
      </article>
      
      <article class="module width_full">
	<header><h3>Plenarias</h3></header>
	<div class="module_content">
	  <!-- Grid de Plenarias -->
          <div id="grid-plenarias" style="height: 380px" class="sapie-grid"></div>
	  <!-- FIN Grid de Plenarias -->

          <!-- Subgrid Plenarias -->
          <script type="text/x-kendo-template" id="template">
            <div class="subgrid-plenarias"></div>
          </script>
          <!-- Fin Subgrid Plenarias -->
          
        </div>
      </article>

      <div class="spacer"></div>
    </section>

    <!-- Carga de scripts al final para mejorar la carga del sitio -->
    <script src="application/external/kendoui/js/jquery.min.js"               type="text/javascript"></script>
    <script src="application/external/template/js/hideshow.js"               type="text/javascript"></script>
    <script src="application/external/template/js/jquery.tablesorter.min.js" type="text/javascript"></script>
    <script src="application/external/template/js/jquery.equalHeight.js"     type="text/javascript"></script>
    <script src="application/external/kendoui/js/kendo.web.min.js"     type="text/javascript"></script>
    <script src="application/external/kendoui/source/js/cultures/kendo.culture.es-VE.js" type="text/javascript"></script>
    <script type="text/javascript"><?php include ('scripts/js/home.js') ?></script>
    <!-- FIN Carga de scripts al final para mejorar la carga del sitio -->

  </body>

</html>
