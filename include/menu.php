
	<!-- Basic Page Info -->
	<meta charset="utf-8">
	<title>IMMO INVESTMENT SCI</title>

	<!-- Site favicon -->
	<link rel="apple-touch-icon" sizes="200x200" href="../vendors/images/logo.png">
	<link rel="icon" type="image/png" sizes="64x64" href="../vendors/images/logo.png">
	<link rel="icon" type="image/png" sizes="64x64" href="../vendors/images/logo.png">

	<!-- Mobile Specific Metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Lato:wght@700&family=Mulish:ital,wght@1,500&family=Poppins:ital,wght@0,300;0,400;1,300&display=swap" rel="stylesheet"> 
	<link rel="stylesheet" type="text/css" href="../vendors/styles/core.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="../vendors/styles/style.css">
	<link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.5.0/css/flag-icon.min.css">
	<link rel="stylesheet" type="text/css" href="../style.css">

	<style>
  body{
    font-family: 'Poppins', sans-serif;
  }
</style>

	<div class="header">
		<div class="header-left">
			<div class="menu-icon dw dw-menu"></div>
			
			<div class="search-toggle-icon dw dw-search2" data-toggle="header_search"></div>
			<div class="header-search">
				<form>
					<div class="form-group mb-0">
						<i class="dw dw-search2 search-icon"></i>
						<input type="text" class="form-control search-input" placeholder="">
						<div class="dropdown">
							
							<div class="dropdown-menu dropdown-menu-right">
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
		<div class="header-right">
			<div class="dashboard-setting user-notification">
				<div class="dropdown">
					
				</div>
			</div>
			<div class="user-notification">
				<div class="dropdown">
					<a class="dropdown-toggle no-arrow" href="#" role="button" data-toggle="dropdown">	
					</a>
					<div class="dropdown-menu dropdown-menu-right">
						<div class="notification-list mx-h-350 customscroll">
							
							</ul>
						</div>
					</div>
				</div>
			</div>
			 
			<?php include("../login/session_utilisateur.php");?>
			<?php include("../login/droit_acces.php");?>
			<div class="user-info-dropdown mt-4">
			
				<div class="dropdown">
					<a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
					<?php
						$avatar_path = "../image_utilisateurs/" . $_SESSION['photo']; // Assurez-vous d'ajuster le chemin en fonction de votre structure de fichiers
						if (file_exists($avatar_path)) {
							echo "<img src='" . $avatar_path . "' width='50' height='50' class='rounded-circle ' style='border-radius: 50%;object-fit: cover; aspect-ratio: 1/1;'>";
						} else {
							echo "<i class='bi bi-person-circle'></i>";
						}
						?>
						</span>
						<span class="user-name"><?php echo $_SESSION['nom']; ?></span>
					</a>
					<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
						<a class="dropdown-item" href="../login/profile.php"><i class="dw dw-user1"></i> Profile</a>
						<a class="dropdown-item" href="../login/logout.php"><i class="dw dw-logout"></i> Déconnexion</a>
					</div>
				</div>
			</div>
			
		</div>
	</div>

	

	<div class="left-side-bar">
		<div class="brand-logo">
			<a href="../page/dashboard.php">
				<img src="../vendors/images/logo.png" alt="" class="dark-logo">
				<img src="../vendors/images/logo.png" alt="" class="light-logo" style="width:90px">
			</a>
			<div class="close-sidebar" data-toggle="left-sidebar-close">
				<i class="ion-close-round"></i>
			</div>
		</div>
		<div class="menu-block customscroll">
			<div class="sidebar-menu">
				<ul id="accordion-menu">

					<?php if ($IsAdmin || $IsSuperAdmin): ?>
						<li class="mt-5">
							<a href="../page/dashboard.php" class="dropdown-toggle no-arrow active">
								<span class="micon bi bi-circle"></span><span class="mtext">Tableau de bord</span>
							</a>
						</li>
					<?php endif; ?>

					<?php if ($IsAdmin): ?>
						<li class="mt-2">
							<a href="../client/client.php" class="dropdown-toggle no-arrow">
								<span class="micon bi bi-circle"></span><span class="mtext">Clients</span>
							</a>
						</li>
					<?php endif; ?>



					<?php if ($IsSuperAdmin): ?>
				     <li class="dropdown mt-2">
					<a href="javascript:;" class="dropdown-toggle">
						<span class="micon bi bi-circle"></span><span class="mtext">Utilisateurs</span>
					</a>
					<ul class="submenu">
          
                <li>
                    <a href="../admin/liste_admins.php">
                        <span class="micon bi bi-circle  mr-3"></span>
                        Administrateurs
                    </a>
                </li>
           
            <li>
                <a href="../agent/AgentImmobilier.php">
                    <span class="micon bi bi-circle  mr-3"></span>
                    Agents Immobiliers
                </a>
            </li>

            <li>
                <a href="../proprietaire/proprietaire.php">
                    <span class="micon bi bi-circle  mr-3"></span>
                    Propriétaires
                </a>
            </li>

            <li>
                <a href="../client/client.php">
                    <span class="micon bi bi-circle  mr-3"></span>
                    Clients
                </a>
            </li><br><br>
        </ul>
    </li>
