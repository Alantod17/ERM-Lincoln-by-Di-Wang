<?php

/**
 *=-----------------------------------------------------------=
 * htmlgen.inc
 *=-----------------------------------------------------------=
 *
 * This is the class that generates most of the common HTML
 * code for our web application.  The basic
 * sequence of functions you call for a page is:
 *
 * $hg = HtmlGenerator::getInstance();
 * $hg->startPage('page title goes here');
 * $hg->openBody();
 * $hg->emitLeftMenuBar('current page showing');
 * $hg->openContent();
 *  // dump your HTML content here.
 * $hg->closeContent();
 * $hg->closeBody();
 * $hg->closePage();
 */
class HtmlGenerator
{
  /**
   * We create only one instance of these, and this contains
   * that instance.
   */
  private static $s_htmlGenerator;

  /**
   * These are used to help manage state in the generator and
   * ensure correct usage.
   */
  private $m_pageOpened;
  private $m_bodyOpened;
  private $m_contentOpened;


  /**
   *=---------------------------------------------------------=
   * getInstance
   *=---------------------------------------------------------=
   * A static method that returns an instance of the
   * HtmlGenerator object.  We only create one of these, so
   * we return the same instance on repeated calls to this
   * method.
   *
   * Returns:
   *    HtmlGenerator
   */
  public static function getInstance()
  {
    if (HtmlGenerator::$s_htmlGenerator === NULL)
    {
      HtmlGenerator::$s_htmlGenerator = new HtmlGenerator();
    }

    return HtmlGenerator::$s_htmlGenerator;
  }

  /**
   *=---------------------------------------------------------=
   * __construct
   *=---------------------------------------------------------=
   * We don't want anybody to call this except for getInstance
   * above so we made this private.
   */
  private function __construct()
  {
    $this->m_pageOpened = FALSE;
    $this->m_bodyOpened = FALSE;
    $this->m_contentOpened = FALSE;
  }

  /**
   *=---------------------------------------------------------=
   * __destruct
   *=---------------------------------------------------------=
   * cleans up this instance.
   */
  function __destruct()
  {
  }


  /**
   *=---------------------------------------------------------=
   *=---------------------------------------------------------=
   *=---------------------------------------------------------=
   *=---------------------------------------------------------=
   *                      Public Methods
   *=---------------------------------------------------------=
   *=---------------------------------------------------------=
   *=---------------------------------------------------------=
   *=---------------------------------------------------------=
   */

  /*=---------------------------------------------------------=
   * startPage
   *=---------------------------------------------------------=
   * This routine starts a page by emitting the XHTML headers
   * and the <head> portion of the HTML.
   *
   * Parameters:
   *    $in_pageTitle       - the title for this page.
   */
  public function startPage($in_pageTitle)
  {
    if ($this->m_pageOpened)
    {
      throw new IncorrectUsageException('The startPage() method has already been called!');
    }

    $this->m_pageOpened = TRUE;
    echo <<<EOHEAD
	<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
	  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
	<html xmlns="http://www.w3.org/1999/xhtml" lang="en"
	      xml:lang="en">
	<head>
	  <title>$in_pageTitle</title>
	  <meta http-equiv="content-type"
	        content="text/html; charset=utf-8"/>
	  <link rel="stylesheet" href="style.css" type="text/css"/>


	</head>

EOHEAD;
  }


  /**=---------------------------------------------------------=
   * closePage
   *=---------------------------------------------------------=
   * We are finished generating the page, so emit the final
   * closing </html> tag.
   */
  public function closePage()
  {
    if ($this->m_bodyOpened)
    {
      throw new IncorrectUsageException('The closeBody() method has not been called to close the body.');
    }
    else if ($this->m_contentOpened)
    {
      throw new IncorrectUsageException('The closeContent() method has not been called to close the page contents');
    }
    else if (!$this->m_pageOpened)
    {
      throw new IncorrectUsageException('The startPage() method was never called to open the page body');
    }

    $this->m_pageOpened = FALSE;
    echo "</html>\n";
  }


