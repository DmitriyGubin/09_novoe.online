<?
require($_SERVER["DOCUMENT_ROOT"]."/bitrix/header.php");
$APPLICATION->SetTitle("Портфолио");
?>

<script type="text/javascript">
	function modifyState() { 
            let stateObj = { id: "200" }; 
            window.history.replaceState(stateObj, 
                        "/test/", "/test_one/"); 
        }

    modifyState();
</script>

<?require($_SERVER["DOCUMENT_ROOT"]."/bitrix/footer.php");?>