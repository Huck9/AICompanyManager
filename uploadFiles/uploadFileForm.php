<?php
require_once("../config.php");
global $config;

template_header("Upload file");
?>
<form action="upload.php" method="post" enctype="multipart/form-data">

    <input type="file" name="file" size="50" />

    <br />

    <input type="submit" value="Upload" />

</form>
<?php
template_footer();