  /*=---------------------------------------------------------=
   * openBody
   *=---------------------------------------------------------=
   * Opens the body of the page so that we can start emitting
   * content for it.   This routine is currently not terribly
   * complex!  Our body is basically one giant table, the first
   * column of which is for the left menu bar and the second
   * of which is for the page content.
   *
   * Added Walt A: The title and subtitle for the table are now parameters
   */
  public function openBody($activeNav)
  {
    if (!$this->m_pageOpened)
    {
      throw new IncorrectUsageException('The startPage() method has not yet been called to generate XHTML headers');
    }
    else if ($this->m_bodyOpened)
    {
      throw new IncorrectUsageException('The openBody method has already been called.');
    }

    $this->m_bodyOpened = TRUE;

  	$secure_Sysadmin=LogicManager::getSecureLevelSystemAdmin();
  	$secure_Dataadmin=LogicManager::getSecureLevelDataAdmin();
  	$secure_WebUser=LogicManager::getSecureLevelWebUser();
  	$secure_Guest=LogicManager::getSecureLevelGuest();



  	$loginStatus = isset($_SESSION["secure"]["LoginUserName"])?"Logout":"Login";
  	$logURL = isset($_SESSION["secure"]["LoginUserName"])?"Logout.php":"Login.php";

  	$LoginUserSecureLevel = isset($_SESSION["secure"]["LoginUserLevel"])?$_SESSION["secure"]["LoginUserLevel"]:$secure_Guest;

  	$QuickLink = "";
  	if ($LoginUserSecureLevel<$secure_Guest||$LoginUserSecureLevel==$secure_Guest) {
  		$QuickLink = '<li class="first">
  		<a href="output.php?txtkey=HoloType&table=Specimen">Type Collection</a>
  		</li>
        <li>
  		<a href="output.php?method=Listing&table=Specimen">Specimen List</a>
  		</li>
  		<li>
  		<a href="output.php?method=Listing&table=Collection">Collection List</a>
  		</li>
  		<li>
  		<a href="outwebserviceintro.php">WebService</a>
  		</li>
  		<li class="last">
  		<a href="Loanandbarcode.php">Loan Status List</a>
  		</li>';
  	}

  	if ($LoginUserSecureLevel<$secure_WebUser||$LoginUserSecureLevel==$secure_WebUser) {
  		$QuickLink = '<li class="first">
  		<a href="output.php?txtkey=HoloType&table=Specimen">Type Collection</a>
  		</li>
  		<li>
  		<a href="output.php?method=Listing&table=Specimen">Specimen List</a>
  		</li>
  		<li>
  		<a href="output.php?method=Listing&table=Collection">Collection List</a>
  		</li>
  		<li>
  		<a href="outwebserviceintro.php">WebService</a>
  		</li>
  		<li>
  		<a href="inputspecimen.php">Input Specimen</a>
  		</li>
  		<li>
  		<a href="inputCollection.php">Input Collection</a>
  		</li>
  		<li class="last">
  		<a href="Loanandbarcode.php">Loan Status List</a>
  		</li>';
  	}

  	if ($LoginUserSecureLevel<$secure_Dataadmin||$LoginUserSecureLevel==$secure_Dataadmin) {
  		$QuickLink = '<li class="first">
        <a href="inputspecimen.php">Input Specimen</a>

  		</li>
  		<li>
  		<a href="inputCollection.php">Input Collection</a>

  		</li>
  		<li>
  		<a href="inputloans.php">Add a Loan</a>
  		</li>
  		<li>
  		<a href="LoanBarcodeScan.php">Scan to Loan</a>
  		</li>
  		<li>
  		<a href="Loanandbarcode.php">Group Loan</a>
  		</li>
  		<li>
  		<a href="outwebserviceintro.php">WebService</a>
  		</li>
  		<li>
  		<a href="output.php?txtkey=HoloType&table=Specimen">Type Collection</a>
  		</li>
  		<li>
  		<a href="output.php?method=Listing&table=Specimen">Specimen List</a>
  		</li>
  		<li class="last">
  		<a href="output.php?method=Listing&table=Collection">Collection List</a>
  		</li>';
  	}

  	if ($LoginUserSecureLevel==$secure_Sysadmin) {
  		$QuickLink = '<li class="first">
        <a href="inputspecimen.php">Input Specimen</a>

  		</li>
  		<li>
  		<a href="inputCollection.php">Input Collection</a>

  		</li>
  		<li>
  		<a href="inputloans.php">Add a Loan</a>
  		</li>
  		<li>
  		<a href="LoanBarcodeScan.php">Scan to Loan</a>
  		</li>
  		<li>
  		<a href="Loanandbarcode.php">Group Loan</a>
  		</li>
  		<li>
  		<a href="output.php?txtkey=HoloType&table=Specimen">Type Collection</a>
  		</li>
  		<li>
  		<a href="outwebserviceintro.php">WebService</a>
  		</li>
  		<li>
  		<a href="output.php?method=Listing&table=Specimen">Specimen List</a>
  		</li>
  		<li>
  		<a href="output.php?method=Listing&table=Collection">Collection List</a>
  		</li>
  		<li>
  		<a href="webuserlist.php">Users List</a>
  		</li>
  		<li class="last">
  		<a href="inputwebuser.php">Iput User</a>
  		</li>';
  	}

  	$Home = $activeNav =="Home"?"active":"";
  	$Input = $activeNav =="Input"?"active":"";
  	$Import = $activeNav =="Import"?"active":"";
  	$Listing = $activeNav =="Listing"?"active":"";
  	$Login = $activeNav =="Login"?"active":"";
  	$About = $activeNav =="About"?"active":"";
  	$Contact = $activeNav =="Contact"?"active":"";
    echo <<<EOBOPEN
	<body>
	<div id="bg">
			<div id="outer">
				<div id="header">
					<div id="logo">
						<h1 style="font-size:2.0em;">
							<a href="index.php">Lincoln University Entomology Research Museum</a>
						</h1>
					</div>
					<div id="search">
						<form action="output.php" method="get">
							<input class="text" name="txtkey" size="32" maxlength="64"><input class="button" type="submit" value="Search"></form>
					</div>
					<div id="nav">
						<ul><li class="first $Home">
								<a href="index.php">Home</a>
							</li>
							<li class="$Listing">
								<a href="Listing.php">Listing and Searching</a>
							</li>
							<li class="$Input">
								<a href="Input.php">Input Record</a>
							</li>
							<li class="$Import">
								<a href="import.php">Import</a>
							</li>
							<li class="$About">
								<a href="about.php">About</a>
							</li>
							<li class="$Contact">
								<a href="Contact.php">Contact</a>
							</li>
							<li class="last $Login">
								<a href=$logURL>$loginStatus</a>
							</li>
						</ul><br class="clear"></div>
				</div>
				<div id="banner">
					<img src="images/pic1.jpg" width="932" height="172" alt=""></div>
				<div id="main">
					<div id="sidebar">
						<h3>
							Quick Link
						</h3>
						<ul class="linkedList">
						   $QuickLink
						</ul>
					</div>

EOBOPEN;
  }


