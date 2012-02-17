Entomology Research museum

Creat by: Di wang 2012 

Sponsors: Stuart Charters & John Marris

======================================================================================================================================


index.php                 ---Home page of the website
 
Listing.php               ---Pge for Specific searching and listing records

Input.php                 ---List of tables that records can be entering

Import.php                ---Import page for import records from file (current support Biota)

About.php                 ---Introduction about ERM

Contact.php               ---Contact detail for ERM

Login.php                 ---Login page for the ERM

LoginProcess.php          ---Preocess page of login

Logout.php                ---Logout Process page

outwebserviceintro.php    ---Introduction about our output service as xml

Loanandbarcode.php        ---List of all Specimens and their loan status, can loan or return them as a group after login

LoanandbarcodeProcess.php ---Process page for the group loan and return. also for entering loan information for group loan

LoanBarcodeScan.php       ---Entering loan specimens by scan barcode

GroupLoanProcess.php      ---Final process of group loan

Blak.php                  ---A blank page for the start of ifream

CollectionLocation.php    ---Searching process page for ifream on InputCollection.php

UploadPicture.php         ---Page for Upload Pictures

UploadPictureProcess.php  ---Process page for upload picture

ImageDelete.php           ---Process page for delete a picture of specimen

WebUserList.php           ---A list of web users in current

Output.php                ---Process page for xml out put of web service and convert result to a human readable formate

Input******.php           ---All page start with 'input' are use for showing records in detail or entering record after login

WSadd******.php           ---All page start with 'WSadd' are Process page for the record entering

WSImportBiota.php         ---Process page for import function from Biota's output file

WSOutput.php              ---Web service page for output of searching and listing as xml

Style.css                 ---Style page for the website

Web.js                    ---Page for holding common javascript

images folder             ---Keep images for the website use

SpecimenImage folder      ---Folder to keep all Specimen images

inc folder                ---Folder to keep all inc files (will explan in below)










==============================================================================================================================================
inc folder files introduction
============================================================================================================================================== 

alldataclassess.inc      ---Request of all classes inc

Class.inc                ---Define Class for "Class"

Collection.inc           ---Define Class for "Collection"

CollectionNote.inc       ---Define Class for "CollectionNotes"

Coreinces.inc            ---Request for all necessary incs

datamanager.inc          ---Data tier of the application

dbconninfo.inc           ---Database connection information

dbmanager.inc            ---Connection to the database

DetHistory.inc           ---Define Class for "DetHistory"

Family.inc               ---Define Class for "Family"

Genus.inc                ---Define Class for "Genus"

Group.inc                ---Define Class for "Group"

htmlgen.inc              ---Html creat page for the pages template 

ImageArchive.inc         ---Define Class for "ImageArchive"

Kingdom.inc              ---Define Class for "Kingdom"

Loans.inc                ---Define Class for "Loans"

LoansNote.inc            ---Define Class for "LoansNotes"

Locality.inc             ---Define Class for "Locality"

LocalityNote.inc         ---Define Class for "LocalityNotes"

logicmanager.inc         ---logic tier of the application

Order.inc                ---Define Class for "Order"

Personnel.inc            ---Define Class for "Personnel"

Phylum.inc               ---Define Class for "Phylum"

Project.inc              ---Define Class for "Project"

Reference.inc            ---Define Class for "Reference"

ReferenceLinks.inc       ---Define Class for "ReferneceLinks"

session.inc              ---$_SESSION set up page

Species.inc              ---Define Class for "Species"

SpeciesNote.inc          ---Define Class for "SpeciesNote"

Specimen.inc             ---Define Class for "Specimen"

SpecimenNote.inc         ---Define Class for "SpecimenNotes"

Table.inc                ---Define Class for "Table"

WebUsers.inc             ---Define Class for "WebUsers"