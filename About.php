<?php

/**
 *Introduction of ERM
 *
 * @version $Id$
 * @copyright 2011
 */
ob_start();
require_once("inc/coreincs.inc");


/*
   * Setup HTML Generator and open ready for output.
*/
$hg = HtmlGenerator::getInstance();
$hg->startPage("Entomology Museum LU");
$hg->openBody("About");
$hg->openContent();
/** * Code that we write should go after here */

echo <<<OT




<h2>Lincoln University Entomology Research Museum</h2>
<div id="box1">

<p><h3>Overview</h3></p>
<img class="left" src="images/pic2.jpg" width="184" height="123" alt="">
<p align = "justify">
The Lincoln University Entomology Research Museum (ERM) is one of six major entomology collections
 in New Zealand and is the only comprehensive university-based collection.
 It consists of approximately 200,000 pinned specimens plus many thousands more specimens in the
 spirit collection. The collection is predominantly made up from New Zealand insects,
 with particular emphasis on the fauna of the South Island. It houses
 important collections from our National Parks and offshore islands (e.g. the Three Kings Is,
 Chatham Is and the subantarctic islands). Taxonomic strengths include the Coleoptera,
 tussock grassland Lepidoptera, and parasitic Hymenoptera. The ERM includes over 50 holotype specimens.
 Although the collection is university-based, it functions in essentially the same manner as other
 museum collections with free public access to the collection and with specimens made available on
 loan for research purposes.</p>

<p align = "justify">
<ul>
<li><h3>Aims</h3>
   <ul>
     <li>To enhance knowledge of New Zealand's biodiversity through study of the systematics and biology of the terrestrial and aquatic arthropod fauna.</li>
     <li>To provide taxonomic expertise and resources for Lincoln University staff and students, and for the wider scientific community.</li>
   </ul>
</li>
<li><h3>Goals</h3>
   <ul>
     <li>To develop the breadth of collection holdings through continued specimen acquisition.</li>
     <li>To maintain a high standard of specimen curation to ensure the long term conservation of the collection.</li>
     <li>To maintain up-to-date classification and identification of the collection's holdings.</li>
     <li>To foster systematics research using the collection's resources.</li>
   </ul>
</li>
</ul>
</p>

<p><h3>Research</h3></p>
<p align = "justify">
The ERM provides a taxonomic base for systematic research on terrestrial and aquatic arthropods and is used as a reference collection for ecological and faunistic studies.
<img class="right" src="images/pic5.jpg" width="184" height="142" alt="">
</p>

<p><h3>Teaching</h3></p>
<p align = "justify">
The ERM provides taxonomic support for entomologically-based postgraduate work and resources for systematics studies. Voucher specimens from many entomological studies are deposited in the collection. The ERM provides resource support and taxonomic expertise for undergraduate courses in entomology.
</p>

<p><h3>Access</h3></p>
<p align = "justify">
<img class="right" src="images/pic3.jpg" width="184" height="123" alt="">
The ERM provides access to Lincoln University staff and students, researchers from external organisations and members of the public. There are no charges for access to the collection, use of the ERM facilities, or for bench fees. Because of the delicate nature of the specimens, general access is restricted to designated Lincoln University staff and students. Access for external visitors is by prior arrangement with the Curator.</br>

Specimen loans are made, without charge, to researchers both nationally and internationally with legitimate reasons for borrowing specimens. Requests from individuals may be required to be made through a recognised entomology collection.
</p>

<p><h3>MUSEUM STAFF</h3></p>
<p align = "justify">
<font color=forestgreen>Full Time Staff:</font></br>
<img class="right" src="images/pic4.jpg" width="184" height="142" alt="">
John Marris - Curator</br>

John is responsible for the management of the Entomology Research Museum and provides taxonomic expertise for staff, students and external researchers. John’s research interests include beetle taxonomy and conservation, and subantarctic entomology.
</br></br></br>

<font color=forestgreen>Honorary Research Staff</font></br>

Dr Rowan Emberson</br>

Rowan was formerly Senior Lecturer in the Ecology Department but maintains his research interest in beetle taxonomy. He provides taxonomic expertise to staff and students.
</br></br>
Dr Cor Vink, AgResearch</br>

Cor completed a PhD in the Ecology Department and is currently a scientist at AgResearch, Lincoln. Cor is New Zealand’s foremost expert on spider taxonomy and provides expertise in this area to staff and students in the department as well as assisting with the curation of the spider collection and specimen loans.

</p>


</div>
OT;

/** * Close out the page and exit. */
$hg->closeContent();
$hg->closeBody();
$hg->closePage();
ob_end_flush();
?>