  /*=---------------------------------------------------------=
   * closeBody
   *=---------------------------------------------------------=
   * This closes off the page body, including the table that
   * holds the page contents and the left menu bar.
   */
  public function closeBody()
  {
    if (!$this->m_bodyOpened)
    {
      throw new IncorrectUsageException('The openBody() method was never called to open the page body');
    }

    $this->m_bodyOpened = FALSE;
    echo <<<EOBCLOSE
	<br class="clear"></div>
			</div>
			<div id="copyright">
				Entomology Museum LU | Design by: Di Wang 2012 | Sponsor: Stuart Charters & John Marris
		</div>
    </body>

EOBCLOSE;
  }




  /*=---------------------------------------------------------=
   * openContent
   *=---------------------------------------------------------=
   * Opens up that portion of the page that holds the
   * individual content.
   */
  public function openContent()
  {
    if (!$this->m_bodyOpened)
    {
      throw new IncorrectUsageException('The openBody() method was never called to open the page body');
    }
    else if ($this->m_contentOpened)
    {
      throw new IncorrectUsageException('The openContent() method has already been called to open the page contents.');
    }

    $this->m_contentOpened = TRUE;
    echo <<<EOOPEN
    <div id="content">

EOOPEN;
  }


  /*=---------------------------------------------------------=
   * closeContent
   *=---------------------------------------------------------=
   * Closes off the portion of the page that holds the
   * individual pages' contents.
   */
  public function closeContent()
  {
    if (!$this->m_contentOpened)
    {
      throw new IncorrectUsageException('The openContent() method has not been called to open the page contents');
    }

    $this->m_contentOpened = FALSE;
    echo <<<EOCONTENTS
       <br class="clear"></div>


EOCONTENTS;
  }

}
?>