<?php endif; ?>

					<?php if ($IsAdmin || $IsSuperAdmin): ?>
					<li class="dropdown mt-2">
						<a href="javascript:;" class="dropdown-toggle">
							<span class="micon bi bi-circle"></span><span class="mtext">Produits</span>
						</a>
						<ul class="submenu">
							<li>
								<a href="../duplex/duplex.php">
									<span class="micon bi bi-circle mr-3"></span>
									Duplex
								</a>
							</li>
							<li>
								<a href="../appartement/appartement.php">
									<span class="micon bi bi-circle mr-3"></span>
									Appartements Moderne
								</a>
							</li>
							<li>
								<a href="../studio/studio.php">
									<span class="micon bi bi-circle mr-3"></span>
									Studios Moderne
								</a>
							</li>
							<li>
								<a href="../chambre/chambre.php">
									<span class="micon bi bi-circle mr-3"></span>
									Chambres Moderne
								</a>
							</li>
							<li>
								<a href="../maisons/maisons.php">
									<span class="micon bi bi-circle mr-3"></span>
									Maisons
								</a>
							</li>
							<li>
								<a href="../immeubles/immeubles.php">
									<span class="micon bi bi-circle mr-3"></span>
									Immeubles
								</a>
							</li>
							<li>
								<a href="../villa/villa.php">
									<span class="micon bi bi-circle mr-3"></span>
									Villas
								</a>
							</li>
							<li>
								<a href="../terrains/terrains.php">
									<span class="micon bi bi-circle mr-3"></span>
									Terrains
								</a>
							</li>
						</ul>
					</li><br>
					<?php endif; ?>

					<?php if ($IsAdmin || $IsSuperAdmin): ?>
				<li class="mt-2">
					<a href="../produit/produit.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-circle"></span><span class="mtext">Liste Produits</span>
					</a>
				</li>
				<li class="mt-2">
					<a href="../produit/reservation.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-circle"></span><span class="mtext">Liste Réservations</span>
					</a>
				</li>
				
			<?php elseif ($IsAgentImmobilier || $IsProprietaire): ?>
				<li class="mt-5">
					<a href="../page/mes_publications.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-circle"></span><span class="mtext">Mes Publications</span>
					</a>
				</li>
				<li class="">
					<a href="../page/mes_commentaires.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-circle"></span><span class="mtext">Mes Commentaires</span>
					</a>
				</li>
				<li class="">
					<a href="../page/mes_produits_loues.php" class="dropdown-toggle no-arrow">
						<span class="micon bi bi-circle"></span><span class="mtext">Mes produits Occupés</span>
					</a>
				</li>
			<?php endif; ?>

					
					</div>
		</div>
	</div>
	
					
			

	<!-- js -->
	<script src="../vendors/scripts/core.js"></script>
	<script src="../vendors/scripts/script.min.js"></script>
	<script src="../vendors/scripts/process.js"></script>
	<script src="../vendors/scripts/layout-settings.js"></script>
	<script src="../vendors/scripts/dashboard.js"></script>