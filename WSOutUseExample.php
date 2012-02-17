<?php

/**
 *
 *
 * @version $Id$
 * @copyright 2012
 */


echo <<<OT
<form action="Wsoutuseexampleframe.php" method="get" target="OutputFrame">
<input class="text" name="txtkey" size="32" maxlength="64"><input class="button" type="submit" value="Search">
</form>

<iframe name="OutputFrame" id="OutputFrame" src="Blank.php" frameborder="no" height=1000px width =100% border="0" marginwidth="0" marginheight="0" ></iframe>

OT;

?>