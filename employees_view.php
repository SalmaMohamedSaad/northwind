<?php
// This script and data application were generated by AppGini 5.72
// Download AppGini for free from https://bigprof.com/appgini/download/

	$currDir=dirname(__FILE__);
	include("$currDir/defaultLang.php");
	include("$currDir/language.php");
	include("$currDir/lib.php");
	@include("$currDir/hooks/employees.php");
	include("$currDir/employees_dml.php");

	// mm: can the current member access this page?
	$perm=getTablePermissions('employees');
	if(!$perm[0]){
		echo error_message($Translation['tableAccessDenied'], false);
		echo '<script>setTimeout("window.location=\'index.php?signOut=1\'", 2000);</script>';
		exit;
	}

	$x = new DataList;
	$x->TableName = "employees";

	// Fields that can be displayed in the table view
	$x->QueryFieldsTV = array(   
		"`employees`.`EmployeeID`" => "EmployeeID",
		"`employees`.`TitleOfCourtesy`" => "TitleOfCourtesy",
		"`employees`.`Photo`" => "Photo",
		"`employees`.`LastName`" => "LastName",
		"`employees`.`FirstName`" => "FirstName",
		"`employees`.`Title`" => "Title",
		"if(`employees`.`BirthDate`,date_format(`employees`.`BirthDate`,'%m/%d/%Y'),'')" => "BirthDate",
		"if(`employees`.`HireDate`,date_format(`employees`.`HireDate`,'%m/%d/%Y'),'')" => "HireDate",
		"`employees`.`Address`" => "Address",
		"`employees`.`City`" => "City",
		"`employees`.`Region`" => "Region",
		"`employees`.`PostalCode`" => "PostalCode",
		"`employees`.`Country`" => "Country",
		"`employees`.`HomePhone`" => "HomePhone",
		"`employees`.`Extension`" => "Extension",
		"`employees`.`Notes`" => "Notes",
		"IF(    CHAR_LENGTH(`employees1`.`LastName`) || CHAR_LENGTH(`employees1`.`FirstName`), CONCAT_WS('',   `employees1`.`LastName`, ', ', `employees1`.`FirstName`), '') /* ReportsTo */" => "ReportsTo"
	);
	// mapping incoming sort by requests to actual query fields
	$x->SortFields = array(   
		1 => '`employees`.`EmployeeID`',
		2 => 2,
		3 => 3,
		4 => 4,
		5 => 5,
		6 => 6,
		7 => '`employees`.`BirthDate`',
		8 => '`employees`.`HireDate`',
		9 => 9,
		10 => 10,
		11 => 11,
		12 => 12,
		13 => 13,
		14 => 14,
		15 => 15,
		16 => 16,
		17 => 17
	);

	// Fields that can be displayed in the csv file
	$x->QueryFieldsCSV = array(   
		"`employees`.`EmployeeID`" => "EmployeeID",
		"`employees`.`TitleOfCourtesy`" => "TitleOfCourtesy",
		"`employees`.`Photo`" => "Photo",
		"`employees`.`LastName`" => "LastName",
		"`employees`.`FirstName`" => "FirstName",
		"`employees`.`Title`" => "Title",
		"if(`employees`.`BirthDate`,date_format(`employees`.`BirthDate`,'%m/%d/%Y'),'')" => "BirthDate",
		"if(`employees`.`HireDate`,date_format(`employees`.`HireDate`,'%m/%d/%Y'),'')" => "HireDate",
		"`employees`.`Address`" => "Address",
		"`employees`.`City`" => "City",
		"`employees`.`Region`" => "Region",
		"`employees`.`PostalCode`" => "PostalCode",
		"`employees`.`Country`" => "Country",
		"`employees`.`HomePhone`" => "HomePhone",
		"`employees`.`Extension`" => "Extension",
		"`employees`.`Notes`" => "Notes",
		"IF(    CHAR_LENGTH(`employees1`.`LastName`) || CHAR_LENGTH(`employees1`.`FirstName`), CONCAT_WS('',   `employees1`.`LastName`, ', ', `employees1`.`FirstName`), '') /* ReportsTo */" => "ReportsTo"
	);
	// Fields that can be filtered
	$x->QueryFieldsFilters = array(   
		"`employees`.`EmployeeID`" => "Employee ID",
		"`employees`.`TitleOfCourtesy`" => "Title Of Courtesy",
		"`employees`.`LastName`" => "Last Name",
		"`employees`.`FirstName`" => "First Name",
		"`employees`.`Title`" => "Title",
		"`employees`.`BirthDate`" => "Birth Date",
		"`employees`.`HireDate`" => "Hire Date",
		"`employees`.`Address`" => "Address",
		"`employees`.`City`" => "City",
		"`employees`.`Region`" => "Region",
		"`employees`.`PostalCode`" => "Postal Code",
		"`employees`.`Country`" => "Country",
		"`employees`.`HomePhone`" => "Home Phone",
		"`employees`.`Extension`" => "Extension",
		"`employees`.`Notes`" => "Notes"
	);

	// Fields that can be quick searched
	$x->QueryFieldsQS = array(   
		"`employees`.`EmployeeID`" => "EmployeeID",
		"`employees`.`TitleOfCourtesy`" => "TitleOfCourtesy",
		"`employees`.`LastName`" => "LastName",
		"`employees`.`FirstName`" => "FirstName",
		"`employees`.`Title`" => "Title",
		"if(`employees`.`BirthDate`,date_format(`employees`.`BirthDate`,'%m/%d/%Y'),'')" => "BirthDate",
		"if(`employees`.`HireDate`,date_format(`employees`.`HireDate`,'%m/%d/%Y'),'')" => "HireDate",
		"`employees`.`Address`" => "Address",
		"`employees`.`City`" => "City",
		"`employees`.`Region`" => "Region",
		"`employees`.`PostalCode`" => "PostalCode",
		"`employees`.`Country`" => "Country",
		"`employees`.`HomePhone`" => "HomePhone",
		"`employees`.`Extension`" => "Extension",
		"`employees`.`Notes`" => "Notes"
	);

	// Lookup fields that can be used as filterers
	$x->filterers = array(  'ReportsTo' => 'ReportsTo');

	$x->QueryFrom = "`employees` LEFT JOIN `employees` as employees1 ON `employees1`.`EmployeeID`=`employees`.`ReportsTo` ";
	$x->QueryWhere = '';
	$x->QueryOrder = '';

	$x->AllowSelection = 1;
	$x->HideTableView = ($perm[2]==0 ? 1 : 0);
	$x->AllowDelete = $perm[4];
	$x->AllowMassDelete = false;
	$x->AllowInsert = $perm[1];
	$x->AllowUpdate = $perm[3];
	$x->SeparateDV = 0;
	$x->AllowDeleteOfParents = 0;
	$x->AllowFilters = 1;
	$x->AllowSavingFilters = 1;
	$x->AllowSorting = 1;
	$x->AllowNavigation = 1;
	$x->AllowPrinting = 1;
	$x->AllowCSV = 1;
	$x->RecordsPerPage = 5;
	$x->QuickSearch = 1;
	$x->QuickSearchText = $Translation["quick search"];
	$x->ScriptFileName = "employees_view.php";
	$x->RedirectAfterInsert = "employees_view.php?SelectedID=#ID#";
	$x->TableTitle = "Employees";
	$x->TableIcon = "resources/table_icons/administrator.png";
	$x->PrimaryKey = "`employees`.`EmployeeID`";
	$x->DefaultSortField = '4';
	$x->DefaultSortDirection = 'asc';

	$x->ColWidth   = array(  60, 100, 100, 200, 100, 120, 150);
	$x->ColCaption = array("Photo", "Last Name", "First Name", "Title", "Hire Date", "Country", "ReportsTo");
	$x->ColFieldName = array('Photo', 'LastName', 'FirstName', 'Title', 'HireDate', 'Country', 'ReportsTo');
	$x->ColNumber  = array(3, 4, 5, 6, 8, 13, 17);

	// template paths below are based on the app main directory
	$x->Template = 'templates/employees_templateTV.html';
	$x->SelectedTemplate = 'templates/employees_templateTVS.html';
	$x->TemplateDV = 'templates/employees_templateDV.html';
	$x->TemplateDVP = 'templates/employees_templateDVP.html';

	$x->ShowTableHeader = 1;
	$x->TVClasses = "";
	$x->DVClasses = "";
	$x->HighlightColor = '#FFF0C2';

	// mm: build the query based on current member's permissions
	$DisplayRecords = $_REQUEST['DisplayRecords'];
	if(!in_array($DisplayRecords, array('user', 'group'))){ $DisplayRecords = 'all'; }
	if($perm[2]==1 || ($perm[2]>1 && $DisplayRecords=='user' && !$_REQUEST['NoFilter_x'])){ // view owner only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `employees`.`EmployeeID`=membership_userrecords.pkValue and membership_userrecords.tableName='employees' and lcase(membership_userrecords.memberID)='".getLoggedMemberID()."'";
	}elseif($perm[2]==2 || ($perm[2]>2 && $DisplayRecords=='group' && !$_REQUEST['NoFilter_x'])){ // view group only
		$x->QueryFrom.=', membership_userrecords';
		$x->QueryWhere="where `employees`.`EmployeeID`=membership_userrecords.pkValue and membership_userrecords.tableName='employees' and membership_userrecords.groupID='".getLoggedGroupID()."'";
	}elseif($perm[2]==3){ // view all
		// no further action
	}elseif($perm[2]==0){ // view none
		$x->QueryFields = array("Not enough permissions" => "NEP");
		$x->QueryFrom = '`employees`';
		$x->QueryWhere = '';
		$x->DefaultSortField = '';
	}
	// hook: employees_init
	$render=TRUE;
	if(function_exists('employees_init')){
		$args=array();
		$render=employees_init($x, getMemberInfo(), $args);
	}

	if($render) $x->Render();

	// hook: employees_header
	$headerCode='';
	if(function_exists('employees_header')){
		$args=array();
		$headerCode=employees_header($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$headerCode){
		include_once("$currDir/header.php"); 
	}else{
		ob_start(); include_once("$currDir/header.php"); $dHeader=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%HEADER%%>', $dHeader, $headerCode);
	}

	echo $x->HTML;
	// hook: employees_footer
	$footerCode='';
	if(function_exists('employees_footer')){
		$args=array();
		$footerCode=employees_footer($x->ContentType, getMemberInfo(), $args);
	}  
	if(!$footerCode){
		include_once("$currDir/footer.php"); 
	}else{
		ob_start(); include_once("$currDir/footer.php"); $dFooter=ob_get_contents(); ob_end_clean();
		echo str_replace('<%%FOOTER%%>', $dFooter, $footerCode);
	}
?>