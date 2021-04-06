<?php
if(file_exists('dbconnect.php')){
	header('location:index.php');
	die();
}
$msg="";
$host="";
$dbuname="";
$dbpwd="";
$dbname="";
if(isset($_POST['submit'])){
	$host=$_POST['host'];
	$dbuname=$_POST['dbuname'];
	$dbpwd=$_POST['dbpwd'];
	$dbname=$_POST['dbname'];
	
	$mysqli=@mysqli_connect($host,$dbuname,$dbpwd,$dbname);
	if(mysqli_connect_error()){
		$msg=mysqli_connect_error();
	}else{
		copy("db.inc.config.php","dbconnect.php");
		$file="dbconnect.php";
		file_put_contents($file,str_replace("db_host",$host,file_get_contents($file)));
		file_put_contents($file,str_replace("db_username",$dbuname,file_get_contents($file)));
		file_put_contents($file,str_replace("db_password",$dbpwd,file_get_contents($file)));
		file_put_contents($file,str_replace("db_name",$dbname,file_get_contents($file)));
		
		$sql="CREATE TABLE `charge` (
  `idcharge` int(4) NOT NULL,
  `persen` varchar(5) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";
		mysqli_query($mysqli,$sql);
		
		$sql="INSERT INTO `charge` (`idcharge`, `persen`) VALUES
(1, '5');";
		mysqli_query($mysqli,$sql);
		
		$sql="CREATE TABLE `customer` (
  `idcustomer` int(8) NOT NULL,
  `namacust` varchar(80) NOT NULL,
  `email` varchar(40) NOT NULL,
  `ktp` varchar(17) NOT NULL,
  `alamat` varchar(90) NOT NULL,
  `contact` varchar(18) NOT NULL,
  `picture` varchar(600) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
		
		$sql="INSERT INTO `customer` (`idcustomer`, `namacust`, `email`, `ktp`, `alamat`, `contact`, `picture`) VALUES
(2, 'andy', 'andigti@gmail.com', '3526455678888', 'jl. flamboyan no 8 jombang', '08155277290', '0'),
(3, 'Bahri', 'bahri@gmail.com', '351003993007', 'jl. flamboyan no 8 jombang', '0812212200', 'logo.png'),
(4, 'Ali Majid', 'alimajidw@gmail.com', '1234567890', 'Komp Mega Legenda', '081330357463', 'WIN_20201224_11_55_59_Pro.jpg'),
(5, 'Ali Majid 2', 'alimajidw@gmail.com', '123', 'Komp Mega Legenda', '0456456', '0'),
(6, 'RIAN', 'rianh@gmail.com', '38892900010288', 'jl. flamboyan no 8 jombang', '08200233422', '0'),
(7, 'YUYUN', 'yuasnaa@gmail.com', '88101010100', 'Jl. A. yani 748', '08281837377', ''),
(8, 'Teguh Rismantono', 'teguhrismantono88@gmail.com', '2171092305019006', 'Komp Sungai Nayon GG Pesisir Blok E6', '082285704074', '');";
		mysqli_query($mysqli,$sql);

		$sql="CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `start_event` datetime NOT NULL,
  `end_event` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
				
		$sql="INSERT INTO `events` (`id`, `title`, `start_event`, `end_event`) VALUES
(1, 'masuk', '2020-12-23 00:00:00', '2020-12-29 00:00:00'),
(2, 'satu', '2020-12-23 00:00:00', '2020-12-26 00:00:00'),
(3, 'dua', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(4, 'tiga', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(5, 'satu', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(6, 'satu', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(7, 'satu', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(8, 'satu', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(9, 'satu', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(10, 'satu', '2020-12-23 00:00:00', '2020-12-24 00:00:00'),
(11, 'dua', '2020-12-16 00:00:00', '2020-12-17 00:00:00'),
(12, 'tiga', '2020-12-12 00:00:00', '2020-12-13 00:00:00'),
(13, 'dddd', '2020-12-10 00:00:00', '2020-12-11 00:00:00');";
		mysqli_query($mysqli,$sql);
		
				
		$sql="CREATE TABLE `info` (
  `idinfo` int(7) NOT NULL,
  `namaapp` varchar(40) NOT NULL,
  `picture` varchar(500) NOT NULL,
  `address` varchar(900) NOT NULL,
  `city` varchar(30) NOT NULL,
  `country` varchar(30) NOT NULL,
  `poscode` varchar(9) NOT NULL,
  `phone` varchar(19) NOT NULL,
  `slogan` varchar(100) NOT NULL,
  `thanks` varchar(250) NOT NULL,
  `logo` varchar(400) NOT NULL,
  `zone` varchar(60) NOT NULL,
  `email` varchar(80) NOT NULL,
  `currency` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
		mysqli_query($mysqli,$sql);
		
				
		$sql="INSERT INTO `info` (`idinfo`, `namaapp`, `picture`, `address`, `city`, `country`, `poscode`, `phone`, `slogan`, `thanks`, `logo`, `zone`, `email`, `currency`) VALUES
(1, 'Rento POS', 'logostreet.png', 'Building tower. Vanilla Street 37 Block 3', 'Greenhill City', 'Greenland', '', '773883883', 'Your Best Partners', 'Thanks for visit store', 'logo.png', 'Asia/Jakarta', 'admin@barisandata.com', 'USD');";
		mysqli_query($mysqli,$sql);
		
				
		$sql="CREATE TABLE `kategori` (
  `idkatego` int(10) NOT NULL,
  `namakategori` varchar(80) NOT NULL,
  `created` varchar(19) NOT NULL,
  `counter` varchar(8) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
				
		$sql="INSERT INTO `kategori` (`idkatego`, `namakategori`, `created`, `counter`) VALUES
(1, 'Camera', '2020-12-14', '7'),
(2, 'Audio', '2020-12-14', '3'),
(3, 'Lens', '2020-12-14', '2'),
(4, 'Flash/Lighting', '2020-12-14', '4'),
(5, 'Multimedia', '2020-12-14', '5'),
(6, 'Tripod/Stabilizer', '2020-12-14', '3'),
(8, 'Cook Pan', '2020-12-28 01:59:11', '0'),
(9, 'Oven', '2020-12-28 01:59:18', '0'),
(11, 'Stove', '2020-12-28 02:03:40', '0'),
(13, 'Other', '30-12-2020 01:26:50', '0');";
		mysqli_query($mysqli,$sql);
		
				
		$sql="CREATE TABLE `keranjang` (
  `idkeranjang` int(8) NOT NULL,
  `kodesewa` varchar(12) NOT NULL,
  `created` varchar(19) NOT NULL,
  `idproduct` varchar(10) NOT NULL,
  `id_mitra` varchar(7) NOT NULL,
  `hrg` varchar(19) NOT NULL,
  `qty` varchar(9) NOT NULL,
  `total` varchar(19) NOT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
		
				
		$sql="INSERT INTO `keranjang` (`idkeranjang`, `kodesewa`, `created`, `idproduct`, `id_mitra`, `hrg`, `qty`, `total`, `status`) VALUES
(41, 'thAePn', '28-12-2020 12:57:21', '2', '1', '350', '3', '1050', 'active'),
(42, 'thAePn', '28-12-2020 12:57:34', '15', '1', '150', '2', '300', 'active'),
(43, 'oY6Teh', '28-12-2020 01:08:01', '5', '1', '100', '2', '200', 'active'),
(44, 'oY6Teh', '28-12-2020 01:08:09', '6', '1', '100', '1', '100', 'active'),
(45, 'oY6Teh', '29-12-2020 03:27:17', '7', '1', '300', '2', '600', 'active'),
(46, '0', '29-12-2020 09:42:12', '16', '1', '120', '2', '240', 'active');";
		mysqli_query($mysqli,$sql);
		
				
		$sql="CREATE TABLE `language` (
  `idlang` int(10) NOT NULL,
  `namelang` text NOT NULL,
  `currency` text NOT NULL,
  `loginemail` text NOT NULL,
  `loginpass` text NOT NULL,
  `titleloginclient` text NOT NULL,
  `forgotpass` text NOT NULL,
  `buttonsign` text NOT NULL,
  `haveno` text NOT NULL,
  `loginsocial` text NOT NULL,
  `memuat` text NOT NULL,
  `dash1` text NOT NULL,
  `dash2` text NOT NULL,
  `dash3` text NOT NULL,
  `dash4` text NOT NULL,
  `dash5` text NOT NULL,
  `dash6` text NOT NULL,
  `dash7` text NOT NULL,
  `dash8` text NOT NULL,
  `dash9` text NOT NULL,
  `dash10` text NOT NULL,
  `dash11` text NOT NULL,
  `dash12` text NOT NULL,
  `dash13` text NOT NULL,
  `dash14` text NOT NULL,
  `dash15` text NOT NULL,
  `dash16` text NOT NULL,
  `dash17` text NOT NULL,
  `dash18` text NOT NULL,
  `dash19` text NOT NULL,
  `dash20` text NOT NULL,
  `dash21` text NOT NULL,
  `dash22` text NOT NULL,
  `dash23` text NOT NULL,
  `dash24` text NOT NULL,
  `dash25` text NOT NULL,
  `dash26` text NOT NULL,
  `dash27` text NOT NULL,
  `dash28` text NOT NULL,
  `dash29` text NOT NULL,
  `dash30` text NOT NULL,
  `das31` text NOT NULL,
  `trans1` text NOT NULL,
  `trans2` text NOT NULL,
  `trans3` text NOT NULL,
  `trans4` text NOT NULL,
  `trans5` text NOT NULL,
  `trans6` text NOT NULL,
  `trans7` text NOT NULL,
  `trans8` text NOT NULL,
  `trans9` text NOT NULL,
  `trans10` text NOT NULL,
  `trans11` text NOT NULL,
  `trans12` text NOT NULL,
  `trans13` text NOT NULL,
  `trans14` text NOT NULL,
  `trans15` text NOT NULL,
  `trans16` text NOT NULL,
  `trans17` text NOT NULL,
  `trans18` text NOT NULL,
  `trans19` text NOT NULL,
  `trans20` text NOT NULL,
  `trans21` text NOT NULL,
  `trans22` text NOT NULL,
  `trans23` text NOT NULL,
  `trans24` text NOT NULL,
  `trans25` text NOT NULL,
  `trans26` text NOT NULL,
  `trans27` text NOT NULL,
  `trans28` text NOT NULL,
  `trans29` text NOT NULL,
  `fin1` text NOT NULL,
  `fin2` text NOT NULL,
  `fin3` text NOT NULL,
  `fin4` text NOT NULL,
  `fin5` text NOT NULL,
  `fin6` text NOT NULL,
  `fin7` text NOT NULL,
  `fin8` text NOT NULL,
  `fin9` text NOT NULL,
  `item1` text NOT NULL,
  `item2` text NOT NULL,
  `item3` text NOT NULL,
  `item4` text NOT NULL,
  `item5` text NOT NULL,
  `item6` text NOT NULL,
  `item7` text NOT NULL,
  `item8` text NOT NULL,
  `item9` text NOT NULL,
  `item10` text NOT NULL,
  `item11` text NOT NULL,
  `item12` text NOT NULL,
  `item13` text NOT NULL,
  `item14` text NOT NULL,
  `item15` text NOT NULL,
  `item16` text NOT NULL,
  `item17` text NOT NULL,
  `item18` text NOT NULL,
  `item19` text NOT NULL,
  `item20` text NOT NULL,
  `item21` text NOT NULL,
  `item22` text NOT NULL,
  `sewa1` text NOT NULL,
  `sewa2` text NOT NULL,
  `sewa3` text NOT NULL,
  `sewa4` text NOT NULL,
  `sewa5` text NOT NULL,
  `sewa6` text NOT NULL,
  `sewa7` text NOT NULL,
  `sewa8` text NOT NULL,
  `sewa9` text NOT NULL,
  `sewa10` text NOT NULL,
  `sewa11` text NOT NULL,
  `sewa12` text NOT NULL,
  `sewa13` text NOT NULL,
  `sewa14` text NOT NULL,
  `sewa15` text NOT NULL,
  `sewa16` text NOT NULL,
  `print1` text NOT NULL,
  `print2` text NOT NULL,
  `print3` text NOT NULL,
  `print4` text NOT NULL,
  `print5` text NOT NULL,
  `print6` text NOT NULL,
  `admin1` text NOT NULL,
  `admin2` text NOT NULL,
  `admin3` text NOT NULL,
  `admin4` text NOT NULL,
  `admin5` text NOT NULL,
  `admin6` text NOT NULL,
  `admin7` text NOT NULL,
  `admin8` text NOT NULL,
  `admin9` text NOT NULL,
  `admin10` text NOT NULL,
  `admin11` text NOT NULL,
  `admin12` text NOT NULL,
  `admin13` text NOT NULL,
  `admin14` text NOT NULL,
  `admin15` text NOT NULL,
  `admin16` text NOT NULL,
  `admin17` text NOT NULL,
  `admin18` text NOT NULL,
  `admin19` text NOT NULL,
  `admin20` text NOT NULL,
  `admin21` text NOT NULL,
  `admin22` text NOT NULL,
  `admin23` text NOT NULL,
  `admin24` text NOT NULL,
  `admin25` text NOT NULL,
  `admin26` text NOT NULL,
  `admin27` text NOT NULL,
  `admin28` text NOT NULL,
  `admin29` text NOT NULL,
  `customer1` text NOT NULL,
  `customer2` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
		mysqli_query($mysqli,$sql);
		
				
		$sql="INSERT INTO `language` (`idlang`, `namelang`, `currency`, `loginemail`, `loginpass`, `titleloginclient`, `forgotpass`, `buttonsign`, `haveno`, `loginsocial`, `memuat`, `dash1`, `dash2`, `dash3`, `dash4`, `dash5`, `dash6`, `dash7`, `dash8`, `dash9`, `dash10`, `dash11`, `dash12`, `dash13`, `dash14`, `dash15`, `dash16`, `dash17`, `dash18`, `dash19`, `dash20`, `dash21`, `dash22`, `dash23`, `dash24`, `dash25`, `dash26`, `dash27`, `dash28`, `dash29`, `dash30`, `das31`, `trans1`, `trans2`, `trans3`, `trans4`, `trans5`, `trans6`, `trans7`, `trans8`, `trans9`, `trans10`, `trans11`, `trans12`, `trans13`, `trans14`, `trans15`, `trans16`, `trans17`, `trans18`, `trans19`, `trans20`, `trans21`, `trans22`, `trans23`, `trans24`, `trans25`, `trans26`, `trans27`, `trans28`, `trans29`, `fin1`, `fin2`, `fin3`, `fin4`, `fin5`, `fin6`, `fin7`, `fin8`, `fin9`, `item1`, `item2`, `item3`, `item4`, `item5`, `item6`, `item7`, `item8`, `item9`, `item10`, `item11`, `item12`, `item13`, `item14`, `item15`, `item16`, `item17`, `item18`, `item19`, `item20`, `item21`, `item22`, `sewa1`, `sewa2`, `sewa3`, `sewa4`, `sewa5`, `sewa6`, `sewa7`, `sewa8`, `sewa9`, `sewa10`, `sewa11`, `sewa12`, `sewa13`, `sewa14`, `sewa15`, `sewa16`, `print1`, `print2`, `print3`, `print4`, `print5`, `print6`, `admin1`, `admin2`, `admin3`, `admin4`, `admin5`, `admin6`, `admin7`, `admin8`, `admin9`, `admin10`, `admin11`, `admin12`, `admin13`, `admin14`, `admin15`, `admin16`, `admin17`, `admin18`, `admin19`, `admin20`, `admin21`, `admin22`, `admin23`, `admin24`, `admin25`, `admin26`, `admin27`, `admin28`, `admin29`, `customer1`, `customer2`) VALUES
(1, 'English', 'USD', 'Login Email', 'Password', 'Login client', 'Forgotten pass', 'Sign In', 'Hi, Currently the rento POS application is only limited to internal corporate use. It is not used for the public', 'Don\'t want to be left behind with the others. Cool Features,\r\n               enliven your day. Come on, sign up!', 'Loading progress requires a stable connection', 'My Profile', 'Full Screen', 'Dashboard', 'Rent Form', 'Finished Rent', 'Item', 'Export/import Data', 'Rent Schedule', 'Send Notification', 'My Account', 'People', 'Rented', 'Available', 'item', 'Overview this year', 'Total revenue this year', 'Estimated Revenue', 'Total Rent', 'Revenue Today', 'Today Rent', 'Revenue This Month', 'This Month', '', '', '', '', '', '', '', '', 'Before printing a Rental Receipt, complete the <br> tenant information to make it easier to manage items and avoid material loss', 'Look for the Item Code or name of the item to be rented, then click the item for rent <br> After you\'ve finished adding some items, fill in the number of rental days, click Submit then fill in the tenant\'s data, then print the Rental Receipt', 'Use Smart Search to find items', 'how many days', 'submit', 'RENTED', 'Rent List', 'Reset All', 'Picture', 'Item Name', 'Day', 'Total', 'Navigation', 'Price', 'days', 'Member', 'Register New Member', 'Type Search for members with Nationality ID number', 'Type your Member Name, to find the ID NationalityCard number', 'Rental Guarantee For example: cellphones, Student Cards, Helmets, etc.', 'Register a new member by filling out a complete identity', 'ID Nationality', 'Name', 'Address', 'Email', 'Rental guarantee', 'Phone', 'Details', 'Print rental receipts', 'Please Print the Receipt, if you want to see the entire rental data, please go to the Export / import Data Menu', 'Look for the Rental Code (invoice) to confirm the return of items', 'Use Smart Search to find Rental Code', 'Incoming returns Today', 'Tenant Name', 'Contact', 'Invoice Code', 'admin can contact the list of tenants to notify the reminder that the goods must be returned today', 'Confirm Finished?', 'Yes, Finish', 'Item', 'Items can be added or removed', 'Administrators can add leased Items. <br> You can search for goods from the Search column, search for item name, code / type, category, brand, type in any text', 'Add Item', 'Category', 'Print', 'Picture', 'Item Name', 'Specification', 'Category', 'Daily Rent Prices', 'Item Code', 'Owner', 'Brand', 'Add New item', 'Please Choose Category', 'If the Item are someone People property for rent', 'Phone Contact owner', 'Brand Product', 'Add Specification or Details Product', 'Hereby agree to Give permission <br> system displays your goods in the list of goods for rent', 'Save Data', 'Lease Report Data', 'Overall Lease Data, Automatic data updates when there is a lease transaction from the lease form, Printable Excel and PDF', 'Rental Details', 'Customer Details', 'Rental price', 'Filter print data by time span', 'from date', 'to date', 'You can print documents based on a choice of a certain time frame.', 'for example, November 2 to December 2', 'Rent Date', 'Return', 'Member', 'Bill to', '', '', '', '', '', '', '', '', 'Administrator', 'For Administrator profile detail click view details', 'Administrators can add other Administrators who can use the application. Admin can also change Administrator data, please provide login password information to the Administrator if the data is created by the admin', 'Add Administrators', 'Profile', 'Registration', 'Register As', 'Office', 'Register New Administrator', 'ID Employee', 'Full Name', 'Job Position', 'Address', 'Phone', 'Profile Picture', 'ID Nationality citizen', 'Web access options for registered admins, super users can activate several features', 'Rental form and item data', 'Export / import and Manage items', 'Scan ID Nationality, Driving Licence documents (optional)', 'Hereby agree to register admin account by maintaining the privacy of user data, admin data entered is valid data and in accordance with the admin profile concerned. Please tell the password and the default login email to the admin', 'Save', 'City', '', '', '', '', '', '', 'Customer data is registered when filling out the rental form, Register a member', 'Show rental reports'),
(3, 'French', 'FRF', 'Pseudo email', 'Mot de passe', 'Client de connexion', 'Pass oublié', 'Sign In', 'Salut, Actuellement, l\'application rento POS est uniquement limitée à un usage interne en entreprise. Il n\'est pas utilisé pour le public', 'Je ne veux pas être laissé pour compte avec les autres. Fonctionnalités intéressantes,\r\n                égayer votre journée. Allez, inscrivez-vous!', 'La progression du chargement nécessite une connexion stable', 'Mon profil', 'Plein écran', 'Tableau de bord', 'Formulaire de location', 'Loyer fini', 'Produit', 'Exporter / importer des données', 'Calendrier de location', 'Envoyer une notification', 'Mon compte', 'Personnes', 'Loué', 'Disponible', 'Produit', 'Aperçu cette année', 'Chiffre d\'affaires total cette année', 'Revenu estimé', 'Loyer total', 'Revenu aujourd\'hui', 'Aujourd\'hui Louer', 'Revenus ce mois-ci', 'Ce mois-ci', '', '', '', '', '', '', '', '', 'Avant d\'imprimer un reçu de location, remplissez les informations sur le locataire pour faciliter la gestion des articles et éviter les pertes matérielles.', 'Recherchez le code article ou le nom de l\'article à louer, puis cliquez sur l\'article à louer <br> Une fois que vous avez terminé d\'ajouter certains articles, entrez le nombre de jours de location, cliquez sur Soumettre puis remplissez les données du locataire, puis imprimer le reçu de location', 'Utilisez la recherche intelligente pour trouver des éléments', 'combien de jours', 'soumettre', 'LOUÉ', 'Liste de location', 'Effacer tout', 'Image', 'Nom de l\'article', 'journée', 'Total', 'La navigation', 'Prix', 'journées', 'Membre', 'Enregistrer un nouveau membre', 'Type Rechercher des membres avec un numéro d\'identification de nationalité', 'Tapez votre nom de membre pour trouver le numéro d\'identification de la NationalityCard', 'Garantie de location Par exemple: téléphones portables, cartes d\'étudiants, casques, etc.', 'Inscrivez un nouveau membre en remplissant une identité complète', 'Nationalité d\'identité', 'Nom', 'Adresse', 'Email', 'Garantie locative', 'Téléphone', 'Détails', 'Imprimer les reçus de location', 'Veuillez imprimer le reçu, si vous souhaitez voir toutes les données de location, veuillez vous rendre dans le menu Exporter / importer des données', 'Recherchez le code de location (facture) pour confirmer le retour des articles', 'Utilisez la recherche intelligente pour trouver le code de location', 'Retours entrants aujourd\'hui', 'Nom du locataire', 'Contact', 'Code de la facture', 'L\'administrateur peut contacter la liste des locataires pour notifier le rappel que les marchandises doivent être retournées aujourd\'hui', 'Confirmer terminé?', 'Oui, terminer', 'Produit', 'Les éléments peuvent être ajoutés ou supprimés', 'Les administrateurs peuvent ajouter des articles loués. <br> Vous pouvez rechercher des marchandises dans la colonne Rechercher, rechercher le nom de l\'article, le code / type, la catégorie, la marque, saisir n\'importe quel texte', 'Ajouter un produit', 'Catégorie', 'Impression', 'Image', 'Nom du produit', 'spécification', 'Catégorie', 'Prix de location journaliers', 'Code produit', 'Propriétaire', 'Marque', 'Ajouter un nouveau produit', 'Veuillez choisir la catégorie', 'Si l\'article est une propriété de personnes à louer', 'Téléphone Contact propriétaire', 'Produit de marque', 'Ajouter une spécification ou des détails sur le produit', 'Acceptez par la présente de donner la permission et le système affiche vos biens dans la liste des biens à louer', 'Enregistrer des données', 'Données du rapport de location', 'Données globales du bail, mises à jour automatiques des données en cas de transaction de location à partir du formulaire de bail, Excel et PDF imprimables', 'Détails de la location', 'Détails du client', 'Prix de location', 'Filtrer les données d\'impression par période', 'partir de la date', 'à ce jour', 'Vous pouvez imprimer des documents en fonction d\'un choix d\'une certaine période.', 'par exemple, du 2 novembre au 2 décembre', 'Date de location', 'Revenir', 'Membre', 'facturer', '', '', '', '', '', '', '', '', 'Administrateur', 'Pour les détails du profil administrateur, cliquez sur Afficher les détails', 'Les administrateurs peuvent ajouter d\'autres administrateurs qui peuvent utiliser l\'application. L\'administrateur peut également modifier les données de l\'administrateur, veuillez fournir les informations de mot de passe de connexion à l\'administrateur si les données sont créées par l\'administrateur', 'Ajouter des administrateurs', 'Profil', 'enregistrement', 'S\'inscrire en tant que', 'Bureau', 'Enregistrer un nouvel administrateur', 'ID employé', 'Nom complet', 'Poste', 'Adresse', 'Téléphone', 'Image de profil', 'Citoyen de nationalité d\'identité', 'Options d\'accès Web pour les administrateurs enregistrés, les super-utilisateurs peuvent activer plusieurs fonctionnalités', 'Formulaire de location et données d\'article', 'Exporter / importer et gérer les éléments', 'Numérisation de l\'identité nationale, documents de permis de conduire (facultatif)', 'Par la présente, acceptez d\'enregistrer un compte administrateur en préservant la confidentialité des données de l\'utilisateur, les données d\'administration saisies sont des données valides et conformes au profil administrateur concerné. Veuillez indiquer le mot de passe et l\'adresse e-mail de connexion par défaut à l\'administrateur', 'sauver', 'Ville', '', '', '', '', '', '', 'Les données du client sont enregistrées lors du remplissage du formulaire de location, Enregistrer un membre', 'Afficher les rapports de location'),
(4, 'Arab', 'SAR', 'تسجيل الدخول (البريد الإلكتروني', 'كلمه السر', 'عميل تسجيل الدخول', 'تمريرة منسية', 'تسجيل الدخول', 'مرحبًا ، يقتصر تطبيق Rento POS حاليًا على الاستخدام الداخلي للشركات. لا يتم استخدامه للجمهور', 'لا تريد أن تتخلف عن الركب مع الآخرين. ميزات رائعة ،\r\n                إحياء يومك. تعال ، سجل!', 'يتطلب تقدم التحميل اتصالاً مستقرًا', 'ملفي', 'شاشة كاملة', 'لوحة القيادة', 'نموذج الإيجار', 'ايجار منتهي', 'المنتج', 'تصدير / استيراد البيانات', 'جدول الإيجار', 'إرسال إشعار', 'حسابي', 'اشخاص', 'مستأجرة', 'متاح', 'المنتج', 'نظرة عامة هذا العام', 'إجمالي الإيرادات هذا العام', 'الإيرادات المقدرة', 'إجمالي الإيجار', 'الإيرادات اليوم', 'الإيجار اليوم', 'الإيرادات هذا الشهر', 'هذا الشهر', '', '', '', '', '', '', '', '', 'قبل طباعة إيصال الإيجار ، أكمل <br> معلومات المستأجر لتسهيل إدارة العناصر وتجنب فقد المواد', 'ابحث عن رمز العنصر أو اسم العنصر المراد تأجيره ، ثم انقر فوق العنصر للإيجار <br> بعد الانتهاء من إضافة بعض العناصر ، قم بملء عدد أيام الإيجار ، انقر فوق إرسال ثم قم بملء بيانات المستأجر ، ثم طباعة إيصال الإيجار', 'استخدم البحث الذكي للعثور على العناصر', 'كم عدد الايام', 'إرسال', 'مستأجرة', 'قائمة الإيجار', 'إفاسر توت', 'صورة', 'اسم العنصر', 'يوم', 'مجموع', 'التنقل', 'السعر', 'أيام', 'عضو', 'تسجيل عضو جديد', 'اكتب البحث عن أعضاء برقم هوية الجنسية', 'اكتب اسم العضو الخاص بك ، للعثور على رقم بطاقة الهوية الوطنية', 'ضمان الإيجار على سبيل المثال: الهواتف المحمولة ، بطاقات الطلاب ، الخوذ ، إلخ.', 'تسجيل عضو جديد عن طريق ملء هوية كاملة', 'الجنسية', 'اسم', 'عنوان', 'البريد الإلكتروني', 'ضمان الإيجار', 'هاتف', 'تفاصيل', 'طباعة إيصالات الإيجار', 'يرجى طباعة الإيصال ، إذا كنت تريد رؤية بيانات الإيجار بالكامل ، فيرجى الانتقال إلى قائمة تصدير / استيراد البيانات', 'ابحث عن رمز التأجير (الفاتورة) لتأكيد إرجاع العناصر', 'استخدم البحث الذكي للعثور على رمز التأجير', 'العوائد الواردة اليوم', 'اسم المستأجر', 'اتصل', 'كود الفاتورة', 'يمكن للمسؤول الاتصال بقائمة المستأجرين لإخطار التذكير بأنه يجب إرجاع البضائع اليوم', 'هل تم التأكيد على الانتهاء؟', 'نعم ، إنهاء', 'المنتج', 'يمكن إضافة العناصر أو إزالتها', 'يمكن للمسؤولين إضافة العناصر المؤجرة. <br> يمكنك البحث عن سلع من عمود البحث ، والبحث عن اسم العنصر ، والرمز / النوع ، والفئة ، والعلامة التجارية ، واكتب أي نص', 'أضف منتج', 'الفئة', 'طباعة', 'صورة', 'اسم العنصر', 'تخصيص', 'الفئة', 'أسعار الإيجار اليومية', 'كود المنتج', 'صاحب', 'الماركة', 'أضف أداة جديدة', 'الرجاء اختيار الفئة', 'إذا كان العنصر عبارة عن ممتلكات خاصة بشخص ما للإيجار', 'الهاتف صاحب الاتصال', 'منتج العلامة التجارية', 'إضافة المواصفات أو تفاصيل المنتج', 'توافق بموجبه على منح الإذن <br> يعرض النظام البضائع الخاصة بك في قائمة السلع للإيجار', 'حفظ البيانات', 'بيانات تقرير الإيجار', 'بيانات الإيجار الشاملة ، تحديثات تلقائية للبيانات عند وجود معاملة إيجار من نموذج الإيجار ، و Excel القابل للطباعة و PDF', 'تفاصيل الإيجار', 'تفاصيل العميل', 'سعر الإيجار', 'تصفية بيانات الطباعة حسب الفترة الزمنية', 'من التاريخ', 'ان يذهب في موعد', 'يمكنك طباعة المستندات بناءً على اختيار إطار زمني معين.', 'على سبيل المثال ، من 2 نوفمبر إلى 2 ديسمبر', 'تاريخ الإيجار', 'إرجاع', 'عضو', 'فاتورة الى', '', '', '', '', '', '', '', '', 'مدير', 'للحصول على تفاصيل ملف تعريف المسؤول انقر فوق عرض التفاصيل', 'يمكن للمسؤولين إضافة مسؤولين آخرين يمكنهم استخدام التطبيق. يمكن للمسؤول أيضًا تغيير بيانات المسؤول ، يرجى تقديم معلومات كلمة مرور تسجيل الدخول إلى المسؤول إذا تم إنشاء البيانات بواسطة المسؤول', 'إضافة المسؤولين', 'الملف الشخصي', 'التسجيل', 'سجل باسم', 'مكتب. مقر. مركز', 'تسجيل مسؤول جديد', 'هوية الموظف', 'الاسم بالكامل', 'وظيفه', 'عنوان', 'هاتف', 'الصوره الشخصيه', 'الجنسية مواطن', 'خيارات الوصول إلى الويب للمسؤولين المسجلين ، يمكن للمستخدمين المتميزين تنشيط العديد من الميزات', 'نموذج الإيجار وبيانات الصنف', 'تصدير / استيراد وإدارة الأصناف', 'مسح الجنسية ، وثائق رخصة القيادة (اختياري)', 'توافق بموجب هذا على تسجيل حساب المسؤول من خلال الحفاظ على خصوصية بيانات المستخدم ، وبيانات المسؤول التي تم إدخالها بيانات صالحة ووفقًا لملف تعريف المسؤول المعني. يرجى إخبار المسؤول بكلمة المرور والبريد الإلكتروني الافتراضي لتسجيل الدخول', 'حفظ', 'مدينة', '', '', '', '', '', '', 'يتم تسجيل بيانات العميل عند ملء نموذج الإيجار ، تسجيل عضو', 'إظهار تقارير الإيجار');";
		mysqli_query($mysqli,$sql);


		$sql="CREATE TABLE `liburnasional` (
  `id_liburan` int(5) NOT NULL,
  `tanggal_liburan` varchar(100) NOT NULL,
  `keterangan_liburan` varchar(200) NOT NULL,
  `diskon` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
				$sql="INSERT INTO `liburnasional` (`id_liburan`, `tanggal_liburan`, `keterangan_liburan`, `diskon`) VALUES
(20, '2021-05-01', 'Black Friday Discount', '3'),
(34, '2021-12-25', 'Chritsmas Holiday Discount', '20'),
(37, '2021-01-24', 'Member Discount', '20');";
		mysqli_query($mysqli,$sql);
		
				$sql="CREATE TABLE `mitra` (
  `id_mitra` int(25) NOT NULL,
  `saldo` int(100) NOT NULL,
  `bankmitra` varchar(40) NOT NULL,
  `rekmitra` varchar(50) NOT NULL,
  `namarekmitra` varchar(50) NOT NULL,
  `jambuka` varchar(30) NOT NULL,
  `alamat` varchar(150) NOT NULL,
  `kecamatan` varchar(100) NOT NULL,
  `kota` varchar(100) NOT NULL,
  `propinsi` varchar(20) NOT NULL,
  `nama_mitra` varchar(400) NOT NULL,
  `foto_mitra` varchar(400) NOT NULL,
  `kelamin` varchar(10) NOT NULL,
  `latmitra` varchar(400) NOT NULL,
  `lngmitra` varchar(400) NOT NULL,
  `nomorhp` varchar(40) NOT NULL,
  `no_ktp` varchar(30) NOT NULL,
  `mitra_email` varchar(300) NOT NULL,
  `mitra_pass` varchar(100) NOT NULL,
  `dokumen` varchar(400) NOT NULL,
  `sebagai` varchar(100) NOT NULL,
  `tanggal` varchar(30) NOT NULL,
  `suspen` int(4) NOT NULL,
  `idunik` varchar(200) NOT NULL,
  `kodearea` varchar(80) NOT NULL,
  `nourut` varchar(50) NOT NULL,
  `jabatan` varchar(100) NOT NULL,
  `departement` varchar(100) NOT NULL,
  `title` varchar(50) NOT NULL,
  `nopegawai` varchar(30) NOT NULL,
  `laporan` varchar(5) NOT NULL,
  `sales` varchar(5) NOT NULL,
  `mitrausaha` varchar(5) NOT NULL,
  `exportimport` varchar(5) NOT NULL,
  `administrator` varchar(5) NOT NULL,
  `forgot_pass_identity` varchar(40) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
				$sql="INSERT INTO `mitra` (`id_mitra`, `saldo`, `bankmitra`, `rekmitra`, `namarekmitra`, `jambuka`, `alamat`, `kecamatan`, `kota`, `propinsi`, `nama_mitra`, `foto_mitra`, `kelamin`, `latmitra`, `lngmitra`, `nomorhp`, `no_ktp`, `mitra_email`, `mitra_pass`, `dokumen`, `sebagai`, `tanggal`, `suspen`, `idunik`, `kodearea`, `nourut`, `jabatan`, `departement`, `title`, `nopegawai`, `laporan`, `sales`, `mitrausaha`, `exportimport`, `administrator`, `forgot_pass_identity`) VALUES
(1, 0, '', '', '', '', 'Dwijaya Plaza Blok H Jl. Dwijaya Raya No.1.', 'Radio Dalam', 'Jakarta Selatan', 'DKI Jakarta', 'Adam Ann', 'agen.png', 'Man', '', '', '081214197770', '35101900129889004', 'admin@barisandata.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', 'superuser', '16-01-2019 02:19:01', 0, '', '', '', 'Chairman', 'RentoPos', 'Mr.', '77299320', 'yes', 'yes', 'yes', 'yes', 'yes', ''),
(68, 0, '', '', '', '', 'Jl. Ajudan Jendrals', 'Sukasari', 'Bandung', 'Jawa Barat', 'Joseph', 'agen.png', 'Man', '', '', '292092002', '35101900129889004', 'partners@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '0', 'admin', '07-11-2018 01:58:02', 0, '', '', '', 'Secretary', 'LSM', 'H', '1893002', '', '', '', '', '', '');";
		mysqli_query($mysqli,$sql);
		
				$sql="CREATE TABLE `penalty` (
  `idpenalty` int(6) NOT NULL,
  `created` varchar(17) NOT NULL,
  `charge` varchar(4) NOT NULL,
  `totalcharge` varchar(9) NOT NULL,
  `kodesewa` varchar(10) NOT NULL,
  `jaminan` varchar(80) NOT NULL,
  `hari` varchar(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
				$sql="CREATE TABLE `pm` (
  `id` bigint(20) NOT NULL,
  `id2` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `user1` bigint(20) NOT NULL,
  `user2` bigint(20) NOT NULL,
  `message` text NOT NULL,
  `timestamp` int(10) NOT NULL,
  `user1read` varchar(3) NOT NULL,
  `user2read` varchar(3) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;";
		mysqli_query($mysqli,$sql);
		
				$sql="INSERT INTO `pm` (`id`, `id2`, `title`, `user1`, `user2`, `message`, `timestamp`, `user1read`, `user2read`) VALUES
(1, 1, 'Diskusi Law', 10, 17, 'selamat siang pak kuncoro,<br />\r\nbagaimana pendapat anda mengenai diskusi hukum pada acara tv one dengan topik wajah hukum diindonesia tadi malam', 1550456626, 'yes', 'yes'),
(2, 1, 'Diskusi IT', 10, 15, 'Selamat siang pak, saya ingin menanyakan paket server terbaik diindonesia dengan harga terjangkau kira kira di perusahaan apa', 1550456770, 'yes', 'yes'),
(3, 1, 'Tanya project IT', 10, 12, 'pakjim, saya ingin mengkonsultasikan budget untuk salah satu project IT saya, berkaitan dengan infrastruktur perusahaan', 1550457069, 'yes', 'no'),
(1, 2, '', 17, 10, 'iya betul pakjim', 1550806816, 'yes', 'yes'),
(2, 3, 'voice', 10, 10, '220219084654.wav', 1550825214, '', 'yes');";
		mysqli_query($mysqli,$sql);
		
				$sql="CREATE TABLE `product` (
  `idproduct` int(8) NOT NULL,
  `namaproduct` varchar(90) NOT NULL,
  `stock` varchar(10) NOT NULL,
  `created` varchar(19) NOT NULL,
  `kodebarang` varchar(10) NOT NULL,
  `brand` varchar(40) NOT NULL,
  `detail` varchar(900) NOT NULL,
  `picture` varchar(900) NOT NULL,
  `batassewa` varchar(10) NOT NULL,
  `hargasewa` varchar(20) NOT NULL,
  `pemilik` varchar(40) NOT NULL,
  `contact` varchar(18) NOT NULL,
  `id_kategori` varchar(49) NOT NULL,
  `status` varchar(10) NOT NULL,
  `kodesewa` varchar(18) NOT NULL,
  `tglsewa` varchar(20) NOT NULL,
  `tglkembali` varchar(20) NOT NULL,
  `counter` varchar(9) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;";
		mysqli_query($mysqli,$sql);
		
				$sql="INSERT INTO `product` (`idproduct`, `namaproduct`, `stock`, `created`, `kodebarang`, `brand`, `detail`, `picture`, `batassewa`, `hargasewa`, `pemilik`, `contact`, `id_kategori`, `status`, `kodesewa`, `tglsewa`, `tglkembali`, `counter`) VALUES
(2, 'Sony HXR-NX100 Camcorder', '1', '17-12-2020 03:20:38', 'BMcVRvDb', 'SONY', '48x Zoom\r\nFull HD 1080P 50p\r\nHDMI Output\r\nBuilt-in ND Filters\r\nMulti-format recording', 'kamera1.jpg', '-', '350', 'Ali', '082268829411', 'Camera', 'rented', 'thAePn', '2020-12-28 19:00:28', '2020-12-31', '0'),
(5, 'Gopro Hero 6 Black', '1', '17-12-2020 03:49:23', 'BMZSP2XY', 'GoPro', '4K Video\r\nSudah termasuk 64GB\r\nTinggal pakai\r\nWifi dan bisa connect aplikasi smartphone', 'kamera2.jpg', '-', '100', 'Ali', '-', 'Camera', 'rented', 'reAWAK', '2020-12-29 07:39:34', '2020-12-31', '0'),
(6, 'Camera Canon 100D + Lens Kit 18-55 IS STM', '1', '17-12-2020 03:51:50', 'BMnFpzF2', 'Canon', 'DSLR Camera\r\n18 Mega Pixel\r\nFull HD Video 1080P + AF Servo\r\nTouchscreen LCD\r\n', 'kamera3.jpg', '-', '100', 'Ali', '-', 'Camera', 'rented', 'reAWAK', '2020-12-29 07:39:34', '2020-12-31', '0'),
(7, 'Sony HXR-MC88 Camcorder', '1', '17-12-2020 03:52:55', 'BMuS65od', 'Sony', '1.0 type Exmor RSâ„¢ CMOS\r\nFast Hybrid AF\r\n48x zoom\r\nAVCHD recording\r\nFull HD Video\r\n', 'kamera4.jpg', '-', '300', 'Ali', '-', 'Camera', 'rented', 'oY6Teh', '2020-12-29 15:37:28', '2020-12-31', '0'),
(8, 'Sony HDR-CX405 HD Handycam', '1', '17-12-2020 03:54:04', 'BMUVyZL', 'Sony', 'Full HD 1080p\r\nHDMI Output\r\nPower Battery + USB 5V\r\nDurasi record lama', 'kamera5.jpg', '-', '100', 'Ali', '-', 'Camera', 'available', '0', '0', '0', '0'),
(9, 'Camera Canon 1300D + Lens Kit 18-55', '1', '17-12-2020 03:56:12', 'BMc2vpzg', 'Canon', 'DSLR Canon Camera\r\n18 Mega Pixel\r\nFull HD 1080p\r\nLangsung pakai', 'kamera6.jpg', '-', '100', 'Ali', '-', 'Camera', 'available', '0', '0', '0', '0'),
(10, 'Speaker Portable 150 Watt Mic Wireless', '1', '17-12-2020 03:58:02', 'BMmAtdPT', 'Watt mic', 'Portable\r\nPower 150 Watt\r\nSudah termasuk mic wireless\r\nModel trolley\r\nSuara jernih\r\nCocok untuk acara kantor, meeting, liburan, dan sebagainya', 'audio1.jpg', '-', '25', 'Ali', '-', 'Audio', 'available', '0', '0', '0', '0'),
(11, 'Rode VideoMic Pro Shotgun Microphone', '1', '17-12-2020 04:47:18', 'BMG2cKhX', 'RODE', 'Port 3.5mm Microphone TRS\r\nCondenser Mic\r\nBroadcast quality\r\nSupport semua kamera yang memiliki port mic 3.5mm', 'audio2.jpg', '-', '70', 'Ali', '-', 'Audio', 'available', '0', '0', '0', '0'),
(12, 'Zoom H6 6-Channel Audio Recorder', '1', '17-12-2020 05:03:17', 'BMOE3x2P', 'zoom', 'Live/Location Recording & Podcasting\r\nSwappable X/Y & Mid-Side Stereo Mics\r\n4 x XLR-1/4â€³ Mic/Line Inputs with Pads\r\nFast, User-Friendly Operability', 'audio3.jpg', '-', '15', 'Ali', '-', 'Audio', 'available', '0', '0', '0', '0'),
(13, 'Canon EF 75-300mm F/4-5.6 III', '1', '17-12-2020 05:08:06', 'BM0Fngfh', 'Canon', 'Lensa Zoom/Tele Lens\r\nCanon EF\r\nSupport APS-C dan Full Frame', 'lensa1.jpg', '-', '50', 'Ali', '-', 'Lens', 'available', '0', '2020-12-24 04:14:12', '2020-12-25', '0'),
(14, 'Canon EF 50mm f/1.8 STM', '1', '17-12-2020 05:09:01', 'BMUlUvcr', 'Canon', 'Bukaan lebar f/1.8\r\nMotor fokus STM\r\nCanon\r\nCocok untuk potrait, dan kondisi lowlight\r\nSupport APS-C dan Full Frame\r\n', 'lensa2.jpg', '-', '50', 'Ali', '-', 'Lens', 'available', '0', '2020-12-24 04:14:12', '2020-12-25', '0'),
(15, 'LED Video Light Yongnuo YN1200L', '1', '17-12-2020 05:39:19', 'BMEGJjRH', 'Yongnuo', 'Lighting Video\r\nYongnuo YN1200\r\nColor Temperature : 3200K â€“ 5500K\r\nPlug and Play', 'flas1.jpg', '-', '150', 'Ali', '-', 'Flash/Lighting', 'rented', 'thAePn', '2020-12-28 19:00:28', '2020-12-31', '0'),
(16, 'LED Video Light Yongnuo YN600L', '', '17-12-2020 05:40:47', 'BMwWwigi', 'Yongnuo ', 'Lighting Video\r\nYongnuo YN600\r\nColor Temperature : 3200K â€“ 5500K\r\nPlug and Play\r\n', 'flas2.jpg', '-', '120', 'Ali', '-', 'Flash/Lighting', 'rented', 'book', '0', '0', '0'),
(17, 'Trigger Godox X1T-C For Canon', '1', '17-12-2020 05:41:58', 'BMkPiqZG', 'Godox', 'Godox 2.4GHz\r\nSupport HSS 1/8000\r\nSupport Group dan Multichannel\r\nMode TTL, Manual, Multi', 'flas3.jpg', '-', '20', 'Ali', '-', 'Flash/Lighting', 'available', '0', '2020-12-28 15:56:27', '2020-12-30', '0'),
(18, 'Flash Godox TT685C For Canon', '1', '17-12-2020 05:42:56', 'BMMwueSd', 'Godox', '', 'flas4.jpg', '-', '30', 'Ali', '-', 'Flash/Lighting', 'available', '0', '2020-12-24 06:18:10', '2020-12-25', '1'),
(19, 'Converter SDI to HDMI Blackmagic', '1', '17-12-2020 06:02:29', 'BMWcfVcr', 'Blackmagic', 'SD/HD/3G-SDI Input\r\nHDMI and SDI Loop Outputs\r\nSupports SD and HD Signals\r\nAutomatic Input Signal Detection', 'm1.jpg', '-', '50', 'Ali', '-', 'Multimedia', 'available', '0', '0', '0', '0'),
(20, 'Blackmagic Design ATEM Mini HDMI Live Stream Switcher', '1', '17-12-2020 06:03:33', 'BMxhbJdS', 'Blackmagic', '', 'm2.jpg', '-', '500', 'Ali', '-', 'Multimedia', 'available', '0', '0', '0', '0'),
(21, 'Paket Live Streaming Basic HD', '1', '17-12-2020 06:06:29', 'BMN7svG', 'Paket Live Straming Batam multimedia', 'Full HD Live Streaming\r\nSupport live facebook/youtube\r\nProfessional\r\nGratis konsultasi', 'm4.jpg', '-', '500', 'Ali', '-', 'Multimedia', 'available', '0', '0', '0', '0'),
(22, 'Blackmagic Intensity Shuttle USB 3.0', '1', '17-12-2020 06:07:22', 'BMteoCY9', 'Blackmagic', '10-Bit HD/SD Capture and Playback\r\nUSB 3.0 Support\r\n10-Bit HDMI Video Direct Capture\r\nSeparate Sides for Inputs & Outputs\r\nSupport for Multiple Video Standards\r\nNo Compression Required\r\nMac, Windows, and Linux Compatible', 'm5.jpg', '-', '100', 'Ali', '-', 'Multimedia', 'available', '0', '0', '0', '0'),
(23, 'Hollyland Mars 300 Wireless HDMI Transmission System', '1', '17-12-2020 06:09:17', 'BMUI7kzA', 'Hollyland', 'Transmits up to 1080p60 HDMI video\r\n91.4 meter line-of-sight transmission\r\nHDMI loop-out on transmitter\r\nDual HDMI output on receiver\r\n1 x Transmitter & 1 x Receiver', 'm6.jpg', '-', '200', 'Ali', '-', 'Multimedia', 'available', '0', '0', '0', '0'),
(24, 'Moza AirCross 3-Axis Gimbal Stabilizer', '1', '17-12-2020 06:10:13', 'BMY5PJ83', 'Moza', 'Support DSLR/Mirrorless Camera\r\nPayload 1.8KG\r\nBattery 12 Jam', 'tripod1.jpg', '-', '100', 'Ali', '-', 'Tripod/Stabilizer', 'available', '0', '0', '0', '0'),
(25, 'Tripod Standar Video', '1', '17-12-2020 06:11:05', 'BM3P2l8r', 'Standar Tripod', 'Video Tripod\r\nTinggi 1.6m\r\nFluid Head Video', 'tripod2.jpg', '-', '20', 'Ali', '-', 'Tripod/Stabilizer', 'available', '0', '0', '0', '0'),
(26, 'Zhiyun Crane V1 Gimbal Stabilizer', '1', '17-12-2020 06:11:57', 'BM7bMyvU', 'Zhiyun', 'Stabilizer Kamera DSLR atau Mirrorless\r\nSupport hingga beban 1.8KG\r\nSudah termasuk hardcase, mudah dibawa kemana-mana\r\nPenggunaan mudah', 'tripod3.jpg', '-', '125', 'Ali', '-', 'Tripod/Stabilizer', 'available', '0', '0', '0', '0'),
(27, 'Sony XDCAM PXW-X70 Camcorder - 1639966', '1', '24-12-2020 04:49:46', 'BMPgFwLY', 'Sony', 'Video Camera Professional\r\n\r\nKelengkapan :\r\n- Cam\r\n- Batt 1\r\n- Memo 1\r\n- Charger 1\r\n- Hood 1', 'Sewa Handycam Camcorder Sony PXW X70 Batam Batammultimedia.jpg', '-', '350', '', '', 'Camera', 'available', '0', '0', '0', '0');";
		mysqli_query($mysqli,$sql);
		
				$sql="CREATE TABLE `settinglang` (
  `idsetlang` int(10) NOT NULL,
  `nameset` varchar(30) NOT NULL,
  `status` varchar(10) NOT NULL,
  `idadmin` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;";
		mysqli_query($mysqli,$sql);
		
				$sql="INSERT INTO `settinglang` (`idsetlang`, `nameset`, `status`, `idadmin`) VALUES
(1, 'English', 'Default', '1'),
(2, 'French', '', '1'),
(3, 'Arab', '', '1');";
		mysqli_query($mysqli,$sql);
		
				$sql="CREATE TABLE `sewa` (
  `idsewa` int(10) NOT NULL,
  `tglsewa` varchar(19) NOT NULL,
  `tanggal` varchar(19) NOT NULL,
  `tglkembali` varchar(19) NOT NULL,
  `id_mitra` varchar(10) NOT NULL,
  `id_users` varchar(10) NOT NULL,
  `namausers` varchar(80) NOT NULL,
  `contact` varchar(18) NOT NULL,
  `alamat` varchar(80) NOT NULL,
  `ktp` varchar(19) NOT NULL,
  `jaminan` varchar(200) NOT NULL,
  `email` varchar(40) NOT NULL,
  `kodesewa` varchar(13) NOT NULL,
  `harga` varchar(10) NOT NULL,
  `status` varchar(10) NOT NULL,
  `diskon` varchar(5) NOT NULL,
  `hargadiskon` varchar(9) NOT NULL,
  `id_diskon` varchar(9) NOT NULL,
  `keterangan` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
";
		mysqli_query($mysqli,$sql);
		
				$sql="INSERT INTO `sewa` (`idsewa`, `tglsewa`, `tanggal`, `tglkembali`, `id_mitra`, `id_users`, `namausers`, `contact`, `alamat`, `ktp`, `jaminan`, `email`, `kodesewa`, `harga`, `status`, `diskon`, `hargadiskon`, `id_diskon`, `keterangan`) VALUES
(29, '2020-12-29 15:37:28', '2020-12-29 15:37:28', '2020-12-31', '1', '2', 'andy', '08155277290', 'jl. flamboyan no 8 jombang', '3526455678888', 'das', 'andigti@gmail.com', 'oY6Teh', '900', 'active', '0', '900', '0', 'asdasd'),
(26, '2020-12-28 19:00:28', '2020-12-28 19:00:28', '2020-12-31', '1', '8', 'Teguh Rismantono', '082285704074', 'Komp Sungai Nayon GG Pesisir Blok E6', '2171092305019006', 'Cellphones', 'teguhrismantono88@gmail.com', 'thAePn', '1350', 'active', '0', '1350', '0', 'Detail');
";
		mysqli_query($mysqli,$sql);
		
				$sql="CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `oauth_provider` enum('','facebook','google','twitter') COLLATE utf8_unicode_ci NOT NULL,
  `oauth_uid` varchar(400) COLLATE utf8_unicode_ci NOT NULL,
  `first_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `last_name` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `picture` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `link` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `modified` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `forgot_pass_identity` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `saldo` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `noktp` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tempatlahir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tgllahir` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kelamin` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `agama` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `alamat1` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `kota` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `provinsi` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `kunci` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `sebagai` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `online` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `lat` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `lng` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `nik` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `jabatan` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `resign` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `terminate` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `rekening` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `bank` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `totalkerja` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `gajipokok` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `prorate` varchar(19) COLLATE utf8_unicode_ci NOT NULL,
  `komisi` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `thp` varchar(15) COLLATE utf8_unicode_ci NOT NULL,
  `ket` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `divisi` varchar(39) COLLATE utf8_unicode_ci NOT NULL,
  `area` varchar(60) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;";
		mysqli_query($mysqli,$sql);
		
				$sql="INSERT INTO `users` (`id`, `oauth_provider`, `oauth_uid`, `first_name`, `last_name`, `picture`, `link`, `created`, `modified`, `email`, `password`, `forgot_pass_identity`, `saldo`, `noktp`, `tempatlahir`, `tgllahir`, `kelamin`, `agama`, `alamat1`, `kota`, `provinsi`, `phone`, `kunci`, `sebagai`, `online`, `lat`, `lng`, `nik`, `jabatan`, `resign`, `terminate`, `rekening`, `bank`, `totalkerja`, `gajipokok`, `prorate`, `komisi`, `thp`, `ket`, `divisi`, `area`) VALUES
(1, '', '', 'Sbaelish', '', '2.jpg', 'VKEZ', '2019-05-31 00:00:00', '2020-05-21 09:03:08', 'pakjim.trans@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '68dd1cce30581bdbffe84891cf325d71', '0', '373733337333', '', '', 'Pria', '', '', '', '', '081123456789', '0', 'user', 'online', '', '', '7718828282', 'Direct Sales', '', '', '1448388398282', 'Mandiri', '15', '5000000', '2500000', '500000', '200000', 'Tes', 'Telesales', 'Jawa Timur');
";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `charge`
  ADD PRIMARY KEY (`idcharge`);";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`),
  ADD UNIQUE KEY `ktp` (`ktp`);";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `info`
  ADD PRIMARY KEY (`idinfo`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkatego`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`idkeranjang`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `language`
  ADD PRIMARY KEY (`idlang`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `liburnasional`
  ADD PRIMARY KEY (`id_liburan`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `mitra`
  ADD PRIMARY KEY (`id_mitra`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `penalty`
  ADD PRIMARY KEY (`idpenalty`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `product`
  ADD PRIMARY KEY (`idproduct`),
  ADD UNIQUE KEY `namaproduct` (`namaproduct`),
  ADD UNIQUE KEY `kodebarang` (`kodebarang`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `settinglang`
  ADD PRIMARY KEY (`idsetlang`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `sewa`
  ADD PRIMARY KEY (`idsewa`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `charge`
  MODIFY `idcharge` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `customer`
  MODIFY `idcustomer` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `info`
  MODIFY `idinfo` int(7) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;";
		mysqli_query($mysqli,$sql);
		
		$sql="ALTER TABLE `kategori`
  MODIFY `idkatego` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `keranjang`
  MODIFY `idkeranjang` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `language`
  MODIFY `idlang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `liburnasional`
  MODIFY `id_liburan` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `mitra`
  MODIFY `id_mitra` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `penalty`
  MODIFY `idpenalty` int(6) NOT NULL AUTO_INCREMENT;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `product`
  MODIFY `idproduct` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `settinglang`
  MODIFY `idsetlang` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `sewa`
  MODIFY `idsewa` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;";
		mysqli_query($mysqli,$sql);
		
				$sql="ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;";
		mysqli_query($mysqli,$sql);
		
		header('location:index.php');
	}
}
?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
	<link rel="icon" href="fotobarang/<?php echo $info['logo']?>" type="image/png" sizes="16x16">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>RENTOPOS INSTALLATION</title>
      <link href="https://getbootstrap.com/docs/4.0/dist/css/bootstrap.min.css" rel="stylesheet">
      <style>
		table{width:30% !important; text-align:center; margin:auto; margin-top:100px;}
		.success{color:green;}
		.error{color:red;}
		.frm{width:70% !important; margin:auto; margin-top:100px;}
	  </style>
   </head>
   <body style="background: linear-gradient(107deg, rgb(255 141 141 / 32%) 10%, rgb(242 245 247) 86%, rgb(39 101 154 / 64%) 100%);">
      <style type="text/css">ul{padding:0;list-style:none}ul li{display:inline-block;position:relative;line-height:21px;text-align:left}ul li a{display:block;padding:8px 25px;color:;text-decoration:none}ul li a:hover{color:#red}ul li ul.dropdown{min-width:100%;background-color:#FFF;display:none;position:absolute;z-index:999;left:-50px;top:35px;border:1px solid grey}ul li:hover ul.dropdown{display:block}ul li ul.dropdown li{display:block}#home{display:none}#loading{display:block;position:absolute;top:0;left:0;z-index:99999;width:100vw;height:100vh;background-image:url("hourglass.svg");background-repeat:no-repeat;background-position:center}</style>

      <main role="main" class="container" style="font-family:monospace"><br><br><center><h3>Installation</h3></center><br>
		<center><img src="logostreet.png" width="350px"/></center>
		<?php
		if((isset($_GET['step'])) && $_GET['step']==2){
			?>
			<center>Please fill all Form for Database Connection on Server</center>
			<form class="frm" method="post">
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="Host" required name="host" value="<?php echo $host?>">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="Database User Name" required name="dbuname" value="<?php echo $dbuname?>">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="Database Password" name="dbpwd" value="<?php echo $dbpwd?>">
			  </div>
			  <div class="form-group">
				<input type="text" class="form-control" placeholder="Database Name" required name="dbname" value="<?php echo $dbname?>">
			  </div>
			  <button type="submit" onclick="javascript:showDiv()"  name="submit" class="btn btn-primary">Submit</button>
			  <span class="error"><?php echo $msg?></span>
			</form>
			
			<?php
		}else{
		?>
	  
         <table class="table">
		  <thead>
			<tr>
			  <th scope="col">Configuration</th>
			  <th scope="col">Status</th>
			</tr>
		  </thead>
		  <tbody>
			<tr>
			  <th scope="row">PHP Version</th>
			  <td>
				<?php
					$is_error="";
					$php_version=phpversion();
					if($php_version>5){
						echo "<span class='success'>".$php_version."</span>";
					}else{
						echo "<span class='error'>".$php_version."</span>";
						$is_error='yes';
					}
				?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Curl Install</th>
			  <td>
				<?php
				$curl_version=function_exists('curl_version');
				if($curl_version){
					echo "<span class='success'>Yes</span>";
				}else{
					echo "<span class='error'>No</span>";
					$is_error='yes';
				}
				?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Mail Function</th>
			  <td>
				<?php
				$mail=function_exists('mail');
				if($mail){
					echo "<span class='success'>Yes</span>";
				}else{
					echo "<span class='error'>No</span>";
					$is_error='yes';
				}
				?>
			  </td>
			</tr>
			<tr>
			  <th scope="row">Session Working</th>
			  <td>
				<?php
				$_SESSION['IS_WORKING']=1;
				if(!empty($_SESSION['IS_WORKING'])){
					echo "<span class='success'>Yes</span>";
				}else{
					echo "<span class='error'>No</span>";
					$is_error='yes';
				}
				?>
			  </td>
			</tr>
			
			<tr>
			  <td colspan="2">
				<?php 
				if($is_error==''){
					?>
					<a href="?step=2"><button type="button" class="btn btn-success">Next</button></a>
					<?php
				}else{
					?><button type="button" class="btn btn-danger">Error</button><?php
				}
				?>
			  </td>
			</tr>
		  </tbody>
		  
		</table>
		<?php } ?>
		
      </main>
     <div id=loading style=display:none><center><br><br><br><img style=margin-top:100px;width:60px src=../interwind.svg><br><br></center>
</div>
<script type=text/javascript>function showDiv(){div=document.getElementById("loading");div.style.display="block"};</script> 
      <script src="https://getbootstrap.com/docs/4.0/assets/js/vendor/popper.min.js"></script>
      <script src="https://getbootstrap.com/docs/4.0/dist/js/bootstrap.min.js"></script>
   </body>
</html>