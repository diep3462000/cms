<?php
/**
 * Created by PhpStorm.
 * User: MyPC
 * Date: 08/09/2016
 * Time: 10:22 SA
 */
echo VtHelper::cleanXSS(html_entity_decode($notify->content));
?>
<script type="text/javascript">
 document.body.style.backgroundColor = "#012b46";
</script>
